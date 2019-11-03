<?php
    include("../db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $query ="select * from vis_cliente_cuenta where idcuenta = $id";
        $result=mysqli_query($conn,$query);
        if (mysqli_num_rows($result)== 1) {
            $row = mysqli_fetch_array($result);
            $ci = $row['ci'];
            $nombre = $row['nombre'];
            $numcuenta= $row['numcuenta'];
        }
    }

    /* usando el metodo post para guardar datos */

    if (isset($_POST['transaccion'])) {
        $id = $_GET['id'];
        $descripcion = $_POST['descripcion'];
        $montodeposito = $_POST['monto'];


        $query ="select * from cuenta where idcuenta = $id";
        $result = mysqli_query($conn,$query);
        $row = mysqli_fetch_array($result);

        if (!$result) {
            die("falla seleccion de cuenta");
        }
        $idcliente=$row['idclientefk'];
        $idcuenta=$row['idcuenta'];
        $monto =$row['monto'];
        /* recuperando el id de inicio de session */
        $query ="select * from informacion where idsalvado != 'null'";
        $result = mysqli_query($conn,$query);
        if (!$result) {
            die("falla seleccion de idsalvado");
        }
        $row = mysqli_fetch_array($result);
        $idtrabajador=$row['idsalvado'];

       
        echo "como es";

        /* haciendo el calculo */
        $total=$monto+$montodeposito;

        /*guardando datos en la tabla detalle */
        $query = "INSERT INTO detalle(idtrabajadorfk,idclientefk,idcuentafk,descripcion,monto) VALUES('$idtrabajador','$idcliente','$idcuenta','$descripcion','$montodeposito')";
        $result = mysqli_query($conn,$query);

        /* guardando eldinero en la cuenta */
        $query = "UPDATE cuenta set monto= '$total' where idcuenta = $idcuenta";
        $result = mysqli_query($conn,$query);

        if (!$result) {
            die("query falied");
        }

        $_SESSION['message']='depositado exitosamente';
        $_SESSION['message_type']='success';
        header("Location: transaccion.php");
    }
?>

<?php include("../includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
                <form action="depositar_task.php?id=<?php echo $_GET['id']; ?>" method="POST">

                    <div class="form-group">
                        <input type="text" name="nombre" value="<?php echo $nombre; ?>" class="form-control"
                        readonly="readonly"             placeholder="nombre">
                    </div>

                    <div class="form-group">
                        <input type="text" name="numcuenta" value="<?php echo $numcuenta; ?>" class="form-control"
                        readonly="readonly"             placeholder="num cuenta">
                    </div>     

                     <div class="form-group">
                        <input type="text" name="ci" value="<?php echo $ci; ?>" class="form-control"
                        readonly="readonly"             placeholder="cedula identidad">
                    </div>

                    <div class="form-group">
                        <input type="text" name="descripcion" class="form-control"
                        value="deposito"
                        readonly="readonly"
                        placeholder="descripcion">
                    </div>

                    <div class="form-group">
                        <input type="text" name="monto"
                        class="form-control" placeholder="monto">
                    </div>                   
                    
                    <button class="btn btn-success" name="transaccion">depositar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("../includes/footer.php") ?>