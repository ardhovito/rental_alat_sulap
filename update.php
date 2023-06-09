<?php
// Memeriksa apakah form telah disubmit dan parameter id ada
if(isset($_POST['jumlah']) && isset($_POST['durasi']) && isset($_GET['id'])) {
    $id = $_GET['id'];
    $jumlah = $_POST['jumlah'];
    $durasi = $_POST['durasi'];

    // Update data pembelian di database
    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'rental_alat_sulap';

    $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

    if (!$conn) {
        die('Koneksi database gagal: ' . mysqli_connect_error());
    }

    $query = "UPDATE penyewaan SET jumlah = '$jumlah',  = '$durasi' = 'alat' WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Jika pembaruan berhasil, arahkan kembali ke halaman index.php
        header('Location: index.php');
        exit();
    } else {
        echo 'Terjadi kesalahan saat memperbarui data.';
    }

    mysqli_close($conn);
} else {
    // Jika form tidak disubmit atau parameter id tidak ada, kembali ke halaman edit.php
    header('Location: edit.php');
    exit();
}
?>
