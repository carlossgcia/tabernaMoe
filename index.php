<!-- Conexion a la base de datos -->
<?php
include "include/conexion.php";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurante</title>

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
                    <li class="nav-item">
                        <a class="nav-link" href="#reservaForm">Reserva</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="galeria.php">Galeria</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="admin.php">Admin</a>
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




    <!-- carrousel de fotos-->
    <div class="cuerpoCarrousel">
        <div id="carouselExample" class="carousel slide">

            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                    aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                    aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                    aria-label="Slide 3"></button>
            </div>

            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="img/restaurante1.jpg" class="img-carousel d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/restaurante2.jpg" class="img-carousel d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="img/restaurante3.jpg" class="img-carousel d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>

    <!-- carta -->
    <main>

        <div class="container" id="carta">
            <div class="row ">

                <?php
                $sql = "SELECT * FROM comida";

                $resultado = mysqli_query($mysqli, $sql);

                if (mysqli_num_rows($resultado)) {

                    while ($fila = mysqli_fetch_assoc($resultado)) {

                        ?>
                        <div class="col-12 col-md-6 col-lg-3  mt-2 d-flex align-items-strech">
                            <div class="card" style="width: 100%;">
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

            </div>
        </div>

        <!-- FORMULARIO DE RESERVA -->

        <div class="container">
            <h2 style="text-align: center;" class="mt-4">Reserva una mesa</h2>
            <div class="row justify-content-center">
                <div class="col-8">
                    <form id="reservaForm" class="formulario mt-4" action="reserva.php" method="post">
                        <div class="mb-3">
                            <label for="nombre" class="form-label">Nombre:</label>
                            <input type="text" id="nombre" name="nombre" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono:</label>
                            <input type="tel" id="telefono" name="telefono" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" id="email" name="email" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="fecha" class="form-label">Fecha de Reserva:</label>
                            <input type="date" id="fecha" name="fecha" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label for="hora" class="form-label">Hora de Reserva:</label>
                            <select id="hora" name="hora" class="form-control" required>
                                <option value="">Selecciona una hora</option>
                                <!-- Horas desde las 12:30 hasta las 16:00 -->
                                <option value="12:30">12:30</option>
                                <option value="13:00">13:00</option>
                                <option value="13:30">13:30</option>
                                <option value="14:00">14:00</option>
                                <option value="14:30">14:30</option>
                                <option value="15:00">15:00</option>
                                <option value="15:30">15:30</option>
                                <option value="16:00">16:00</option>
                                <!-- Horas desde las 19:00 hasta las 00:00 -->
                                <option value="19:00">19:00</option>
                                <option value="19:30">19:30</option>
                                <option value="20:00">20:00</option>
                                <option value="20:30">20:30</option>
                                <option value="21:00">21:00</option>
                                <option value="21:30">21:30</option>
                                <option value="22:00">22:00</option>
                                <option value="22:30">22:30</option>
                                <option value="23:00">23:00</option>
                                <option value="23:30">23:30</option>
                                <option value="00:00">00:00</option>
                            </select>

                        </div>

                        <button type="submit" class="btn btn-primary mb-3 btnReservar">Reservar Mesa</button>
                    </form>
                </div>
            </div>
        </div>

    </main>



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



</body>


</html>