<?php
    include("../db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query ="select * from cliente where idcliente = $id";
        $result=mysqli_query($conn,$query);
        if (mysqli_num_rows($result)== 1) {
            $row = mysqli_fetch_array($result);
            $ci = $row['ci'];
            $nombre = $row['nombre'];
        }
    }

    /* usando el metodo post para guardar datos */

    if (isset($_POST['create'])) {
        $id = $_GET['id'];
        $numcuenta = $_POST['numcuenta'];
        $monto = $_POST['monto'];

        $query = "INSERT INTO cuenta(numcuenta,idclientefk,monto) VALUES('$numcuenta','$id','$monto')";

        $result = mysqli_query($conn,$query);
        if (!$result) {
            die("query falied");
        }

        $_SESSION['message']='creado exitosamente';
        $_SESSION['message_type']='success';
        header("Location: cuenta.php");
    }
?>

<?php include("../includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="create_task.php?id=<?php echo $_GET['id']; ?>" method="POST">

                    <div class="form-group">
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control"
                        readonly="readonly"             placeholder="actualize cedula mpnbre">
                    </div>    

                     <div class="form-group">
                        <input type="text" name="ci" value="<?php echo $ci; ?>" class="form-control"
                        readonly="readonly"             placeholder="actualize cedula identidad">
                    </div>

                    <div class="form-group">
                        <input type="text" name="numcuenta" class="form-control" placeholder="numero cuenta">
                    </div>

                    <div class="form-group">
                        <input type="text" name="monto"
                        class="form-control" placeholder="monto">
                    </div>                   
                    
                    <button class="btn btn-success" name="create">crear cuenta</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("../includes/footer.php") ?>