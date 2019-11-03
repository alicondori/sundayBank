<?php
include("db.php");

$query = "delete from informacion where idinformacion != 'null'";
$result = mysqli_query($conn,$query);
if (!$result) {
    die("query failed");
}
$_SESSION['message']='session cerrada exitosamente';
$_SESSION['message_type']='success';
header("Location: index.php");
?>