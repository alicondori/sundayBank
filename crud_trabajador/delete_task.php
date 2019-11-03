<?php
include("../db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "delete from trabajador where idtrabajador = $id";
    $result = mysqli_query($conn,$query);
    if (!$result) {
        die("query failed");
    }

    $_SESSION['message']='eliminado exitosamente';
    $_SESSION['message_type']='danger';

    header("Location: trabajador.php");
}
?>