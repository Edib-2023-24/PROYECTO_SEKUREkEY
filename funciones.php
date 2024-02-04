<?php






// CONEXION CON LA BASE DE DATOS PARA GUARDAR LOS DATOS DEL USUARIO

function conectarBaseDeDatos() {
    $localhost = 'localhost';
    $bbdd = 'registro';
    $user = 'edib';
    $passwordBbdd = 'edib';

    $conexion = mysqli_connect($localhost, $user, $passwordBbdd, $bbdd);

    if ($conexion) {
        return $conexion;
    } else {
        die("Error en la conexión: " . mysqli_connect_error());
    }
}
$conexion = conectarBaseDeDatos();

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

        
       

        // CREO LA CONSULTA PARA RECUPERAR EL MAIL
        $recuperarConsulta = "SELECT id_usuario,email, password FROM usuarios WHERE email = '$email'";
        
        // RECUPERO EL RESULTADO DE LA CONSULTA
        $resultadoRecuperacion = mysqli_query($conexion, $recuperarConsulta);
        
        // COMPRUEBO SI EL RESULTADO FUE CORRECTO 
        if ($resultadoRecuperacion) {
            $fila = mysqli_fetch_assoc($resultadoRecuperacion);
           
            if ($fila) {
                $emailRecuperado = $fila['email'];
                $passwordHashRecuperado = $fila['password'];
                 $IdInicio=$fila['id_usuario'];
               

                
                
                 if (password_verify($password, $passwordHashRecuperado)) {
                    if (session_status() == PHP_SESSION_NONE) {
                        session_start();
                    }
                    $_SESSION['userName']=$fila['email'];
                    $_SESSION['id_usuario']=$fila['id_usuario'];
                     
                     
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
        } else {
            // ERROR EN LA CONSULTA
            echo "Error al recuperar datos: " . mysqli_error($conexion);
        }
    }
}

inicioSesion($conexion);




    
        
function registrar($conexion) {
    // COMPROBAR SI LOS CAMPOS EMAIL Y PASSWORD ESTÁN DEFINIDOS EN LA PETICIÓN POST
    if (isset($_POST['email']) && isset($_POST['password'])) {

        $email = trim($_POST['email']);
        
        $password = trim($_POST['password']);


          // VERIFICO SI EL CORREO ELECTRONICO YA EXISTE
          $consultaEmailExistente = "SELECT id_usuario FROM usuarios WHERE email = '$email'";
          $resultadoEmailExistente = mysqli_query($conexion, $consultaEmailExistente);
  
          if (mysqli_num_rows($resultadoEmailExistente) > 0) {
              // El correo electrónico ya existe, manejar el error o redirigir a una página de error
              header("Location:error_intento_registro.php");
              exit();
          }
       

        // HASHEO EL PASSWORD PARA DARLE SEGURIDAD
        $hash = password_hash($password, PASSWORD_DEFAULT);

        // COMPRUEBO SI EL CORRECO ELECTRONICO EXISTEN EN LA BDDD
        $consultaEmailExistente = "SELECT id_usuario FROM usuarios WHERE email = '$email'";
        $resultadoEmailExistente = mysqli_query($conexion, $consultaEmailExistente);

        // INSERTAR DATOS DEL USUARIO EN LA BBDD
        $insertarDatos = "INSERT INTO `usuarios` (`id_usuario`, `email`, `password`) VALUES (NULL, '$email', '$hash')";
        $resultado = mysqli_query($conexion, $insertarDatos);

        if ($resultado) {
            // REENVIA A LA PAGINA LOGIN UNA VEZ INSERTADO LOS DATOS
            header("Location: registro_realizado.php");
            exit();
        } else {
            // CONTROLO LOS POSIBLES ERRORES
            
            echo "Error al recuperar datos: " . mysqli_error($conexion);
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

        // Consultar el total de contraseñas asociadas al usuario
        $consultaTotalRegistros = "SELECT COUNT(*) as total FROM passwordguardado WHERE id_usuario = $idUsuario";
        $resultadoConsulta = mysqli_query($conexion, $consultaTotalRegistros);
        $datosConsulta = mysqli_fetch_assoc($resultadoConsulta);
        $datosConsultaTotal = $datosConsulta['total'];

        // Límite de contraseñas
        $limiteRegistro = 10;

        if ($datosConsultaTotal < $limiteRegistro) {
            // Insertar nueva contraseña asociada al usuario
            $insertarPasswordBBDD = "INSERT INTO passwordguardado (id_usuario, password) VALUES ($idUsuario, '$resultadoPassword')";
            $resultadoInsertarPassword = mysqli_query($conexion, $insertarPasswordBBDD);

            if ($resultadoInsertarPassword) {
                header("Location: usuario.php");
                exit();
            } else {
                echo "Error al insertar: " . mysqli_error($conexion);
            }
        } else {
            // Obtener el ID de la contraseña más antigua asociada al usuario
            $consultaIdPasswordAntiguo = "SELECT id_password FROM passwordguardado WHERE id_usuario = $idUsuario ORDER BY id_password ASC LIMIT 1";
            $resultadoIdPasswordAntiguo = mysqli_query($conexion, $consultaIdPasswordAntiguo);
            $idPasswordAntiguo = mysqli_fetch_assoc($resultadoIdPasswordAntiguo)['id_password'];

            // Actualizar la contraseña más antigua asociada al usuario
            $actualizarPassword = "UPDATE passwordguardado SET password='$resultadoPassword' WHERE id_password = $idPasswordAntiguo";
            $resultadoActualizarPassword = mysqli_query($conexion, $actualizarPassword);

            if ($resultadoActualizarPassword) {
                header("Location: usuario.php");
                exit();
            } else {
                echo "Error al actualizar: " . mysqli_error($conexion);
            }
        }
    }
}



// LLAMO A LA FUNCION
registrarPassword($conexion);
     
       

// CIERRO LA CONEXION A LA BBDD
mysqli_close($conexion);


?>