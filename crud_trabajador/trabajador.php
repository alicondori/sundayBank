<!-- hacemos la conexion -->
<?php include("../db.php") ?>
<!-- llamando al header -->
<?php include("../includes/header.php") ?>

<nav class="navbar navbar-dark bg-primary">
    <div class="container">
        <div class="col-md-8">
            <a href="../crud_cliente/cliente.php" class="navbar-brand">cliente</a>
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
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- para el mensaje con jquery -->
                <p class="text-uppercase">trabajador</p>
                <p class="font-italic">En esta seccion solo pueden acceder los Administradores del sistema</p>
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
                        <div class="form-row">
                            <div class="form-group col-md-4">
                            <input type="text" name="nombre" class="form-control" placeholder="nombre" autofocus>
                            </div>
                            <div class="form-group col-md-4">
                            <input type="text" name="app" class="form-control" placeholder="apellido paterno">
                             </div>
                             <div class="form-group col-md-4">
                            <input type="text" name="apm" class="form-control" placeholder="apellido materno">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-8">
                            <input type="text" name="direccion" class="form-control" placeholder="direccion">
                            </div>
                            <div class="form-group col-md-4">
                            <input type="email" name="email" class="form-control" placeholder="email">
                            </div>    

                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <input type="text" name="perfil" class="form-control" placeholder="perfil">
                            </div>
                            <div class="form-group col-md-6">
                                <input type="number" name="telefono" class="form-control" placeholder="telefono">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <select class="form-control" name="acceso" id="option">
                                <option value="administrador">administrador</option>
                                <option value="usuario">usuario</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" name="usuario" class="form-control" placeholder="usuario">
                            </div>
                            <div class="form-group col-md-4">
                                <input type="password" name="password" class="form-control" placeholder="password">
                            </div>
                        
                        </div>
                        
                        <input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar">
                    </form>
                </div>
            </div>
        </div>
        <div class="row p-4">
        <div class="col-md-12">
                  <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>nombre</th>
                            <th>ap paterno</th>
                            <th>ap materno</th>
                            <th>direccion</th>
                            <th>email</th>
                            <th>perfil</th>
                            <th>telefono</th>
                            <th>acceso</th>
                            <th>usuario</th>
                            <th>password</th>
                            <th>accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = "select * from trabajador";
                        $result_tasks = mysqli_query($conn,$query);

                        while($row = mysqli_fetch_array($result_tasks)){?>
                            <tr>
                                <td><?php echo $row['nombre']?></td>
                                <td><?php echo $row['app']?></td>
                                <td><?php echo $row['apm']?></td>
                                <td><?php echo $row['direccion']?></td>
                                <td><?php echo $row['email']?></td>
                                <td><?php echo $row['perfil']?></td>
                                <td><?php echo $row['telefono']?></td>
                                <td><?php echo $row['acceso']?></td>
                                <td><?php echo $row['usuario']?></td>
                                <td><?php echo $row['password']?></td>

                                <!-- esto es para los botones -->
                                <td>
                                    <!-- el ? significa una consulta -->
                                    <a href="edit.php?id=<?php echo $row['idtrabajador']?>" class="btn btn-secondary"><i class="fas fa-marker"></i></a>
                                    <a href="delete_task.php?id=<?php echo $row['idtrabajador']?>" class="btn btn-danger"><i class="far fa-trash-alt"></i></a>
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