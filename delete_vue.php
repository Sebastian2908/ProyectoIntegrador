<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM vuelos WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Vuelo eliminado exitosamente";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

header("Location: index.php");
?>
