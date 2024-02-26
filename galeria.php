<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Galería de Imágenes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <link rel="stylesheet" href="style/galeria.css">
</head>

<body>
    <!-- Tu código de encabezado -->
    <?php
    include "include/conexion.php"
        ?>

   
<header class="cabecera bg-secondary-subtle bg-light">
        <div class="contenido">
            <div class="item item1">
                <div>
                    <img src="img/logo_restaurante.jpg" alt="">
                </div>
                <h1>Taberna de Moe</h1>

            </div>

            <nav class="item item2 navbar navbar-expand-lg navbar-light  menu align-items-center">



                <ul class="navbar-nav fs-4">
                <li class="nav-item">
                        <a class="nav-link" href="admin.php">Admin</a>
                    </li>
                   
                  
                    <li class="nav-item">
                        <a class="nav-link" href="galeriaAdmin.php">Editar galeria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                   
                    <li class="nav-item">
                        <a class="nav-link" href="ingles/ingles.php"><img src="img/ingles.png" alt="" class="img"></a>
                    </li>
                </ul>

            </nav>
        </div>
    </header>

    <!-- ... -->

    <div class="container mt-4">
        <div class="row">
            <?php
            $sql = "SELECT * FROM imagenes";
            $resultado = mysqli_query($mysqli, $sql);

            if (mysqli_num_rows($resultado)) {
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    ?>
                    <div class="col-12 col-md-6 col-lg-3  mt-2  ">
                        <div class="card">
                            <img src="img/galeria/<?php echo $fila["imagen"] ?>" class="card-img" alt="">
    
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<div class='col'><h2>Sin resultados</h2></div>";
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>