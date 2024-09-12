<?php

use LDAP\Result;

$conex = mysqli_connect("localhost", "root", "", "tienda");

$sql = "SELECT id, title, description, price, image_url, button_text FROM catalogo LIMIT 0, 25";

$result = $conex ->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
</head>
<body>
    <h1>Catálogo de Productos</h1>

    <?php
    // Verificar si hay resultados y mostrarlos en HTML
    if ($result->num_rows > 0) {
        echo '<ul>';
        while ($row = $result->fetch_assoc()) {
            echo '<li>';
            echo '<h2>' . $row["title"] . '</h2>';
            echo '<p>' . $row["description"] . '</p>';
            echo '<p>Precio: ' . $row["price"] . '</p>';
            echo '<img src="' . $row["image_url"] . '" alt="' . $row["title"] . '">';
            echo '<a href="#">' . $row["button_text"] . '</a>';
            echo '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No hay productos disponibles.</p>';
    }

    // Cerrar la conexión
    $conn->close();
    ?>
</body>
</html>