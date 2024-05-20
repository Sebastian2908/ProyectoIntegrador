<?php 
    session_start();

    if (!isset($_SESSION['usuario_id'])) {
        header("Location:../login.html");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
    <body>
        <a href="admin_cerrar.php">Cerrar sesion</a>
        <h1>Bienvenid@ <?php echo $_SESSION['usuario_nombre']; ?></h1>

        <h2>Reserva tu vuelos</h2>
        <p>vive la mejor experiencia con nosotros</p> 
    </body>
</html>