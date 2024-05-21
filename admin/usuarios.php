<?php 
    session_start();

    if (!isset($_SESSION['usuario_id'])) {
        header("Location:../login.html");

        exit();
    }

    include('../conexion.php');
    $query = mysqli_query($conexion, "SELECT id, nombre, apellido, correo, id_rol FROM usuarios");
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
                            <a href="#">
                                <i class='bx bx-comment-add icon' ></i>
                                <span class="text nav-text">Agregar Vuelo</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bx-list-ul icon'></i>
                                <span class="text nav-text">Lista de vuelos</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
                                <i class='bx bxs-plane icon'></i>
                                <span class="text nav-text">Gestionar Aerolíneas</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="#">
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
                    <li class="mode">
                        <div class="moon-sun">
                            <i class="bx bx-moon icon moon"></i>
                            <i class="bx bx-sun icon sun"></i>
                        </div>
                        <span class="mode-text text">Modo Oscuro</span>

                        <div class="toggle-switch">
                            <span class="switch"></span>
                        </div>
                    </li>
                </div>
            </div>
        </nav>

        <div class="home">
            <div class="text">Usuarios</div>
            <br>
            <a href="crear_usuarios.php" class="nuevoUsuario">Nuevo Usuario</a>
            <br>
            <br>
                <table class="tablaUsuarios">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Email</th>
            
                        </tr>
                    </thead>
                    <tbody>
                        <?Php while($row = mysqli_fetch_array($query)): ?>
                        <tr>
                            <th><?= $row['id']?></th>
                            <th><?= $row['nombre']?></th>
                            <th><?= $row['apellido']?></th>
                            <th><?= $row['correo']?></th>    

                            <th><a href="editar_usuarios.php?id=<?= $row['id'] ?>">Editar</a></th>
                            <td><a href="eliminar_usuarios.php?id=<?= $row['id'] ?>" onclick="return confirm('¿Quieres ELIMINAR este registro?');">Eliminar</a></td>
                        </tr>
                        <?php endwhile; ?>
                    </tbody>
                </table>
        </div>
        <script src="../js/script.js"></script>
    </body>
</html>