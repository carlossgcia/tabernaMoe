<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>

</head>

<body>

    <?php

    $nombre = $_POST["nombre"];
    $telefono = $_POST["telefono"];
    $email = $_POST["email"];
    $hora = $_POST["hora"];


    $fechaPost = $_POST['fecha'];

    $fechaReserva = date('Y-m-d', strtotime($fechaPost));


    $fechaHoy = date('Y-m-d');


    $fechaMes = date('Y-m-d', strtotime($fechaHoy . "+1 month"));


    if ($fechaReserva < $fechaHoy) {

        echo "<h1> La fecha seleccionada es en el pasado </h1>";
        echo '<a href="index.php" >Volver </a>';

    } else if ($fechaReserva > $fechaMes) {

        echo "<h1>Todavia no se han abierto las reservas</h1>";
        echo '<a href="index.php" >Volver </a>';


    } else {
        echo "<h1>Puedes reservar</h1>";

        correo($fechaReserva, $hora , $email);

        echo '<a href="index.php" >Volver </a>';
    }





    function correo($fechaReserva, $hora, $email)
    {
        $mensaje = "Todo listo para su reserva, le esperamos el dia " . $fechaReserva . "a las " . $hora;
        //Load Composer's autoloader
        require 'PHPMailer/src/Exception.php';
        require 'PHPMailer/src/PHPMailer.php';
        require 'PHPMailer/src/SMTP.php';

        //Create an instance; passing `true` enables exceptions
        $mail = new PHPMailer(true);

        try {
            //Server settings
    
            $mail->isSMTP();
            $mail->Host = 'segundodaw.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'alumno@segundodaw.com';
            $mail->Password = 'SegundoDAW';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port = 465;

            //Informacion sobre los destinatarios y los enviadores
            $mail->setFrom('alumno@segundodaw.com', 'alumno');
            $mail->addAddress($email);
            $mail->addReplyTo('alumno@segundodaw.com', 'alumno');


            //Contenido 
            $mail->isHTML(true);
            $mail->Subject = "Reserva para Taberna de MOE";
            $mail->Body = $mensaje;

            $mail->send();
            echo 'Se envio un mensaje a tu correo';
        } catch (Exception $e) {
            echo "El mensaje no fue enviado. Mail Error: {$mail->ErrorInfo}";
        }

    }

    ?>


</body>

</html>