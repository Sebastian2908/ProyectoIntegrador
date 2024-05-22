<?php
include('../conexion.php');

$id = $_GET['id'];

$sql_vuelo = "SELECT * FROM vuelos WHERE id='$id'";
$query_vuelo = mysqli_query($conexion, $sql_vuelo);
$row_vuelo = mysqli_fetch_array($query_vuelo);

$sql_aerolineas = "SELECT id, nombre FROM aerolineas";
$query_aerolineas = mysqli_query($conexion, $sql_aerolineas);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $numero_vuelo = $_POST['numero_vuelo'];
    $id_aerolinea = $_POST['id_aerolinea'];
    $origen = $_POST['origen'];
    $destino = $_POST['destino'];
    $fecha_salida = $_POST['fecha_salida'];
    $hora_salida = $_POST['hora_salida'];
    $fecha_llegada = $_POST['fecha_llegada'];
    $hora_llegada = $_POST['hora_llegada'];
    $estado = $_POST['estado'];

    $sql_update = "UPDATE vuelos SET numero_vuelo='$numero_vuelo', id_aerolinea='$id_aerolinea', origen='$origen', destino='$destino', fecha_salida='$fecha_salida', hora_salida='$hora_salida', fecha_llegada='$fecha_llegada', hora_llegada='$hora_llegada', estado='$estado' WHERE id='$id'";
    $query_update = mysqli_query($conexion, $sql_update);

    if ($query_update) {
        echo "<script>
                alert('Vuelo actualizado');
                setTimeout(function() {
                    window.location.href = 'vuelos.php';
                }, 50); 
             </script>";
    } else {
        echo "Error al actualizar el vuelo: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Editar Vuelo</title>
</head>
<body>
    <div id="container_formulario_usuarios">
        <form action="editar_vuelo.php?id=<?= $id ?>" method="POST" class="formulariousuarios">
            <h1>Editar Vuelo</h1>

            <input type="hidden" name="id" value="<?= $row_vuelo['id'] ?>">
            <input type="text" name="numero_vuelo" placeholder="Número de Vuelo" value="<?= $row_vuelo['numero_vuelo'] ?>" required><br>

            <label for="id_aerolinea">Aerolínea:</label>
            <select name="id_aerolinea" required>
                <?php while ($row_aerolinea = mysqli_fetch_array($query_aerolineas)): ?>
                    <option value="<?= $row_aerolinea['id'] ?>" <?= ($row_aerolinea['id'] == $row_vuelo['id_aerolinea']) ? 'selected' : '' ?>>
                        <?= $row_aerolinea['nombre'] ?>
                    </option>
                <?php endwhile; ?>
            </select><br>

            <div class="input-group">
                <input type="text" name="origen" placeholder="Origen" value="<?= $row_vuelo['origen'] ?>" required>
                <input type="text" name="destino" placeholder="Destino" value="<?= $row_vuelo['destino'] ?>" required>
            </div>
            <label for="">Salida:</label>
            <div class="input-group">
                <input type="date" name="fecha_salida" placeholder="Fecha de Salida" value="<?= $row_vuelo['fecha_salida'] ?>" required><br>
                <input type="time" name="hora_salida" placeholder="Hora de Salida" value="<?= $row_vuelo['hora_salida'] ?>" required><br>
            </div>
            <label for="">Llegada:</label>
            <div class="input-group">
                <input type="date" name="fecha_llegada" placeholder="Fecha de Llegada" value="<?= $row_vuelo['fecha_llegada'] ?>" required><br>
                <input type="time" name="hora_llegada" placeholder="Hora de Llegada" value="<?= $row_vuelo['hora_llegada'] ?>" required><br>
            </div>
            <label for="estado">Estado:</label>
            <select name="estado" required>
                <option value="Programado" <?= ($row_vuelo['estado'] == 'Programado') ? 'selected' : '' ?>>Programado</option>
                <option value="En vuelo" <?= ($row_vuelo['estado'] == 'En vuelo') ? 'selected' : '' ?>>En vuelo</option>
                <option value="Aterrizado" <?= ($row_vuelo['estado'] == 'Aterrizado') ? 'selected' : '' ?>>Aterrizado</option>
                <option value="Cancelado" <?= ($row_vuelo['estado'] == 'Cancelado') ? 'selected' : '' ?>>Cancelado</option>
            </select><br>

            <input type="submit" value="Actualizar Vuelo">
            <br>
            <br>
            <a href="vuelos.php" class="volver_usuarios">Atrás</a>
        </form>
    </div>
</body>
</html>
