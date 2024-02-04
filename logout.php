<?php

session_start();

// DESTRUYO LA SESION
session_destroy();

// REDIRIGO A LA PAGINA INICIO
header("Location: index.php");
exit();
?>