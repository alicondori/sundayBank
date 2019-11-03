<?php
    include("../db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query ="select * from trabajador where idtrabajador = $id";
        $result=mysqli_query($conn,$query);
        if (mysqli_num_rows($result)== 1) {
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre'];
            $app = $row['app'];
            $apm = $row['apm'];
            $direccion = $row['direccion'];
            $email = $row['email'];
            $perfil = $row['perfil'];
            $telefono = $row['telefono'];
            $acceso = $row['acceso'];
            $usuario = $row['usuario'];
            $password = $row['password'];
        }
    }

    /* usando el metodo post para actualizar datos */

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
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

        $query = "UPDATE trabajador set nombre= '$nombre', app= '$app',apm='$apm',direccion='$direccion',email='$email',perfil='$perfil',telefono='$telefono',acceso='$acceso',usuario='$usuario',password='$password' where idtrabajador = $id";

        $result = mysqli_query($conn,$query);
        if (!$result) {
            die("query falied");
        }

        $_SESSION['message']='actualizado exitosamente';
        $_SESSION['message_type']='warning';
        header("Location: trabajador.php");
    }
?>

<?php include("../includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="edit.php?id=<?php echo $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control" placeholder="actualize nombre">
                    </div>
                    <div class="form-group">
                        <input type="text" name="app" value="<?php echo $app; ?>" class="form-control" placeholder="actualize ap paterno">
                    </div>
                    <div class="form-group">
                        <input type="text" name="apm" value="<?php echo $apm; ?>" class="form-control" placeholder="actualize ap materno">
                    </div>
                    <div class="form-group">
                        <input type="text" name="direccion" value="<?php echo $direccion; ?>" class="form-control" placeholder="actualize direccion">
                    </div>
                    <div class="form-group">
                        <input type="email" name="email" value="<?php echo $email; ?>" class="form-control" placeholder="actualize email">
                    </div>
                    <div class="form-group">
                        <input type="text" name="perfil" value="<?php echo $perfil; ?>" class="form-control" placeholder="actualize perfil">
                    </div>
                    <div class="form-group">
                        <input type="number" name="telefono" value="<?php echo $telefono; ?>" class="form-control" placeholder="actualize telefono">
                    </div>
                    <div class="form-group">
                        <input type="text" name="acceso" value="<?php echo $acceso; ?>" class="form-control" placeholder="actualize acceso">
                    </div>
                    <div class="form-group">
                        <input type="text" name="usuario" value="<?php echo $usuario; ?>" class="form-control" placeholder="actualize usuario">
                    </div>
                    <div class="form-group">
                        <input type="text" name="password" value="<?php echo $password; ?>" class="form-control" placeholder="actualize contraseña">
                    </div>

                    <button class="btn btn-success" name="update">actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("../includes/footer.php") ?>