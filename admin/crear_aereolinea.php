<?php
include('../conexion.php');

$sql_roles = "SELECT * FROM aerolineas";
$query_roles = mysqli_query($conexion, $sql_roles);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $codigo = $_POST['codigo'];  

    $sql_insert = "INSERT INTO aerolineas (nombre, codigo) VALUES ('$nombre', '$codigo')";
    $query_insert = mysqli_query($conexion, $sql_insert);

    if ($query_insert) {
        echo "<script>
                alert('Registro exitoso');
                setTimeout(function() {
                    window.location.href = 'aereolineas.php';
                }, 500); 
             </script>";
    } else {
        echo "Error al crear el usuario: " . mysqli_error($conexion);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Crear Aereolinea</title>
</head>
<body>
<div id="container_formulario_usuarios">
    <form action="crear_aereolinea.php" method="POST" class="formulariousuarios">
        <h1>Crear Aereolinea</h1>
        <input type="text" name="nombre" placeholder="Nombre" required><br>
        <input type="text" name="codigo" placeholder="Codigo" required><br>
        <input type="submit" value="Crear Aereolinea">
        <br>
        <br>
        <a href="aereolineas.php" class="volver_usuarios">Atras</a>
    </form>
</div>
</body>
</html>
