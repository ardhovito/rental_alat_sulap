<?php
// Memeriksa apakah form telah disubmit
if(isset($_POST['jumlah']) && isset($_POST['durasi']) && isset($_POST['alat'])) {
    $jumlah = $_POST['jumlah'];
    $durasi = $_POST['durasi'];
    $alat = $_POST['alat'];

    // Simpan data pembelian ke database
    $db_host = 'localhost';
    $db_username = 'root';
    $db_password = '';
    $db_name = 'rental_alat_sulap';

    $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

    if (!$conn) {
        die('Koneksi database gagal: ' . mysqli_connect_error());
    }

    $query = "INSERT INTO penyewaan (jumlah, durasi, alat) VALUES ('$jumlah', '$durasi', '$alat')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        // Jika penyimpanan berhasil, arahkan kembali ke halaman index.php
        header('Location: index.php');
        exit();
    } else {
        echo 'Terjadi kesalahan saat menyimpan data.';
    }

    mysqli_close($conn);
} else {
    // Jika form tidak disubmit, kembali ke halaman create.php
    header('Location: create.php');
    exit();
}
?>
