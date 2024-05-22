<?php
include('../conexion.php');

$id = $_GET['id'];

$sql = "DELETE FROM vuelos WHERE id = '$id'";

$query = mysqli_query($conexion, $sql);

if($query){
    Header("Location: vuelos.php");
};

?>