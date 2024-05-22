<?php 
    session_start();

    if (!isset($_SESSION['usuario_id'])) {
        header("Location: ../login.html");
        exit();
    }

    include('../conexion.php');

    $query_aerolineas = mysqli_query($conexion, "SELECT id, nombre FROM aerolineas");
    if (!$query_aerolineas) {
        die('Error en la consulta: ' . mysqli_error($conexion));
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $numero_vuelo = $_POST['numero_vuelo'];
        $id_aerolinea = $_POST['id_aerolinea'];
        $origen = $_POST['origen'];
        $destino = $_POST['destino'];
        $fecha_salida = $_POST['fecha_salida'];
        $hora_salida = $_POST['hora_salida'];
        $fecha_llegada = $_POST['fecha_llegada'];
        $hora_llegada = $_POST['hora_llegada'];
        // $estado = $_POST['estado'];

        $sql = "INSERT INTO vuelos (numero_vuelo, id_aerolinea, origen, destino, fecha_salida, hora_salida, fecha_llegada, hora_llegada, estado) 
                VALUES ('$numero_vuelo', '$id_aerolinea', '$origen', '$destino', '$fecha_salida', '$hora_salida', '$fecha_llegada', '$hora_llegada', 'Programado')";

        if (mysqli_query($conexion, $sql)) {
            echo "<script>
                    alert('Registro exitoso');
                    setTimeout(function() {
                        window.location.href = 'vuelos.php';
                    }, 500); 
                </script>";
        } else {
            die('Error en la consulta: ' . mysqli_error($conexion));
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Agregar Vuelo</title>
</head>
<body>
    <div id="container_formulario_usuarios">
        <form action="crear_vuelo.php" method="POST" class="formulariousuarios">
            <h1>Agregar Vuelo</h1>
            <input type="text" name="numero_vuelo" placeholder="Número de Vuelo" required><br>
            
            <label for="id_aerolinea">Aerolínea:</label>
            <select name="id_aerolinea" required>
                <?php while ($row_aerolineas = mysqli_fetch_array($query_aerolineas)): ?>
                    <option value="<?= $row_aerolineas['id'] ?>">
                        <?= $row_aerolineas['nombre'] ?>
                    </option>
                <?php endwhile; ?>
            </select><br>
            
            <div class="input-group">
                <input type="text" name="origen" placeholder="Origen" required>
                <input type="text" name="destino" placeholder="Destino" required>
            </div>
            <label for="">Salida:</label>
            <div class="input-group">
                <input type="date" name="fecha_salida" placeholder="Fecha de Salida" required><br>
                <input type="time" name="hora_salida" placeholder="Hora de Salida" required><br>
            </div>
            <label for="">Llegada:</label>
            <div class="input-group">
                <input type="date" name="fecha_llegada" placeholder="Fecha de Llegada" required><br>
                <input type="time" name="hora_llegada" placeholder="Hora de Llegada" required><br>
            </div>
            
            <input type="submit" value="Agregar Vuelo"><br><br>
            <a href="vuelos.php" class="volver_usuarios">Atras</a>
        </form>
    </div>
</body>
</html>
