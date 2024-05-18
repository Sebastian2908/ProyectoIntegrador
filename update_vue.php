<?php
include 'conexion.php';

$row = null; // Inicializamos la variable $row

if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Asegurarse de que id sea un entero

    // Utilizar prepared statements para mayor seguridad
    $stmt = $conn->prepare("SELECT * FROM vuelos WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stmt->close();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $vuelo_numero = $_POST['vuelo_numero'];
    $destino = $_POST['destino'];
    $fecha = $_POST['fecha'];
    $hora = $_POST['hora'];
    $seccion = $_POST['seccion'];
    $aerolinea = $_POST['aerolinea'];

    // Utilizar prepared statements para mayor seguridad
    $stmt = $conn->prepare("UPDATE vuelos SET Numero_vuelo = ?, Destino = ?, Fecha = ?, Hora = ?, Seccion = ?, Aerolinea = ? WHERE id = ?");
    $stmt->bind_param("ssssssi", $vuelo_numero, $destino, $fecha, $hora, $seccion, $aerolinea, $id);

    if ($stmt->execute() === TRUE) {
        echo "Vuelo actualizado exitosamente";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<form method="POST">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id'] ?? ''); ?>">
    Número de Vuelo: <input type="text" name="vuelo_numero" value="<?php echo htmlspecialchars($row['Numero_vuelo'] ?? ''); ?>" required><br>
    Destino: <input type="text" name="destino" value="<?php echo htmlspecialchars($row['Destino'] ?? ''); ?>" required><br>
    Fecha: <input type="date" name="fecha" value="<?php echo htmlspecialchars($row['Fecha'] ?? ''); ?>" required><br>
    Hora: <input type="time" name="hora" value="<?php echo htmlspecialchars($row['Hora'] ?? ''); ?>" required><br>
    Sección: <input type="text" name="seccion" value="<?php echo htmlspecialchars($row['Seccion'] ?? ''); ?>" required><br>
    Aerolínea: <input type="text" name="aerolinea" value="<?php echo htmlspecialchars($row['Aerolinea'] ?? ''); ?>" required><br>
    <button type="submit">Actualizar Vuelo</button>
</form>
