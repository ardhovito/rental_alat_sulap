<?php
session_start();

    // Cek apakah pengguna sudah login atau belum
    if (!isset($_SESSION['username'])) {
    // Jika belum login, redirect ke halaman login.php
    // header("Location: login.php");
    // exit();
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>RENTAL ALAT SULAP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <div class="header">
    <h1>Rental Alat Sulap
    </h1>
    

    <div class="container">
            <h2>Selamat Datang di tempat rental alat sulap paling keren </h2>
            <p>Tempat nya Rental Alat Sulap paling lengkap!</p>
            <a href="create.php" class="btn btn-primary">Tambah Pembelian</a>
        <div class="content">
        </div>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Jumlah Alat</th>
                    <th>Durasi</th>
                    <th>Alat yang dipilih</th>
                    <th> </th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Koneksi ke database
                $db_host = 'localhost';
                $db_username = 'root';
                $db_password = '';
                $db_name = 'rental_alat_sulap';

                $conn = mysqli_connect($db_host, $db_username, $db_password, $db_name);

                if (!$conn) {
                    die('Koneksi database gagal: ' . mysqli_connect_error());
                }

                // Mengambil data pembelian dari database
                $query = "SELECT * FROM penyewaan";
                $result = mysqli_query($conn, $query);

                while ($row = mysqli_fetch_assoc($result)) {
                    echo '<tr>';
                    echo '<td>' . $row['id'] . '</td>';
                    echo '<td>' . $row['jumlah'] . '</td>';
                    echo '<td>' . $row['durasi'] . '</td>';
                    echo '<td>' . $row['alat'] . '</td>';
                    echo '<td><a href="edit.php?id=' . $row['id'] . '" class="btn btn-edit">Edit</a>';
                    echo '<a href="delete.php?id=' . $row['id'] . '" class="btn btn-delete">Hapus</a></td>';
                    echo '</tr>';
                }

                mysqli_close($conn);
                ?>
            </tbody>
        </table><br><br><br>
            <!-- ... kode sebelumnya ... -->

        <div class="jumbotron">
            <form action="login.php" method="GET">
                <button type="submit" name="logout" class="">Sign In</button>
            </form>
        </div>
    </div>
</body>
</html>
