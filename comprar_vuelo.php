<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];
    $id_vuelo = $_POST['id_vuelo'];
    $id_usuario = $_SESSION['usuario_id']; 

    include('conexion.php');

    $sql = "INSERT INTO pasajeros (nombre, apellido, correo, telefono, fecha_nacimiento, id_vuelo, id_usuario) 
            VALUES ('$nombre', '$apellido', '$correo', '$telefono', '$fecha_nacimiento', '$id_vuelo', '$id_usuario')";

    if (mysqli_query($conexion, $sql)) {
        echo "<script>
                alert('Registro exitoso');
                setTimeout(function() {
                    window.location.href = 'index.php';
                }, 500); 
             </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
    }

    mysqli_close($conexion);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comprar Vuelo</title>
    <link rel="stylesheet" href="css/estilos.css"> 
</head>
<body>
<div class="home">
    <div id="main-container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="formulariousuarios">
            <h2>Comprar Vuelo</h2>
            <input type="hidden" name="id_vuelo" value="<?php echo htmlspecialchars($_GET['id_vuelo']); ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required><br>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="apellido" required><br>

            <label for="correo">Correo:</label>
            <input type="email" id="correo" name="correo" required><br>

            <label for="telefono">Teléfono:</label>
            <input type="tel" id="telefono" name="telefono" required><br>

            <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
            <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" required><br>

            <input type="submit" value="Comprar Vuelo">
            <a href="index.php">Inicio</a>
        </form>
    </div> 
</div>        
</body>
</html>
