<?php

/*=========PARA CONECTAR CON MYSQL WORBENCH =============*/

/* class Conexion
{ */

    /**
     * Conexión a la base datos
     *
     * @return PDO
     */
    /* public static function conectar()
    {
        try {

            $cn = new PDO("mysql:host=192.168.3.110;dbname=sundayBank", "root", "");
            $cn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $cn;

        } catch (PDOException $ex) {
            die($ex->getMessage());
        }
    } */
/* 
} */

/*=========PARA CONECTAR CON PHPMYSQLADMIN DE XAMPP =============*/

/* creamos una sesion para para rescatar un mensaje */
session_start();



$conn = mysqli_connect(
    'localhost',
    'root',
    '',
    'sundayBank'
);
/* if(isset($conn)){
    echo 'conexion exitosa';
} */



?>