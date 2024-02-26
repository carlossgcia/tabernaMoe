<?php

$server = "localhost";
$username = "root";
$password = "";
$dbname = "restaurante";
$mysqli = new mysqli($server, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL(" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
}
/*
$server = "localhost";
$username = "usuario2";
$password = "usuario123";
$dbname = "cgarcia_restaurante";
$mysqli = new mysqli($server, $username, $password, $dbname);

if ($mysqli->connect_errno) {
    echo "Fallo al conectar a MySQL(" . $mysqli->connect_errno . ")" . $mysqli->connect_error;
}*/
?>