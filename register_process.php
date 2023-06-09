<?php 
session_start();
include 'config.php';

if (isset($_POST['daftar'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $checkQuery = "SELECT * FROM users WHERE username='$username'";
    $checkResult = $conn->query($checkQuery);

    if ($checkResult->num_rows > 0) {
        echo '<script lang="javascript">';
        echo 'alert("Username sudah terdaftar, Silakan gunakan username lain.")';
        echo  '</script>';
    } else {
        $insertQuery = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

        if ($conn->query($insertQuery) === TRUE) {
            $_SESSION['daftar_success'] = true;
            header("Location: login.php");
            exit();
        } else {
            echo "Terjadi kesalahan saat pendaftaran: " . $conn->$connect_error;
        }
    }
}
?>