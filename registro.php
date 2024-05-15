<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $nombre = isset($_POST['name']) ? $_POST['name'] : null;
    $apellido = isset($_POST['lastname']) ? $_POST['lastname'] : null;
    $correo = isset($_POST['email']) ? $_POST['email'] : null;
    $contraseña1 = isset($_POST['password']) ? $_POST['password'] : null;
    $confirmarContraseña = isset($_POST['confirmarPassword']) ? $_POST['confirmarPassword'] : null;

    if ($contraseña1 !== $confirmarContraseña) {
        echo "Las contraseñas no coinciden.";
        exit; 
    }

    }
    
    $servidor = "localhost";
    $usuario = "root";
    $contrasenia = "";
    $baseDatos = "proyectointegrador";

    
    $conexion = new mysqli($servidor, $usuario, $contrasenia, $baseDatos);

    
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    
    $sql = "INSERT INTO usuarios (nombre, apellido, correo, contraseña, id_rol) 
            VALUES ('$nombre', '$apellido', '$correo', '$contraseña1', 2)";

    
    if ($conexion->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error al registrar usuario: " . $conexion->error;
    }

    
    $conexion->close();
}

?>
