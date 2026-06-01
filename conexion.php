<?php

$host = "localhost";
$user = "dev_user";
$password = "Dev*2026";
$database = "truper13";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Error de conexión: " . mysqli_connect_error());
}

mysqli_set_charset($conn, "utf8");

?>
