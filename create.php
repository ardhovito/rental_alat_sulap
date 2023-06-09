<?php
include 'config.php';

$koneksi = $conn;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data dari formulir
    $id = $_POST['id'];
    $jumlah = $_POST['jumlah'];
    $alat = $_POST['alat'];
    $durasi = $_POST['durasi'];
    
    // Proses penyimpanan data ke dalam basis data
    $sql = "INSERT INTO penyewaan (jumlah, alat, durasi) 
            VALUES ('$id', '$jumlah', '$alat', '$durasi')";

    if (mysqli_query($koneksi, $sql)) {
        // Data berhasil disimpan
        header("Location: index.php");
        exit;
    } else {
        // Terjadi kesalahan saat menyimpan data
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Rental Alat Sulap</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>TEMPATNYA NGERENTAL ALAT SULAP NIH!</h1>

    <div class="container">
        <h2>Tambah Penyewaan</h2>
        <img src="img/sulap1.jpg" alt="" style="width: 200px">
        <img src="img/sulap2.jpg" alt="" style="width: 200px">
        <img src="img/sulap3.jpg" alt="" style="width: 200px">
        <img src="img/sulap4.jpg" alt="" style="width: 200px">
        <form action="store.php" method="post">
            <div class="form-group">
                <label for="jumlah">Jumlah alat</label>
                <input type="jumlah" name="jumlah" id="jumlah" required>
            </div>
            <div class="form-group">
                <label for="durasi" style="font-weight: bold; padding-bottom: 10px;"> Durasi </label>
                <select name="durasi" id="durasi" style="width: 52%; height: 25px">
                <option value="Dana"> 1 Hari</option>
                <option value="BCA"> 3 Hari</option>
                <option value="BCA"> 1 Minggu</option>
                <option value="BCA"> 2 Minggu</option>
                <option value="BCA"> 1 Bulan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="alat" style="font-weight: bold; padding-bottom: 10px;"> Pilih Alat </label>
                <select name="alat" id="alat" style="width: 52%; height: 25px">pilih pembayaran
                <option value="Money Printing">Money Printing</option>
                <option value="Alat Penghilang Benda"> Alat Penghilang Benda</option>
                <option value="Penyulap Bola"> Penyulap Bola</option>
                <option value="Pot Sontoloyo"> Pot Sontoloyo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
        </form>
    </div>
</body>
</html>
