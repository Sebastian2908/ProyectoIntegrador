<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Vuelos</title>
    <link rel="stylesheet" href="css/estilos.css"> 
    
</head>
<body>

</body>
</html>

<?php
include('conexion.php'); 

$sql = "SELECT * FROM vuelos";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $fecha = $_POST['fecha'];

    if (!empty($origen)) {
        $sql .= " WHERE origen LIKE '%$origen%'";
        if (!empty($destino)) {
            $sql .= " AND destino LIKE '%$destino%'";
        }
        if (!empty($fecha)) {
            $sql .= " AND fecha_salida >= '$fecha'";
        }
    }

    $result = mysqli_query($conexion, $sql);

    if (!$result) {
        echo "Error en la consulta: " . mysqli_error($conexion);
    } else {
        
        echo "<div class='vuelos-disponibles'>";
        echo "<h2>Vuelos Disponibles:</h2>";
        echo "<a href='index.php' class='btn-comprar'>Inicio</a> <br>
        <br>";
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>{$row['numero_vuelo']} - Origen: {$row['origen']} - Destino: {$row['destino']} - Fecha de Salida: {$row['fecha_salida']} - Hora de Salida: {$row['hora_salida']} <a href='comprar_vuelo.php?id_vuelo={$row['id']}' class='btn-comprar'>Comprar</a></li>";
        }
        echo "</ul>";
        echo "</div>";
    }

    
    mysqli_close($conexion);
} else {
    
    $result = mysqli_query($conexion, $sql);

    if (!$result) {
        echo "Error en la consulta: " . mysqli_error($conexion);
    } else {
        
        echo "<div class='todos-los-vuelos'>";
        echo "<h2>Todos los Vuelos Disponibles:</h2>";
        echo "<ul>";
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<li>{$row['numero_vuelo']} - Origen: {$row['origen']} - Destino: {$row['destino']} - Fecha de Salida: {$row['fecha_salida']} - Hora de Salida: {$row['hora_salida']} <a href='comprar_vuelo.php?id_vuelo={$row['id']}'>Comprar</a></li>";
        }
        echo "</ul>";
        echo "</div>";
    }

    
    mysqli_close($conexion);
}

?>

