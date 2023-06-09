<?php
// Memeriksa apakah parameter id ada
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Hapus data pembelian berdasarkan id dari database
    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'rental_alat_sulap';

    $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

    if (!$conn) {
        die('Koneksi database gagal: ' . mysqli_connect_error());
    }

    $query = "DELETE FROM pembelian WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Jika penghapusan berhasil, arahkan kembali ke halaman index.php
        header('Location: index.php');
        exit();
    } else {
        echo 'Terjadi kesalahan saat menghapus data.';
    }

    mysqli_close($conn);
} else {
    // Jika parameter id tidak ada, kembali ke halaman index.php
    header('Location: index.php');
    exit();
}
?>
