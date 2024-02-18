<?php


include 'conexion.php';



// CONEXION CON LA BASE DE DATOS PARA GUARDAR LOS DATOS DEL USUARIO

$conexion = new Conexion();

// PARA QUE SE PUEDA ELEGIR ETRE INICIO DE SESION O REGISTRO
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['accion'])) {
        if ($_POST['accion'] == 'sesion') {
            inicioSesion($conexion);
        } elseif ($_POST['accion'] == 'registro') {
            registrar($conexion);
        }
    }
}


function inicioSesion($conexion){
    if (isset($_POST['email']) && isset($_POST['password'])) {
        
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        try {
            // CREO LA CONSULTA PARA RECUPERAR EL MAIL
            $recuperarConsulta = "SELECT id_usuario, email, password FROM usuarios WHERE email = :email";
            
            // PREPARO LA CONSULTA
            $stmt = $conexion->prepare($recuperarConsulta);
            $stmt->bindParam(':email', $email);
            
            // EJECUTO LA CONSULTA
            $stmt->execute();
            
            // OBTENGO EL RESULTADO DE LA CONSULTA
            $fila = $stmt->fetch(PDO::FETCH_ASSOC);
            
            if ($fila) {
                $emailRecuperado = $fila['email'];
                $passwordHashRecuperado = $fila['password'];
                $IdInicio = $fila['id_usuario'];

                if (password_verify($password, $passwordHashRecuperado)) {
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    $_SESSION['userName'] = $fila['email'];
                    $_SESSION['id_usuario'] = $fila['id_usuario'];
                     
                    header('Location: usuario.php');
                    exit();
                } else {
                    // REENVÍA A LA PÁGINA INDICANDO PASSWORD NO CORRECTO
                    header('Location: password_no_correcto.php');
                    exit();
                }
            } else {
                // REENVÍA A LA PÁGINA INDICANDO USUARIO NO CORRECTO
                header('Location: errores.php');
                exit();
            }
        } catch (PDOException $e) {
            // ERROR EN LA CONSULTA
            echo "Error al recuperar datos: " . $e->getMessage();
        }
    }
}

inicioSesion($conexion);



function registrar($conexion) {
    // COMPROBAR SI LOS CAMPOS EMAIL Y PASSWORD ESTÁN DEFINIDOS EN LA PETICIÓN POST
    if (isset($_POST['email']) && isset($_POST['password'])) {

        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        try {
            // VERIFICO SI EL CORREO ELECTRÓNICO YA EXISTE
            $consultaEmailExistente = "SELECT id_usuario FROM usuarios WHERE email = :email";
            $stmt = $conexion->prepare($consultaEmailExistente);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                // El correo electrónico ya existe, manejar el error o redirigir a una página de error
                header("Location: error_intento_registro.php");
                exit();
            }

            // HASHEO EL PASSWORD PARA DARLE SEGURIDAD
            $hash = password_hash($password, PASSWORD_DEFAULT);

            // INSERTAR DATOS DEL USUARIO EN LA BBDD
            $insertarDatos = "INSERT INTO usuarios (email, password) VALUES (:email, :password)";
            $stmt = $conexion->prepare($insertarDatos);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $hash);
            $stmt->execute();

            // REENVÍA A LA PÁGINA DE REGISTRO REALIZADO UNA VEZ INSERTADOS LOS DATOS
            header("Location: registro_realizado.php");
            exit();
        } catch (PDOException $e) {
            // CONTROLO LOS POSIBLES ERRORES
            echo "Error al insertar datos: " . $e->getMessage();
            exit();
        }
    } else {
        // EN CASO DE ERROR DESTRUIR LA SESIÓN
        session_unset();
    }
}


// LLAMO A LA FUNCION Y LE PASO COMO VALOR LA VARIABLE DE LA BBDD
registrar($conexion);

function registrarPassword($conexion) {
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (isset($_POST['resultadoPassword'])) {
        $resultadoPassword = $_POST['resultadoPassword'];
        $idUsuario = $_SESSION['id_usuario'];

        try {
            // Consultar el total de contraseñas asociadas al usuario
            $consultaTotalRegistros = "SELECT COUNT(*) as total FROM passwordguardado WHERE id_usuario = :idUsuario";
            $stmt = $conexion->prepare($consultaTotalRegistros);
            $stmt->bindParam(':idUsuario', $idUsuario);
            $stmt->execute();
            $datosConsulta = $stmt->fetch(PDO::FETCH_ASSOC);
            $datosConsultaTotal = $datosConsulta['total'];

            // Límite de contraseñas
            $limiteRegistro = 10;

            // Obtener el ID de la contraseña más antigua actualizada asociada al usuario
            $consultaIdPasswordAntiguo = "SELECT id_password FROM passwordguardado WHERE id_usuario = :idUsuario ORDER BY fecha_actualizacion ASC LIMIT 1";
            $stmt = $conexion->prepare($consultaIdPasswordAntiguo);
            $stmt->bindParam(':idUsuario', $idUsuario);
            $stmt->execute();
            $idPasswordAntiguo = $stmt->fetchColumn();

            if ($datosConsultaTotal < $limiteRegistro) {
                // Insertar nueva contraseña asociada al usuario
                $insertarPasswordBBDD = "INSERT INTO passwordguardado (id_usuario, password, fecha_actualizacion) VALUES (:idUsuario, :password, NOW())";
                $stmt = $conexion->prepare($insertarPasswordBBDD);
                $stmt->bindParam(':idUsuario', $idUsuario);
                $stmt->bindParam(':password', $resultadoPassword);
                $stmt->execute();

                header("Location: usuario.php");
                exit();
            } else {
                // Actualizar la contraseña más antigua actualizada asociada al usuario
                $actualizarPassword = "UPDATE passwordguardado SET password=:password, fecha_actualizacion=NOW() WHERE id_password = :idPasswordAntiguo";
                $stmt = $conexion->prepare($actualizarPassword);
                $stmt->bindParam(':password', $resultadoPassword);
                $stmt->bindParam(':idPasswordAntiguo', $idPasswordAntiguo);
                $stmt->execute();

                header("Location: usuario.php");
                exit();
            }
        } catch (PDOException $e) {
            echo "Error al insertar o actualizar la contraseña: " . $e->getMessage();
        }
    }
}




// LLAMO A LA FUNCION
registrarPassword($conexion);
     
// FUNCION MOSTRAR PASSWORD 

function mostrarPassword(){

   



}



// CIERRO LA CONEXION A LA BBDD
unset($conexion);


?>