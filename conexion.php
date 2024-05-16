<?php 

$direccionservidor="localhost";
$baseDatos="proyectointegrador";
$usuarioDB="root";
$contraseniaDB="";

$conexion = new mysqli($direccionservidor, $usuarioDB, $contraseniaDB, $baseDatos);

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

?>