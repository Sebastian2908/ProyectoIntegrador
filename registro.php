<?php 

    if ($_SERVER["REQUEST_METHOD"]=="POST") {
        
        print_r($_POST);
        $nombre=(isset($_POST['name']))?$_POST['name']:null;
        $apellido=(isset($_POST['lastname']))?$_POST['lastname']:null;
        $correo=(isset($_POST['email']))?$_POST['email']:null;
        $contraseña=(isset($_POST['password']))?$_POST['password']:null;
        $confirmarContraseña=(isset($_POST['confirmarPassword']))?$_POST['confirmarPassword']:null;
        echo $nombre;
        echo $apellido;
        echo $correo;
        echo $contraseña;
        echo $confirmarContraseña;
    }

?>