<!-- hacemos la conexion -->
<?php include("../db.php") ?>
<!-- llamando al header -->
<?php include("../includes/header.php") ?>

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <div class="col-md-8">
            <a href="../crud_cliente/cliente.php" class="navbar-brand">cliente</a>
            <a href="cuenta.php" class="navbar-brand text-uppercase">cuenta</a>
            <a href="../crud_transaccion/transaccion.php" class="navbar-brand">transaccion</a>
        </div>
        <div class="row ">
            <div class="col-md-12">
                <a href="../reporte.php" class="btn btn-outline-light">Reporte</a>
                <a href="../close.php" class="btn btn-outline-warning">Salir</a>
            </div>
        </div>
    </div>
</nav>


    <div class="container p-4">
        <div class="row">
            <div class="col-md-5">
                <!-- para el mensaje con jquery -->

                <?php if(isset($_SESSION['message'])) {?>
                        <div class="alert alert-<?= $_SESSION['message_type'];?> alert-dismissible fade show" role="alert">
                        <?= $_SESSION['message'] ?>
                       <!--  <strong>Holy guacamole!</strong> You should check in on some of those fields below. -->
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                <?php session_unset(); }?> <!-- este comando es para que el mensaje solo aprezca una vez -->
                 <!-- ----------- -->

                <!-- tabla cliente -->
                <div >
                <p class="text-uppercase">crear una cuenta apartir de un cliente</p>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>nombre</th>
                                <th>ap paterno</th>
                                <th>ap materno</th>
                                <th>cedula identidad</th>
                                <th>accion</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "select * from cliente";
                            $result_tasks = mysqli_query($conn,$query);

                            while($row = mysqli_fetch_array($result_tasks)){?>
                                <tr>
                                    <td><?php echo $row['nombre']?></td>
                                    <td><?php echo $row['app']?></td>
                                    <td><?php echo $row['apm']?></td>
                                    <td><?php echo $row['ci']?></td>
                                    <!-- esto es para los botones -->
                                    <td>
                                        <!-- el ? significa una consulta -->
                                        <a href="create_task.php?id=<?php echo $row['idcliente']?>" class="btn btn-success"><i class="far fa-plus-square"></i></a>
                                    </td>
                                </tr>

                            <?php } ?>
                        </tbody>
                    </table> 
                </div>

            </div>

            <!-- para mostrar las tablas con datos de la db -->
            <div class="col-md-7">
            <p class="text-uppercase">cuentas</p>
                  <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>No cuenta</th>
                            <th>cedula identidad</th>
                            <th>nombre</th>
                            <th>monto</th>
                            <th>accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "select * from vis_cliente_cuenta";
                        $result_tasks = mysqli_query($conn,$query);

                        while($row = mysqli_fetch_array($result_tasks)){?>
                            <tr>
                                <td><?php echo $row['numcuenta']?></td>
                                <td><?php echo $row['ci']?></td>
                                <td><?php echo $row['nombre']?></td>
                                <td><?php echo $row['monto']?></td>
                                <!-- esto es para los botones -->
                                <td>
                                    <!-- el ? significa una consulta -->
                                    <a href="delete_task.php?id=<?php echo $row['idcuenta']?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                  </table> 
            </div>
        </div>
    </div>

<!-- llamando al footer -->
<?php include("../includes/footer.php") ?>