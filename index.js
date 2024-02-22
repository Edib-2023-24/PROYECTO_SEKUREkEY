

function passwordAleatorio() {
    let mayuscula = document.getElementById("mayusculas").checked;
    let minusculas = document.getElementById("minusculas").checked;
    let digitos = document.getElementById("digitos").checked;
    let longitud = document.getElementById("rango_password").value;

    let caracteres = "";
    let expresionMayusculas = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    let expresionminusculas = "abcdefghijklmnopqrstuvwxyz";
    let expresionDigitos = "0123456789";

    if (mayuscula) { caracteres += expresionMayusculas; }
    if (minusculas) { caracteres += expresionminusculas; }
    if (digitos) { caracteres += expresionDigitos; }

    let codigoPassword = generarPassword(caracteres, longitud);

    // CONDICIONALES PARA QUE HNO HAYA DOS CARACTERES IGUALES 
    codigoPassword = codigoPassword.split('').reduce((resultadoParcial, elementoActual, i, original) => {
        if (i > 0 && original[i - 1].toLowerCase() === elementoActual.toLowerCase()) {
            if (mayuscula && elementoActual === elementoActual.toUpperCase()) {
                return resultadoParcial + elementoActual.toLowerCase();
            } else if (minusculas && elementoActual === elementoActual.toLowerCase()) {
                return resultadoParcial + elementoActual.toUpperCase();
            } else if (digitos && !isNaN(elementoActual)) {
                return resultadoParcial + ((parseInt(elementoActual) + 1) % 10).toString();
            }
        }
        return resultadoParcial + elementoActual;
    }, "");

    let salidaResultado = document.getElementById("resultado");
    salidaResultado.innerHTML = codigoPassword;

    setTimeout(function () {
        salidaResultado.textContent = "";
    }, 10000);
}


// LLAMO A LA FUNCION PASSWORD ALEATORIO
passwordAleatorio();





/******** MUESTRO EL NUMERO QAL DESLIZAR LA BoriginalA DE RANGO  */

let rango=document.getElementById("rango_password");
  let valor_actual=document.getElementById("valor_actual");
  rango.addEventListener('input',function(){
  
      valor_actual.textContent=rango.value;
  
  
  });

  
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

