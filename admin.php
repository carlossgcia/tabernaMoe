<?php

include "include/conexion.php";

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante admin</title>

    <link rel="stylesheet" href="style/normalize.css">
    <link rel="stylesheet" href="style/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
</head>

<body>

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
                    <li class="nav-item active">
                        <a class="nav-link " href="#carta">Carta</a>
                    </li>
                  
                    <li class="nav-item active">
                        <a class="nav-link" href="galeria.php">Galeria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="galeriaAdmin.php">Editar galeria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contacto">Contacto</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ingles/ingles.php"><img src="img/ingles.png" alt="" class="img"></a>
                    </li>
                </ul>

            </nav>
        </div>
    </header>

    <!-- carta -->
    <div class="cuerpo">
        <main>
            <div class="container " id="carta">
                <div class="row  ">

                    <?php
                    $sql = "SELECT * FROM comida";

                    $resultado = mysqli_query($mysqli, $sql);

                    if (mysqli_num_rows($resultado)) {

                        while ($fila = mysqli_fetch_assoc($resultado)) {

                            ?>
                            <div class="col-12 col-md-6 col-lg-3 d-flex align-items-strech ">
                                <div class="card mt-2" style="width: 18rem; ">
                                    <img src="img/comida/<?php echo $fila["imagen"]; ?> " class="card-img-top" alt="...">
                                    <div class="card-body">
                                        <h5 class="card-title">
                                            <?php echo $fila["titulo"]; ?>
                                        </h5>
                                        <p class="card-text">
                                            <?php echo $fila["precio"]; ?>€
                                        </p>

                                        <p class="card-text">
                                            <?php echo $fila["descripcion"]; ?>
                                        </p>
                                        <?php echo '<a href="crud/modificarForm.php?id=' . $fila["id"] . '"' ?> class="btn
                                        btn-outline-primary">Modificar</a>
                                        <?php echo '<a href="crud/eliminar.php?id=' . $fila["id"] . '"' ?> class="btn
                                        btn-outline-warning">Eliminar</a>
                                    </div>
                                </div>
                            </div>
                            <?php

                        }



                    } else {

                        echo "<h2>Sin resultados</h2>";
                        echo "<br>";

                    }
                    echo "";

                    ?>
                    <br>
                    <!-- FORMULARIO -->

                    <div class="accordion accordion-flush " id="accordionFlushExample">
                        <div class="accordion-item ">
                            <h2 class="accordion-header">
                                <button
                                    class="accordion-button collapsed col-12 btn-agregar  m-4 border border-secondary"
                                    type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne"
                                    aria-expanded="false" aria-controls="flush-collapseOne">
                                    Añadir productos
                                </button>
                            </h2>
                            <div id="flush-collapseOne" class="accordion-collapse collapse"
                                data-bs-parent="#accordionFlushExample">
                                <div class="accordion-body">

                                    <form class="guardarForm" action="crud/agregar.php" method="post"
                                        enctype="multipart/form-data">

                                        <label for="titulo">Producto</label>
                                        <input type="text" id="titulo" name="titulo" value="" required>
                                        <br><br>
                                        <label for="precio">Precio</label>
                                        <input type="number" id="precio" name="precio" value="" required>
                                        <br><br>
                                        <label for="descripcion">Descripcion</label>
                                        <input type="text" id="descripcion" name="descripcion" required>
                                        <br><br>
                                        <label for="titulo_ingles">Producto en inglés</label>
                                        <input type="text" name="titulo_ingles" id="titulo_ingles" value="" required>
                                        <br><br>
                                        <label for="descripcion_ingles">Descripcion en inglés</label>
                                        <input type="text" name="descripcion_ingles" id="descripcion_ingles" value=""
                                            required>
                                        <br><br>
                                        <label for="imagen">Imagen</label>
                                        <input type="file" id="imagen" name="imagen" value="" required />
                                        <br><br>


                                        <button type="submit" class="btn btn-primary mb-3">Guardar productos</button>

                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>



        </main>
    </div>

    <div class="cuerpo">
        <footer id="contacto" class="bg-dark text-light text-center py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-4">
                        <h5>Información de contacto</h5>
                        <p>Dirección: 123 Calle Principal, Ciudad</p>
                        <p>Teléfono: (123) 456-7890</p>
                        <p>Email: info@restaurante.com</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Horario de apertura</h5>
                        <p>Lunes a Viernes: 11:00 AM - 10:00 PM</p>
                        <p>Sábado y Domingo: 10:00 AM - 11:00 PM</p>
                    </div>
                    <div class="col-md-4">
                        <h5>Síguenos en redes sociales</h5>
                        <a href="#" class="btn btn-outline-light btn-lg">
                            <i class="fab fa-facebook"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-lg">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="btn btn-outline-light btn-lg">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </footer>
    </div>


</body>

</html>