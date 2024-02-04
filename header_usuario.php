<?php
session_start();


// CONFIRMO SI LA CLAVE DE SESION ESTA 
if (isset($_SESSION['userName'])) {
    //  OBTENGO EL VALOR 
    $username = $_SESSION['userName'];
    
    // OBTENGO EL NOMBRE SIN EL DOMINIO Y LO PONGO EN
    $nombreUsuario =strtoupper(substr($username, 0, strpos($username, '@')));
   
   
} else {
    // VERIFICO SI LA CLAVE NO ESTUVIERA PRESENTE
    echo "Sesión no iniciada";
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <header class="header">
    <img class="logo" src="./img/desktop/LOGO.png" alt="logo">
    <h1>SEKUREKEY</h1>
    
      <a class="botones_inicio" href="logout.php"><span>LOGOUT</span></a>
      <a class="botones_inicio" href="password.php"><span>PASSWORD</span></a>
      <a class="botones_inicio" href="login.php"><span><?php echo $nombreUsuario ?></span></a>
    </header>
</body>
</html>