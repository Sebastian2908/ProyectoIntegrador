<?php
include 'conexion.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM vuelos WHERE id=$id";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $vuelo_numero = $_POST['vuelo_numero'];
    $destino = $_POST['destino'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $seccion = $_POST['seccion'];
    $aerolinea = $_POST['aerolinea'];

    $sql = "UPDATE vuelos SET vuelo_numero='$vuelo_numero', destino='$destino', fecha='$fecha', hora='$hora', seccion='$seccion', aerolinea='$aerolinea' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Vuelo actualizado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    Número de Vuelo: <input type="text" name="vuelo_numero" value="<?php echo $row['vuelo_numero']; ?>"><br>
    Destino: <input type="text" name="destino" value="<?php echo $row['destino']; ?>"><br>
    Fecha: <input type="date" name="fecha" value="<?php echo $row['fecha']; ?>"><br>
    Hora: <input type="time" name="hora" value="<?php echo $row['hora']; ?>"><br>
    Seccion: <input type="text" name="seccion" value="<?php echo $row['seccion']; ?>"><br>
    Aerolinea: <input type="text" name="aerolinea" value="<?php echo $row['aerolinea']; ?>"><br>
    <button type="submit">Actualizar Vuelo</button>
</form>
