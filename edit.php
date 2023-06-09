<!DOCTYPE html>
<html>
<head>
    <title>Rental Alat Sulap</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h1>Rental Alat Sulap</h1>

    <div class="container">
        <h2>Form Edit Pembelian</h2>
        <?php
        // Memeriksa apakah parameter id ada
        if(isset($_GET['id'])) {
            $id = $_GET['id'];

            // Mengambil data pembelian berdasarkan id dari database
            $db_host = 'localhost';
            $db_username = 'root';
            $db_password = '';
            $db_name = 'rental_alat_sulap';

            $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

            if (!$conn) {
                die('Koneksi database gagal: ' . mysqli_connect_error());
            }

            $query = "SELECT * FROM pembelian WHERE id = '$id'";
            $result = mysqli_query($conn, $query);

            if ($row = mysqli_fetch_assoc($result)) {
                ?>
                <form action="update.php?id=<?php echo $id; ?>" method="post">
                <div class="form-group">
                <label for="nominal">Jumlah alat</label>
                <input type="text" name="nominal" id="nominal" required>
            </div>
            <div class="form-group">
                <label for="pembayaran" style="font-weight: bold; padding-bottom: 10px;"> Durasi </label>
                <select name="pembayaran" id="pembayaran" style="width: 52%; height: 25px">
                <option value="Dana"> 1 Hari</option>
                <option value="BCA"> 3 Hari</option>
                <option value="BCA"> 1 Minggu</option>
                <option value="BCA"> 2 Minggu</option>
                <option value="BCA"> 1 Bulan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="pembayaran" style="font-weight: bold; padding-bottom: 10px;"> Pilih Alat </label>
                <select name="pembayaran" id="pembayaran" style="width: 52%; height: 25px">pilih pembayaran
                <option value="Dana">Money Printing</option>
                <option value="BCA"> Alat Penghilang Benda</option>
                <option value="BCA"> PenySulap Bola</option>
                <option value="BCA"> Pot Sontoloyo</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="index.php" class="btn btn-secondary">Batal</a>
                </form>
                <?php
            } else {
                echo 'Data tidak ditemukan.';
            }

            mysqli_close($conn);
        } else {
            echo 'ID tidak valid.';
        }
        ?>
    </div>
</body>
</html>
