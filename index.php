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
                        <a href="cerrar.php">
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
            <div class="text">Inicio Usuario</div>
            <p>
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Reprehenderit ratione minima adipisci, incidunt quibusdam error dolor est ipsam magni dicta debitis. Similique voluptas voluptatem nemo. Ipsum nostrum amet dolorem ullam.
            </p>
        </div>

        <script src="js/script1.0.js"></script>
    </body>
</html>