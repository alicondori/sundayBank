<?php 
/* necesitamos tener la conexion aqui igual */
include("../db.php");


if(isset($_POST['save_task'])){
    /* me late que ese save_task es el name del btn */
    $nombre = $_POST['nombre'];
    $app = $_POST['app'];
    $apm = $_POST['apm'];
    $ci = $_POST['ci'];

    $query = "INSERT INTO cliente(nombre, app,apm,ci) VALUES ('$nombre','$app','$apm','$ci')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        /* el comando die detine la ejecucion */
        die("query failed");
    }

    $_SESSION['message']='guardado exitosamente';
    $_SESSION['message_type']='success';

    /* este es para que si la conxion es exitosa nos mande al index */
    header("Location: cliente.php");
}
?>