<?php 

    include("conexion.php");

    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        
        print_r($_POST);
        $nombre=(isset($_POST['name']))?$_POST['name']:null;
        $apellido=(isset($_POST['lastname']))?$_POST['lastname']:null;
        $correo=(isset($_POST['email']))?$_POST['email']:null;
        $contraseña=(isset($_POST['password']))?$_POST['password']:null;
        $confirmarContraseña=(isset($_POST['confirmarPassword']))?$_POST['confirmarPassword']:null;
    
        try {
            $pdo = new PDO('mysql:host='.$direccionservidor.';dbname='.$baseDatos,$usuarioDB,$contraseniaDB);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//para q el pdo maneje de manera automatica los errores
            $sql="INSERT INTO `proyectointegrador`.`usuarios` (`nombre`, `apellido`, `correo`, `contraseña`, `id_rol`) 
            VALUES ('Carlos', 'Angulo', 'Carlos@gmail.com', '12345', '2');";

            $resultado = $pdo -> prepare($sql);
            $resultado -> execute();
            
        } catch (PDOException $e) {
            echo "Hubo un error de conexion".$e->getMessage();
        }
    }

?>