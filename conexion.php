<?php 

$direccionservidor="localhost";
$baseDatos="proyectointegrador";
$usuarioDB="root";
$contraseniaDB="";

// Crear una nueva conexión a la base de datos
$conexion = new mysqli($direccionservidor, $usuarioDB, $contraseniaDB, $baseDatos);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

?>