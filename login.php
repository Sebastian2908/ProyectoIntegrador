<?php 
if ($_SERVER['REQUEST_METHOD']=="POST") {
    include("conexion.php");

    print_r($_POST);

    $email=(isset($_POST['email']))?htmlspecialchars($_POST['email']):null;
    $password=(isset($_POST['password']))?$_POST['password']:null;

    try {
        
        $pdo = new PDO('mysql:host='.$direccionservidor.';dbname='.$baseDatos,$usuarioDB,$contraseniaDB);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//para q el pdo maneje de manera automatica los errores

        $sql="SELECT * FROM usuarios WHERE correo=:email";
        $sentencia= $pdo->prepare($sql);
        $sentencia->execute(['email'=>$email]);

        $usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
        // print_r($usuarios);

        $login=false;

        foreach ($usuarios as $user) {

            if (password_verify($password, $user["password"])) {
                
                $login=true;
            }

        }

        if ($login) {
            echo "Exite en la DB";
        }else {
           echo "No Exte en la DB"
        }

    } catch (PDOException $e) {
        echo "Hubo un error de conexion".$e->getMessage();
    }
}
?>