



// FUNCION PARA GENERAR NUMERO ALEATORIO SIN USUARIO
function passwordAleatorio() {
    // RECOGO LOS VALORES DE LOS INPUTS Y EL RANGO DE NUMERO
   let mayuscula=document.getElementById("mayusculas").checked;
   let minusculas=document.getElementById("minusculas").checked;
  let digitos=document.getElementById("digitos").checked;
  let longitud=document.getElementById("rango_password").value;
// CREO VARIABLE PARA GUARDAR EL RESULTADO
 let caracteres="";
// CREO EXPRESION REGULAR CON MAYUSUCLA MINUSCULA Y NUMEROS
 let expresionMayusculas="ABCDEFGHIJKLMNOPQRSTUVWXYZ";
 let expresionminusculas="abcdefghijklmnopqrstuvwxyz";
 let expresionDigitos="0123456789";

 // CREO CONDICIONALES PARA GUARDAR LOS INPUTS 
 if (mayuscula) {caracteres+=expresionMayusculas;}
 if (minusculas) {caracteres+=expresionminusculas;}
if (digitos) { caracteres+=expresionDigitos;}

// LLAMO A LA FUNCION GENERAR PASSWORD 
let codigoPassword=generarPassword(caracteres,longitud);

let salidaResultado=document.getElementById("resultado");

salidaResultado.innerHTML=codigoPassword;

// HAGO DESAPARARECER EL PASSWORD A LOS 5 SEGUNDOS
setTimeout(function(){
salidaResultado.textContent="";

},10000);

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

