<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "rental_alat_sulap";

$conn = mysqli_connect($host, $username, $password, $database);
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>