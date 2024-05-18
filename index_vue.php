<?php
include("conexion.php");

$sql = "SELECT * FROM vuelos";
$result = $conexion->query($sql);
?>

<h2>Lista de Vuelos</h2>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Número de Vuelo</th>
        <th>Destino</th>
        <th>Fecha</th>
        <th>Hora</th>
        <th>Seccion</th>
        <th>Aerolinea</th>
    </tr>
    <?php
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["vuelo_numero"] . "</td>
                    <td>" . $row["destino"] . "</td>
                    <td>" . $row["fecha"] . "</td>
                    <td>" . $row["hora"] . "</td>
                    <td>" . $row["seccion"] . "</td>
                    <td>" . $row["aerolinea"] . "</td>
                    <td><a href='update.php?id=" . $row["id"] . "'>Editar</a> | <a href='delete.php?id=" . $row["id"] . "'>Eliminar</a></td>
                </tr>";
        }
    } else {
        echo "<tr><td colspan='7'>No hay vuelos agendados</td></tr>";
    }
    ?>
</table>
