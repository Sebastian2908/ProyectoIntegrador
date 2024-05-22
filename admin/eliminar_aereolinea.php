<?php
include('../conexion.php');

$id = $_GET['id'];

$sql = "DELETE FROM aerolineas WHERE id = '$id'";

$query = mysqli_query($conexion, $sql);

if($query){
    Header("Location: aereolineas.php");
};

?>