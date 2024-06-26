<?php 
session_start();

if (!isset($_SESSION['usuario_id'])) {
    header("Location:../login.html");
    exit();
}

include('conexion.php');

$id_usuario = $_SESSION['usuario_id'];
$sql = "SELECT v.numero_vuelo, v.origen, v.destino, v.fecha_salida, v.hora_salida, v.estado 
        FROM vuelos v 
        JOIN pasajeros p ON v.id = p.id_vuelo 
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
    <title>Mis Vuelos</title>
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
            <h2>Mis Vuelos</h2>
            <table class="tablaUsuarios">
                <thead>
                    <tr>
                        <th>Número de Vuelo</th>
                        <th>Origen</th>
                        <th>Destino</th>
                        <th>Fecha de Salida</th>
                        <th>Hora de Salida</th>
                        <th>Estado del vuelo</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<tr>";
                            echo "<td>" . $row['numero_vuelo'] . "</td>";
                            echo "<td>" . $row['origen'] . "</td>";
                            echo "<td>" . $row['destino'] . "</td>";
                            echo "<td>" . $row['fecha_salida'] . "</td>";
                            echo "<td>" . $row['hora_salida'] . "</td>";
                            echo "<td>" . $row['estado'] . "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>No tienes vuelos registrados.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="js/script1.0.js"></script>
</body>
</html>
<?php
$conexion->close();
?>
