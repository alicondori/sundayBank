<?php 
/* necesitamos tener la conexion aqui igual */
include("db.php");

if(isset($_POST['login_task'])){
    /* me late que ese save_task es el name del btn */
    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $query = "SELECT acceso,idtrabajador FROM trabajador WHERE usuario='$usuario' and password ='$password'";
    $result = mysqli_query($conn,$query);

    if(!$result){
        /* el comando die detine la ejecucion */
        die("query failed");
    }
    /* verifica si existe un usuario */
    if (mysqli_num_rows($result)== 1) {
        $row = mysqli_fetch_array($result);
        $acceso= $row['acceso'];
        $idtrabajador =$row['idtrabajador'];


        $query ="INSERT INTO informacion(idsalvado) VALUES('$idtrabajador')";
        $result = mysqli_query($conn,$query);
        /* dependiendo del tipo de usuario lo mandamos a diferentes archivos */

        if ($acceso=='administrador') {
            $_SESSION['message']='acceso de Administrador';
            $_SESSION['message_type']='success';
            header("Location: crud_trabajador/trabajador.php");
        }else{
            $_SESSION['message']='acceso de usuario';
            $_SESSION['message_type']='success';
            header("Location: crud_cliente/cliente.php");
        }
    }
    else{
        $_SESSION['message']='Ingrese un usuario y contraseña validos';
        $_SESSION['message_type']='danger';
        header("Location: index.php");
    }
}
?>