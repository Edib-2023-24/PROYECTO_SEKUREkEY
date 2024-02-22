

function passwordAleatorio() {
    // CHEQUEO Y GUARDO EN  VARIABLES 
    let mayuscula = document.getElementById("mayusculas").checked;
    let minusculas = document.getElementById("minusculas").checked;
    let digitos = document.getElementById("digitos").checked;
    let longitud = document.getElementById("rango_password").value;
    // CREO LAS VARIAVBLES CON LAS MAYUSUCULAS,MINUSUCLAS Y DIGITOS 
    let caracteres = "";
    let expresionMayusculas = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    let expresionminusculas = "abcdefghijklmnopqrstuvwxyz";
    let expresionDigitos = "0123456789";
    // GUARDO EN LAS VARIABLES SI SON TRUE AL HABER CHEQUEADO LAS MAYUSUCLAS ,MINUSCULAS Y DIGITOS
    if (mayuscula) { caracteres += expresionMayusculas; }
    if (minusculas) { caracteres += expresionminusculas; }
    if (digitos) { caracteres += expresionDigitos; }

    // CUARDO EN UNA VARIABLE LA FUNCION PARA GENERAR EL PASSWORD LE PASO LA VARIABLE DONDE SE GUARDO LA MAYUSCULA,MINUSUCLA Y DIGITOS Y LA VARIABLE DE LA LONGITUD DE3LE PASSWORD
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
// MUESTRO EL PASSWORD 
    let salidaResultado = document.getElementById("resultado");
    salidaResultado.innerHTML = codigoPassword;
// UTILIZO LA FUNCION SETIMEOUT PARA QUE SE VEA EL PASSWORD 10 SEGUNDOS Y LUEGO DESAPAREZCA
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

