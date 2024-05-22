<?php
include('../conexion.php');

$id = $_GET['id'];

$sql_usuario = "SELECT * FROM aerolineas WHERE id='$id'";
$query_aereolinea = mysqli_query($conexion, $sql_usuario);
$row_usuario = mysqli_fetch_array($query_aereolinea);


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $nombre = $_POST['nombre'];
    $codigo = $_POST['codigo'];

    $sql_update = "UPDATE aerolineas SET nombre='$nombre', codigo='$codigo' WHERE id='$id'";
    $query_update = mysqli_query($conexion, $sql_update);

    if ($query_update) {
        echo "<script>
                alert('Registro actualizado');
                setTimeout(function() {
                    window.location.href = 'aereolineas.php';
                }, 50); 
             </script>";
    } else {
        echo "Error al actualizar el usuario: " . mysqli_error($conexion);
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <title>Editar Usuario</title>
</head>
<body>
<div id="container_formulario_usuarios">
        <form action="editar_aereolinea.php" method="POST" class="formulariousuarios">
            <h1>Editar Usuario</h1>

            <input type="hidden" name="id" value="<?= $row_usuario['id'] ?>">
            <input type="text" name="nombre" placeholder="Nombre" value="<?= $row_usuario['nombre'] ?>" require>
            <input type="text" name="codigo" placeholder="Codigo" value="<?= $row_usuario['codigo'] ?>" require>
            
            <input type="submit" value="Actualizar Información">
            <br>
            <br>
            <a href="aereolineas.php" class="volver_usuarios">Atras</a>
        </form>
    </div>
</body>
</html>
