<!-- hacemos la conexion -->
<?php include("../db.php") ?>
<!-- llamando al header -->
<?php include("../includes/header.php") ?>

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <div class="col-md-8">
            <a href="cliente.php" class="navbar-brand text-uppercase">cliente</a>
            <a href="../crud_cuenta/cuenta.php" class="navbar-brand">cuenta</a>
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
            <div class="col-md-4">
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
                
                <div class="card card-body">
                    <!-- el action y method es el que nos manda al otro archivo -->
                    <form action="save_task.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="nombre" class="form-control" placeholder="nombre" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="text" name="app" class="form-control" placeholder="apellido paterno">
                        </div>
                        <div class="form-group">
                            <input type="text" name="apm" class="form-control" placeholder="apellido materno">
                        </div>
                        <div class="form-group">
                            <input type="text" name="ci" class="form-control" placeholder="cedula identidad">
                        </div>
                        
                        <input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar">
                    </form>
                </div>
            </div>

            <!-- para mostrar las tablas con datos de la db -->
            <div class="col-md-8">
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
                                    <a href="edit.php?id=<?php echo $row['idcliente']?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>
                                    <a href="delete_task.php?id=<?php echo $row['idcliente']?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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