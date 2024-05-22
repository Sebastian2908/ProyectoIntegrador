<?php 
    session_start();

    if (!isset($_SESSION['usuario_id'])) {
        header("Location:../login.html");

        exit();
    }

    include('../conexion.php');
    $query = mysqli_query($conexion, "SELECT v.id, v.numero_vuelo, a.nombre AS aerolinea, v.origen, v.destino, v.fecha_salida, v.hora_salida, v.fecha_llegada, v.hora_llegada, v.estado 
                                      FROM vuelos v 
                                      JOIN aerolineas a ON v.id_aerolinea = a.id");
    if (!$query) {
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
    <title>Document</title>
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
                                <span class="text nav-text">Gestionar Vuelos</span>
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
                    <!-- <li class="mode">
                        <div class="moon-sun">
                            <i class="bx bx-moon icon moon"></i>
                            <i class="bx bx-sun icon sun"></i>
                        </div>
                        <span class="mode-text text">Modo Oscuro</span>

                        <div class="toggle-switch">
                            <span class="switch"></span>
                        </div>
                    </li> -->
                </div>
            </div>
        </nav>

        <div class="home">
            <div id="main-container">
                <div class="text">Vuelos</div>
                <br>
                <a href="crear_vuelo.php" class="nuevoUsuario">Nuevo Vuelo</a>
                <br>
                <br>
                    <table class="tablaUsuarios tablaVuelos">
                        <thead>
                            <tr>
                                <!-- <th>ID</th> -->
                                <th># Vuelo</th>
                                <th>Aerolínea</th>
                                <th>Origen</th>
                                <th>Destino</th>
                                <th>Fecha de Salida</th>
                                <th>Hora de Salida</th>
                                <th>Fecha de Llegada</th>
                                <th>Hora de Llegada</th>
                                <th>Estado</th>
                                <th>Acciones</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php while($row = mysqli_fetch_array($query)): ?>
                            <tr>
                                <!-- <td><?= $row['id']?></td> -->
                                <td><?= $row['numero_vuelo']?></td>
                                <td><?= $row['aerolinea']?></td>
                                <td><?= $row['origen']?></td>
                                <td><?= $row['destino']?></td>
                                <td><?= $row['fecha_salida']?></td>
                                <td><?= $row['hora_salida']?></td>
                                <td><?= $row['fecha_llegada']?></td>
                                <td><?= $row['hora_llegada']?></td>
                                <td><?= $row['estado']?></td>
                                
                                <td><a href="pasajeros.php?id=<?= $row['id'] ?>" class="btn-editar">Pasajeros</a></td>
                                <td><a href="editar_vuelo.php?id=<?= $row['id'] ?>" class="btn-editar">Editar</a></td>
                                <td><a href="eliminar_vuelo.php?id=<?= $row['id'] ?>" class="btn-eliminar" onclick="return confirm('¿Quieres ELIMINAR este registro?');">Eliminar</a></td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
            </div>
        </div>
        <script src="../js/script.js"></script>
    </body>
</html>



