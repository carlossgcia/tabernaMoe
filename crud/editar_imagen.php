<?php
include "../include/conexion.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    $id = $_POST["id"];
    $titulo = $_POST["titulo"];
    $archivo_nombre = $_FILES["imagen"]["name"];
    $archivo_ruta_temporal = $_FILES["imagen"]["tmp_name"];

  
    $ruta_completa = pathinfo($archivo_nombre);

    $nombre_sin_extension = $ruta_completa['filename'];

    $extension = $ruta_completa['extension'];


    if (file_exists("../img/galeria/" . $archivo_nombre)) {

        $contador = 1;

        while (file_exists("../img/galeria/" . $archivo_nombre)) {

            $archivo_nombre = $nombre_sin_extension . $contador . "." . $extension;
            $contador++;
        }
        if (move_uploaded_file($archivo_ruta_temporal, "../img/galeria/" . $archivo_nombre)) {
            echo "El archivo ha sido guardado correctamente.";



        } else {
            echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
        }
    } else {

        if (move_uploaded_file($archivo_ruta_temporal, "../img/galeria/" . $archivo_nombre)) {
            echo "El archivo ha sido guardado correctamente.";


        } else {
            echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
        }
    }


    $sql = "UPDATE imagenes SET titulo = '$titulo', imagen = '$archivo_nombre' WHERE id = '$id' ";

    if (mysqli_query($mysqli, $sql)) {
        ?>
        <script>
            location.href = "../galeriaAdmin.php"
        </script>
        <?php
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($mysqli);
    }

    ?>

</body>

</html>