<?php
    include("../db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query ="select * from cliente where idcliente = $id";
        $result=mysqli_query($conn,$query);
        if (mysqli_num_rows($result)== 1) {
            $row = mysqli_fetch_array($result);
            $nombre = $row['nombre'];
            $app = $row['app'];
            $apm = $row['apm'];
            $ci = $row['ci'];
        }
    }

    /* usando el metodo post para actualizar datos */

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $nombre = $_POST['nombre'];
        $app = $_POST['app'];
        $apm = $_POST['apm'];
        $ci = $_POST['ci'];

        $query = "UPDATE cliente set nombre= '$nombre', app= '$app',apm='$apm',ci='$ci' where idcliente = $id";

        $result = mysqli_query($conn,$query);
        if (!$result) {
            die("query falied");
        }

        $_SESSION['message']='actualizado exitosamente';
        $_SESSION['message_type']='warning';
        header("Location: cliente.php");
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
                        <input type="text" name="ci" value="<?php echo $ci; ?>" class="form-control" placeholder="actualize cedula identidad">
                    </div>
                    
                    <button class="btn btn-success" name="update">actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("../includes/footer.php") ?>