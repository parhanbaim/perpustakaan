<?php
session_start();
if (empty($_SESSION['id_admin'])) {

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - Aplikasi Perpustakaan Nirmala</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-3">
        <h4>Halaman Admin - Aplikasi Perpustakaan Farhana Nirmala</h4>

        <a href="dashboard.php" class="btn btn-success text-white">Dashboard</a>
        <a href="?halaman=data_buku" class="btn btn-primary text-white">Buku</a>
        <a href="?halaman=data_anggota" class="btn btn-info text-white">Anggota</a>
        <a href="?halaman=data_peminjaman" class="btn btn-warning text-white">Peminjaman</a>
        <a href="logout.php" class="btn btn-danger text-white">Logout</a>

        <div class="card p-3 mt-3">
            <?php

            $halaman = isset($_GET['halaman']) ? $_GET['halaman'] : '';

            if (file_exists($halaman . ".php")) {

                include $halaman . ".php";
            } else {
                ?>
                    <h4>Selamat Datang <?= $_SESSION['nama_admin']; ?></h4>
                    <p class="text-justify text-muted">
                        Aplikasi Perpustakaan Farhana Nirmala merupakan sistem perpustakaan berbasis web
                        yang dirancang untuk membantu pengelolaan data buku, peminjaman,
                        dan pengembalian secara lebih mudah, cepat dan terorganisir.
                    </p>
            <?php } ?>
        </div>
    </div>
</body>
</html>