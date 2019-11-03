<?php 
/* necesitamos tener la conexion aqui igual */
include("../db.php");


if(isset($_POST['save_task'])){
    /* me late que ese save_task es el name del btn */
    $nombre = $_POST['nombre'];
    $app = $_POST['app'];
    $apm = $_POST['apm'];
    $direccion = $_POST['direccion'];
    $email = $_POST['email'];
    $perfil = $_POST['perfil'];
    $telefono = $_POST['telefono'];
    $acceso = $_POST['acceso'];
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $query = "INSERT INTO trabajador(nombre, app,apm,direccion,email,perfil,telefono,acceso,usuario,password) VALUES ('$nombre','$app','$apm','$direccion','$email','$perfil','$telefono','$acceso','$usuario','$password')";
    $result = mysqli_query($conn,$query);
    if(!$result){
        /* el comando die detine la ejecucion */
        die("query failed");
    }

    $_SESSION['message']='guardado exitosamente';
    $_SESSION['message_type']='success';

    /* este es para que si la conxion es exitosa nos mande al index */
    header("Location: trabajador.php");
}
?>