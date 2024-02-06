<?php


// CREO LA CONEXON CON PDO PARA DARLE MAS SEUGIRAD A LA CONEXION 
class Conexion extends PDO {

    private $localhost = "localhost";
    private $bbdd = "registro";
    private $user = "edib";
    private $password = "edib";

    public function __construct() {
        try {
            parent::__construct('mysql:host=' . $this->localhost . ';dbname=' . $this->bbdd, $this->user, $this->password);
            $this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $e) {
            echo "Error al conectar a la base de datos: " . $e->getMessage();
            exit;
        }
    }
}

?>
