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
    codigoPassword = codigoPassword.split('').reduce((prev, curr, i, arr) => {
        if (i > 0 && arr[i - 1].toLowerCase() === curr.toLowerCase()) {
            if (mayuscula && curr === curr.toUpperCase()) {
                return prev + curr.toLowerCase();
            } else if (minusculas && curr === curr.toLowerCase()) {
                return prev + curr.toUpperCase();
            } else if (digitos && !isNaN(curr)) {
                return prev + ((parseInt(curr) + 1) % 10).toString();
            }
        }
        return prev + curr;
    }, "");

    let salidaResultado = document.getElementById("resultado");
    salidaResultado.innerHTML = codigoPassword;

    setTimeout(function () {
        salidaResultado.textContent = "";
    }, 10000);
}


// LLAMO A LA FUNCION PASSWORD ALEATORIO
passwordAleatorio();





/******** MUESTRO EL NUMERO QAL DESLIZAR LA BARRA DE RANGO  */

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

