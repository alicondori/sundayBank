<!-- hacemos la conexion -->
<?php include("db.php") ?>
<!-- llamando al header -->
<?php include("includes/header.php") ?>

    <div class="container p-4">
        <div class="row">
            <div class="col-md-4 mx-auto">
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
                    <form action="login_task.php" method="POST">
                        <h1 style="text-align:center">Login</h1>
                        <div class="form-group">
                            <input type="text" name="usuario" class="form-control" placeholder="usuario" autofocus>
                        </div>
                        <div class="form-group">
                            <input type="password" name="password" class="form-control" placeholder="contraseña">
                        </div>
                        <input type="submit" class="btn btn-success btn-block" name="login_task" value="Ingresar">
                    </form>
                </div>
                <p class="text-muted"> <br> usuario: ali <br>password: 1234</p>
            </div>
        </div>
    </div>

<!-- llamando al footer -->
<?php include("includes/footer.php") ?>