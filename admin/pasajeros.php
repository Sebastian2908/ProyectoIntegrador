<?php 
    session_start();

    if (!isset($_SESSION['usuario_id'])) {
        header("Location:../login.html");
        exit();
    }

    include('../conexion.php');

    $vuelo_id = $_GET['id'];

    $query_pasajeros = mysqli_query($conexion, "SELECT * FROM pasajeros WHERE id_vuelo = $vuelo_id");
    if (!$query_pasajeros) {
        die('Error en la consulta: ' . mysqli_error($conexion));
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Pasajeros del Vuelo</title>
</head>
<body>
<nav class="sidebar close">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img id="logo-img" src="../imagenes/aereopuerto.png" alt="logo">
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
                            <a href="admin.php">
                                <i class='bx bx-home-alt icon'></i>
                                <span class="text nav-text">Inicio</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="vuelos.php">
                                <i class='bx bx-comment-add icon' ></i>
                                <span class="text nav-text">Agregar Vuelo</span>
                            </a>
                        </li>
                        <!-- <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-list-ul icon'></i>
                                <span class="text nav-text">Lista de vuelos</span>
                            </a>
                        </li> -->
                        <li class="nav-link">
                            <a href="aereolineas.php">
                                <i class='bx bxs-plane icon'></i>
                                <span class="text nav-text">Gestionar Aerolíneas</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="usuarios.php">
                                <i class='bx bx-user icon'></i>
                                <span class="text nav-text">Usuarios</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <br>
                <br>
                <div class="bottom-content">
                    <li class="">
                        <a href="admin_cerrar.php" onclick="return confirm('¿Deseas Cerrar Sesión?');">
                            <i class='bx bx-log-out icon'></i>
                            <span class="text nav-text">Cerrar Sesion</span>
                        </a>
                    </li>
                </div>
            </div>
        </nav>

    <div class="home">
        <div id="main-container">
            <div class="text">Pasajeros del Vuelo</div>
            <br>
            <a href="vuelos.php" class="nuevoUsuario">Vuelos</a>
            <br>
            <br>
            <table class="tablaUsuarios">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Teléfono</th>
                        <th>Fecha de Nacimiento</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row_pasajero = mysqli_fetch_array($query_pasajeros)): ?>
                    <tr>
                        <td><?= $row_pasajero['id']?></td>
                        <td><?= $row_pasajero['nombre']?></td>
                        <td><?= $row_pasajero['apellido']?></td>
                        <td><?= $row_pasajero['telefono']?></td>
                        <td><?= $row_pasajero['fecha_nacimiento']?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="../js/script.js"></script>
</body>
</html>
