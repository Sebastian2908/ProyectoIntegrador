<!-- <?php 
    session_start();

    if (!isset($_SESSION['usuario_id'])) {
        header("Location:login.html");
        exit();
    }
?> -->

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
        <!-- <a href="admin_cerrar.php">Cerrar sesion</a> -->
        <nav class="slidebar">
            <header>
                <div class="image-text">
                    <span class="image">
                        <img src="imagenes/aereopuerto.png" alt="logo">
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
                            <a href="cerrar.php">
                                <i class='bx bx-log-out icon'></i>
                                <span class="text nav-text">Cerrar Sesion</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

    </body>
</html>