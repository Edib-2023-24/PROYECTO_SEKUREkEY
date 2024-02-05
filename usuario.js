
let rango_usuario=document.getElementById("rango_password_usuario");
let valor_actual_usuario=document.getElementById("valor_actual_usuario");
rango_usuario.addEventListener('input',function(){

    valor_actual_usuario.textContent=rango_usuario.value;


});




// CREO UNA FUNCION PARA EL PASSWORD ALEATORIO CON MAS FUNCIONES PARA EL LOGIN USUARIO
function passwordAleatorioUsuario(){

    // CREO LAS VARIABLES CON LOS ELEMENTOS DEL ID 
    let mayuscula=document.getElementById("mayusculas").checked;
    let minusculas=document.getElementById("minusculas").checked;
    let digitos=document.getElementById("digitos").checked;
    let caracteres=document.getElementById("caracteres").checked
    let longitud=document.getElementById("rango_password_usuario").value;
    
    let resultado="";
    // CREO UNAS VARIABLES CON LAS EXPRESIONES QUE QUIERO USAER 
    let expresionMayusculas="ABCÇDEFGHIJKLMNOPQRSTUVWXYZ";
    
    let expresionminusculas="abcçdefghijklmnopqrstuvwxyz";
     let expresionDigitos="0123456789";
     let expresionCaracteres="?¿)(/&%$·!ª+-*´}{][";
    // CREO UNOS CONDICIONALES PARA GUARDAR LAS EXPRESIONES SIN SON VERDADERAS
    if (mayuscula) {resultado+=expresionMayusculas;}
    if (minusculas) {resultado+=expresionminusculas;}
    if (digitos) {resultado+=expresionDigitos;}
    if (caracteres) {resultado+=expresionCaracteres;}
    
    // LLAMO A LA FUNCION GENERAR PASSWORD 
    let codigoPassword=generarPassword(resultado,longitud);
    
    // CREO LA VARIABLE PARA MOSTRAR EL RESULTADO
    let salidaResultado=document.getElementById("resultado_usuario");
    // MUESTRO EL RESULTADO POR PANTALLA
    salidaResultado.innerHTML=codigoPassword;
    // CREO UNA VARIABLE PARA MOSTRAR UNA PALABRA JUNSTO CON EL RESULTADO
    let texto=document.getElementById("salidaTexto");
    // CREO UNOS CONDICIONALES Y RECORRO EL RESULTADO SI ES MENOS DE 8 SE MUESTRA UN COLOR DE FONDO Y NA PALABRA CON UN COLOR ESPECIFICO
    if (codigoPassword.length<=8) {
        
        texto.innerHTML="BASICA";
        salidaResultado.style.backgroundColor="red";
        texto.style.color="red";
    }
    // CREO UNOS CONDICIONALES Y RECORRO EL RESULTADO SI ES MAYOR DE 10 SE MUESTRA UN COLOR DE FONDO Y NA PALABRA CON UN COLOR ESPECIFICO
    if (codigoPassword.length>=10) {
        
        texto.innerHTML="SEGURA";
        salidaResultado.style.backgroundColor="#1BD14E";
        texto.style.color="#1BD14E";
    }
    // CREO UNOS CONDICIONALES Y RECORRO EL RESULTADO SI ES MAYOR DE 12 SE MUESTRA UN COLOR DE FONDO Y NA PALABRA CON UN COLOR ESPECIFICO
    if (codigoPassword.length>=12) {
        
        texto.innerHTML="MUY BUENA";
        salidaResultado.style.backgroundColor="#B6BA0D";
        texto.style.color="#B6BA0D";
        
    }
    
    // CREO UNA FUNCION PARA QUE A LOS 10 SEGUNDOS DESAPAREZCA EL RESULTADO POR PANTALLA
    setTimeout(function (){
    
    salidaResultado.textContent="";
    
    },10000);
    
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

    // Reiniciar mensajes de error
    emailIncorrecto.innerText = "";
    passwordincorrecto.innerText = "";

    // Validar email y mostrar error si es necesario
    if (!emailValido) {
        // Mostrar mensaje de error para email
        emailIncorrecto.innerText = "Email Incorrecto";
        setTimeout(function () {
            emailIncorrecto.innerText = "";
        }, 10000); // 10000 milisegundos = 10 segundos
        return false;  // Detener la validación si el correo electrónico no es válido
    }

    // Validar contraseña y mostrar error si es necesario
    if (!passwordValida) {
        // Mostrar mensaje de error para contraseña
        passwordincorrecto.innerText = "Password Incorrecto min 8 letras 1 caracter y 1 digito ";
        setTimeout(function () {
            passwordincorrecto.innerText = "";
        }, 10000);
        return false;  // Detener la validación si la contraseña no es válida
    }

    // Realizar más validaciones según sea necesario
    if (accion === "sesion") {
        // Redirigir a funciones.php
         window.location.href = "funciones.php";
    }

    // Devolver true solo si ambos son válidos
    return true;
}







