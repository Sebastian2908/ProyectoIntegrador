<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $vuelo_numero = $_POST['vuelo_numero'];
    $destino = $_POST['destino'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $seccio = $_POST['seccion'];
    $aerolinea = $_POST['aerolinea'];

    $sql = "INSERT INTO vuelos (vuelo_numero, destino, fecha, hora, precio) VALUES ('$vuelo_numero', '$destino', '$fecha', '$hora', '$seccion', '$aerolinea')";

    if ($conn->query($sql) === TRUE) {
        echo "Nuevo vuelo agendado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="POST">
    Número de Vuelo: <input type="text" name="vuelo_numero"><br>
    Destino: <input type="text" name="destino"><br>
    Fecha: <input type="date" name="fecha"><br>
    Hora: <input type="time" name="hora"><br>
    Seccion: <input type="text" name="seccion"><br>
    Aerolinea: <input type="text" name="aerolinea"><br>
    <button type="submit">Agendar Vuelo</button>
</form>
