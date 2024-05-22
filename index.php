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
                            <a href="mis_vuelos.php">
                            <i class='bx bx-list-ul icon'></i>
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
                </div>
            </div>
        </nav>

        <div class="home">
            <div id="main-container">
                <form action="buscar_vuelos.php" method="POST" class="formulariousuarios">
                <h1>Buscar Vuelos Disponibles</h1>
                    <div class="input-group">
                        <label for="origen">Origen:</label>
                        <input type="text" name="origen" ><br><br>
                        
                        <label for="destino">Destino:</label>
                        <input type="text" name="destino" ><br><br>
                    </div>   
                    <label for="fecha">Fecha de Viaje:</label>
                    <input type="date" name="fecha"><br><br>
                    <input type="submit" value="Buscar Vuelos">
                </form>
            </div>
        </div>
        <script src="js/script1.0.js"></script>
    </body>
</html>