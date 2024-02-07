
let rango_usuario=document.getElementById("rango_password_usuario");
let valor_actual_usuario=document.getElementById("valor_actual_usuario");
rango_usuario.addEventListener('input',function(){

    valor_actual_usuario.textContent=rango_usuario.value;


});

// FUNCION GENERAR PASWORD ALEATORIO
function passwordAleatorioUsuario() {
    // CHEQUEO LOS CHEK
    let mayuscula = document.getElementById("mayusculas").checked;
    let minusculas = document.getElementById("minusculas").checked;
    let digitos = document.getElementById("digitos").checked;
    let caracteres = document.getElementById("caracteres").checked;
    let longitud = document.getElementById("rango_password_usuario").value;

    let resultado = "";
    // CREO LAS VARIABLES CON MAYUSUCLA MINUSUCULA DIGITOS Y CARACTERES 
    let expresionMayusculas = "ABCÇDEFGHIJKLMNOPQRSTUVWXYZ";
    let expresionminusculas = "abcçdefghijklmnopqrstuvwxyz";
    let expresionDigitos = "0123456789";
    let expresionCaracteres = "?¿)(/&%$·!ª+-*´}{][";

    // CREO LOS CONDIFICIONES PARA GUARDAR EN LA VARIABLE RESULTADO
    if (mayuscula) { resultado += expresionMayusculas; }
    if (minusculas) { resultado += expresionminusculas; }
    if (digitos) { resultado += expresionDigitos; }
    if (caracteres) { resultado += expresionCaracteres; }

// LE PASO LA FUNCION GENERAR PASSWORD EL RESULTADO Y LA LONGITUD 
    let codigoPassword = generarPassword(resultado, longitud);

    // COMPRUEBO SI NO HAY DOS CARACTERS GIUALES 
    codigoPassword = codigoPassword.split('').reduce((prev, curr, i, arr) => {
        if (i > 0) {
            let prevChar = arr[i - 1];
            if ((mayuscula && curr === curr.toUpperCase() && prevChar === prevChar.toUpperCase()) ||
                (minusculas && curr === curr.toLowerCase() && prevChar === prevChar.toLowerCase()) ||
                (digitos && !isNaN(curr) && !isNaN(prevChar)) ||
                (caracteres && expresionCaracteres.includes(curr) && expresionCaracteres.includes(prevChar))) {
                return prev + generarPassword(resultado.replace(curr, ''), 1);
            }
        }
        return prev + curr;
    }, "");
// MUESTRO POR PANTALLA
    let salidaResultado = document.getElementById("resultado_usuario");
    salidaResultado.innerHTML = codigoPassword;
    // ENSEÑO UNA PALABRA EN FUNCION DE LA LONGIFUT 
    let texto = document.getElementById("salidaTexto");
    if (codigoPassword.length >= 1 && codigoPassword.length <= 8) {
        texto.innerHTML = "MALA";
        salidaResultado.style.backgroundColor = "red";
        texto.style.color = "red";
    }
    if (codigoPassword.length >= 10) {
        texto.innerHTML = "SEGURA";
        salidaResultado.style.backgroundColor = "#1BD14E";
        texto.style.color = "#1BD14E";
    }
    if (codigoPassword.length >= 12) {
        texto.innerHTML = "MUY BUENA";
        salidaResultado.style.backgroundColor = "#B6BA0D";
        texto.style.color = "#B6BA0D";
    }
// QUE DESAPAREZCA LA PALABRA Y EL PASSWORD A LOS 5 SEGUNDOS 
    setTimeout(function () {
        texto.textContent = "";
        salidaResultado.textContent = "";
    }, 5000);
}


    // LLAMADA FUNCION GENERAR PASSWORD USUARIO
     
    passwordAleatorioUsuario();
    
    // FUNCION PARA GENERAR EL PASSWORD ALEATORIO
function generarPassword(caracteres,longitud){

    let resultado="";
// RECORRO EL CARACTER SELECIONADO Y QUE ELIGA UNO AL AZAR 
    for (let index = 0; index <longitud; index++) {
            let caracterAleatorio=caracteres.charAt(Math.floor(Math.random()*caracteres.length))
        
            resultado+=caracterAleatorio;
    }
    return resultado;

}

// CREO UNA FUNCION PARA RECUPERAR EL PASSWORD Y ENVIARLO A LA PAGINA PASSWORD

function envioPassword(){
// RECUPERO EL VALOR DEL PASSWORD GENERADO 
let recuperoResultado=document.getElementById("resultado_usuario").innerText;
// LE ASIGNO EL VALOR AL ID RESULTADOINPUT
document.getElementById("resultadoInput").value=recuperoResultado;
// ENVIO EL FORMULARIO 
document.getElementById("formularioResultado").submit();


}

// FUNCION PARA VALIDAR EN EL LADO DEL CLIENTE 
function validacion() {
    let emailInput = document.getElementById("email");
    let email = emailInput.value;
    let password = document.getElementById("password").value;
    let accion = document.getElementsByName("accion")[0].value;
    
    let emailIncorrecto = document.getElementById("emailIncorrecto");
    let expresionregularEmail = /^[\w.-]+@[a-zA-Z\d.-]+\.[a-zA-Z]{2,}$/;
    let passwordincorrecto = document.getElementById('passwordIncorrecto');
    let expresionRegularpassword = /^.*(?=.{8,})(?=.*[a-zA-Z])(?=.*\d)(?=.*[!@#$%^&*()_+]).*$/;

    let emailValido = expresionregularEmail.test(email);
    let passwordValida = expresionRegularpassword.test(password);

    // REINICIO LOS MENSAJES 
    emailIncorrecto.innerText = "";
    passwordincorrecto.innerText = "";

    // VALIDAR EL EMAIL Y MOSTRAR 
    if (!emailValido) {
        //MOSTRAR UN MENSAJE DE ERROR
        emailIncorrecto.innerText = "Email Incorrecto";
        setTimeout(function () {
            emailIncorrecto.innerText = "";
        }, 10000); 
        return false;  // DETENER LA VALIDACION SI EL MAIL NO ES CORRECTO
    }

    // VALIDAR CONTRASEÑA Y MOSTRAR UN ERROR 
    if (!passwordValida) {
       // MOSTRAR UN ERROR SI LA CONTRASEÑA ES INCORRECTA
        passwordincorrecto.innerText = "Password Incorrecto min 8 letras 1 caracter y 1 digito ";
        setTimeout(function () {
            passwordincorrecto.innerText = "";
        }, 10000);
        return false;  // DETENER LA VALICADION SI NO ES CORRECTO 
    }

    // REALIZO MAS VALIDACIONES SI ES NECESARIO
    if (accion === "sesion") {
        // REDIRIGO A LA PAGINA FUNCIONES
         window.location.href = "funciones.php";
    }

    // DEVUELVE TRUE SI LAS DOS SON CORRECTAS 
    return true;
}







