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
                    <li class="nav-item active">
                        <a class="nav-link" href="galeria.php">Galeria</a>
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
    <div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Subir imagen
                </div>
                <div class="card-body">
                    <form action="crud/subirImg.php" method="post" enctype="multipart/form-data">
                        <div class="m-3">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Subir imagen</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    <div class="container mt-4">
        <div class="row">
            <?php
            $sql = "SELECT * FROM imagenes";
            $resultado = mysqli_query($mysqli, $sql);

            if (mysqli_num_rows($resultado)) {
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    ?>

                    <div class="col-12 col-md-6 col-lg-4  mt-2 ">
                        <div class="card ">
                            <img src="img/galeria/<?php echo $fila["imagen"] ?>" class="card-img-top" alt="">
                            <div class="card-body ">

                                <!-- Formulario de edición -->
                                <form action="crud/editar_imagen.php" method="post" enctype="multipart/form-data" class="mb-3">

                                    <input type="hidden" name="id" value="<?php echo $fila['id'] ?>">

                                    <label for="imagen">Imagen</label>
                                    <input type="file" id="imagen" name="imagen" value=" " required>

                                    <br><br>

                                    <button type="submit" class="btn btn-primary">Guardar cambios</button>
                                </form>
                                <?php echo '<a href="crud/eliminarImg.php?id=' . $fila["id"] . '"' ?> class="btn btn-warning
                                mt-auto">Eliminar</a>
                            </div>
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


    <!-- Agrega los scripts de Bootstrap y Font Awesome (jQuery y Popper.js son requeridos) -->


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</body>

</html>