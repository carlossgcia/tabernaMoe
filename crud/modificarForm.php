<?php
$id = $_GET['id'];

include "../include/conexion.php";


?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Modificar</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="style/style.css">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>

<body>

    <?php

    $sql = "SELECT * FROM comida WHERE id='$id'";
    $resultado = mysqli_query($mysqli, $sql);
    if (mysqli_num_rows($resultado)) {
        while ($fila = mysqli_fetch_assoc($resultado)) {
          
            
            ?>
            <form method="POST" action="modificarDatos.php" enctype="multipart/form-data" class=m-4>

                <input type="hidden" name="id" value="<?php echo $fila['id']; ?>">

                <label for="titulo">Titulo</label>
                <input type="text" id="titulo" name="titulo" value="<?php echo $fila['titulo']; ?>" required>
                <br><br>

                <label for="precio">Precio</label>
                <input type="number" id="precio" name="precio" value="<?php echo $fila['precio']; ?>" required>
                <br><br>

                <label for="descripcion">Descripcion</label>
                <input type="text" id="descripcion" name="descripcion" value="<?php echo $fila['descripcion']; ?>" required>
                <br><br>

                <label for="imagen">Imagen</label>
                <input type="file" id="imagen" name="imagen" value=" " required><br><br>
                <?php echo '<img src="../img/comida/'.$fila["imagen"].'" alt="" width="150px" >'; ?>
                <br><br>

                <label for="titulo_ingles">Titulo en ingles</label>
                <input type="text" name="titulo_ingles" id="titulo_ingles" value="<?php echo $fila['titulo_ingles']; ?>" required>
                <br><br>


                <label for="descripcion_ingles">Descripcion en ingles</label>
                <input type="text" name="descripcion_ingles" id="descripcion_ingles"
                    value="<?php echo $fila['descripcion_ingles']; ?>" required>
                <br><br>

                <button type="submit" class="btn btn-primary mb-3">Modificar producto</button>


            </form>

            <?php

        }
    }
    ?>


</body>

</html>