<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.html");
    exit;
}

$id_usuario = $_SESSION['usuario_id'];

include("conexion.php");

$sql = "SELECT v.numero_vuelo, v.origen, v.destino, v.fecha_salida, v.hora_salida 
        FROM pasajeros p 
        JOIN vuelos v ON p.id_vuelo = v.id 
        WHERE p.id_usuario = ?";
        
$sentencia = $conexion->prepare($sql);
$sentencia->bind_param("i", $id_usuario);
$sentencia->execute();
$result = $sentencia->get_result();

echo "<h2>Mis Vuelos</h2>";
if ($result->num_rows > 0) {
    echo "<ul>";
    while ($row = $result->fetch_assoc()) {
        echo "<li>Vuelo: " . $row['numero_vuelo'] . " - Origen: " . $row['origen'] . " - Destino: " . $row['destino'] . " - Fecha de Salida: " . $row['fecha_salida'] . " - Hora de Salida: " . $row['hora_salida'] . "</li>";
    }
    echo "</ul>";
} else {
    echo "No tienes vuelos registrados.";
}

$conexion->close();
?>
