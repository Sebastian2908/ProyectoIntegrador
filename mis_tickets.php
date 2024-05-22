<?php
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location: ../login.html");
    exit();
}

include('conexion.php');

$id_usuario = $_SESSION['usuario_id'];
$sql = "SELECT v.numero_vuelo, v.origen, v.destino, v.fecha_salida, v.hora_salida, v.estado, a.nombre as aerolinea, p.nombre as pasajero_nombre, p.apellido as pasajero_apellido
        FROM vuelos v 
        JOIN pasajeros p ON v.id = p.id_vuelo 
        JOIN aerolineas a ON v.id_aerolinea = a.id 
        WHERE p.id_usuario = ?";
$stmt = $conexion->prepare($sql);
$stmt->bind_param("i", $id_usuario);
$stmt->execute();
$result = $stmt->get_result();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>
    <nav class="sidebar close">
        <header>
            <div class="image-text">
                <span class="image">
                    <img id="logo-img" src="imagenes/aereopuerto.png" alt="logo">
                </span>

                <div class="text header-text">
                    <span class="name">Aereo<span class="p">P</span>uerto</span>
                    <span class="user">Bienvenid@ <?php echo $_SESSION['usuario_nombre']; ?></span>
                </div>
            </div>

            <i class='bx bx-chevron-right toggle'></i>
        </header>

        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li class="nav-link">
                        <a href="index.php">
                            <i class='bx bx-home-alt icon'></i>
                            <span class="text nav-text">Inicio</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="mis_vuelos.php">
                            <i class='bx bxs-plane icon'></i> 
                            <span class="text nav-text">Mis Vuelos</span>
                        </a>
                    </li>
                    <li class="nav-link">
                        <a href="mis_tickets.php">
                            <i class='bx bxs-plane-take-off icon'></i>
                            <span class="text nav-text">Tiquetes de vuelo</span>
                        </a>
                    </li>
                </ul>
            </div>
            <br>
            <br>
            <div class="bottom-content">
                <li class="">
                    <a href="cerrar.php" onclick="return confirm('¿Deseas Cerrar Sesión?');">
                        <i class='bx bx-log-out icon'></i>
                        <span class="text nav-text">Cerrar Sesion</span>
                    </a>
                </li>
            </div>
        </div>
    </nav>

    <div class="home">
        <div id="main-container">
            <div class="ticket-wrapper">
                <div class="ticket-container">
                    <?php while ($row = $result->fetch_assoc()): ?>
                    <div class="ticket">
                        <div class="ticket-header">
                            <h2>TIQUETE</h2>
                            <h4><span class="name">Aereo<span class="p">P</span>uerto</span></h4>
                            <h4>INFORMACION DEL VUELO</h4>
                        </div>
                        <div class="ticket-body">
                            <div class="ticket-section">
                                <p><strong>AEREOLINEA</strong></p>
                                <p><?= $row['aerolinea'] ?></p>
                            </div>
                            <div class="ticket-section">
                                <p><strong>ORIGEN</strong></p>
                                <p><?= $row['origen'] ?></p>
                            </div>
                            <div class="ticket-section">
                                <p><strong>DESTINO</strong></p>
                                <p><?= $row['destino'] ?></p>
                            </div>
                            <div class="ticket-section">
                                <p><strong>PASAGERO</strong></p>
                                <p><?= $row['pasajero_nombre'] ?> <?= $row['pasajero_apellido'] ?></p>
                            </div>
                            <div class="ticket-section">
                                <p><strong>PARTIDA</strong></p>
                                <p><?= $row['fecha_salida'] ?> <?= $row['hora_salida'] ?></p>
                            </div>
                        </div>
                        <div class="ticket-footer">
                            <p>Gracias por elegirnos.</p>
                            <p>Esté en la puerta a la hora de abordar.</p>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
            </div>
        </div>
    </div>
    <script src="js/script1.0.js"></script>
</body>
</html>

