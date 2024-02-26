<!-- Conexion a la base de datos -->
<?php

include "../include/conexion.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insercion</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="style/style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</head>

<body>
    <?php
    // Guardamos los datos del formulario en variables.
    
    $titulo = $_POST["titulo"];
    $percio = $_POST["precio"];
    $descripcion = $_POST["descripcion"];

    /* PROCESADO DE LA IMAGEN*/

    $archivo_nombre = $_FILES["imagen"]["name"];

    $archivo_ruta_temporal = $_FILES["imagen"]["tmp_name"];


    $ruta_completa = pathinfo($archivo_nombre);

    $nombre_sin_extension = $ruta_completa['filename'];

    $extension = $ruta_completa['extension'];


    if ($extension == "jpg") {

        if (file_exists("fotos/" . $archivo_nombre)) {

            $contador = 1;

            while (file_exists("../img/" . $archivo_nombre)) {

                $archivo_nombre = $nombre_sin_extension . $contador . "." . $extension;
                $contador++;
            }
            if (move_uploaded_file($archivo_ruta_temporal, "../img/comida/" . $archivo_nombre)) {
                echo "El archivo ha sido guardado correctamente.";



            } else {
                echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
            }
        } else {

            if (move_uploaded_file($archivo_ruta_temporal, "../img/" . $archivo_nombre)) {
                echo "El archivo ha sido guardado correctamente.";


            } else {
                echo "Ocurrió algún error al subir el fichero. No pudo guardarse.";
            }
        }
    } else {
        echo "La foto no tiene extension jpg <br>";

    }

    $titulo_ingles = $_POST["titulo_ingles"];
    $descripcion_ingles = $_POST["descripcion_ingles"];


    $sql = "INSERT INTO comida (titulo, precio, descripcion, imagen, titulo_ingles, descripcion_ingles) VALUES ('$titulo','$percio','$descripcion','$archivo_nombre', '$titulo_ingles', '$descripcion_ingles')";

    // Comprobamos si el registro se ha guardado correctamente y en caso de error lo mostramos.
    if (mysqli_query($mysqli, $sql)) {
        echo "Registro guardado correctamente";
        echo "<br>";
        echo "<a href='index.php'>Volver atrás</a>";
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