<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "otel_rezervasyon";

$conn = mysqli_connect($host, $user, $password, $database);

if (!$conn) {
    die("Veritabanı bağlantı hatası: " . mysqli_connect_error());
}
?>