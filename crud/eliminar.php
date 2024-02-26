<?php
// Conexión con la base de datos. 
$id = $_GET['id'];


include "../include/conexion.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar</title>
</head>

<body>
    <?php

    echo $id;
    $sql = "DELETE FROM comida WHERE id='$id'";
    if (mysqli_query($mysqli, $sql)) {

        ?>
        <script>
            location.href = "../admin.php"
        </script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }
    ?>

</body>

</html>