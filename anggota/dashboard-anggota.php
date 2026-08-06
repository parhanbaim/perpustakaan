<?php
include'../koneksi.php';
session_start();
if (empty($_SESSION['id_anggota'])){
    header("location:../login-anggota.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Anggota - Aplikasi Perpustakaan Nirmala</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="container mt-3 mb-4">
        <h4>Halaman Anggota - Aplikasi Perpustakaan Nirmala</h4>
        
        <a href="dashboard-anggota.php" class="btn btn-success text-white">Dashboard</a>
        <a href="?halaman=history" class="btn btn-success text-white">History Peminjaman</a>
        <a href="logout.php" class="btn btn-success text-white">Logout</a>

        <div class="card p-4 mt-3">
            <?php

            $halaman = isset($_GET['halaman']) ? $_GET['halaman'] : '';

            if(file_exists($halaman . ".php")){

            include $halaman . ".php";
            }else{
            ?>
                <h4>Selamat Datang <?= $_SESSION['nama_anggota'];?></h4>
                <form action="?halaman=cari" method="post">
                    <label class="text-muted">Yuk Cari Judul Buku</label>
                    <input type="text" name="kunci" class="form-control mb-2" required placeholder="Masukkan Judul Buku">
                    <button type="submit" class="btn btn-primary">Cari</button>
                </form>
                <hr>
                    <h4>Daftar Buku Yang Dipinjam :</h4>
                    <table class="table table-bordered">
                        <tr class="fw-bold">
                            <td>No</td>
                            <td>Judul Buku</td>
                            <td>Tanggal Pinjam</td>
                            <td>Pengembalian</td>
                        </tr>
                        <?php
                        $no = 1;
                        $query = "SELECT*FROM transaksi,buku WHERE buku.id_buku=transaksi.id_buku AND
                        transaksi.id_anggota=$_SESSION[id_anggota] AND status_transaksi='Peminjaman'";
                        $data = mysqli_query($koneksi, $query);
                        foreach($data as $peminjaman){ ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $peminjaman['judul_buku']?></td>
                            <td><?= $peminjaman['tgl_pinjam']?></td>
                            <td>
                                <a href="?halaman=pengembalian&id=<?= $peminjaman['id_transaksi'] ?>&buku=<?= $peminjaman['id_buku'] ?>"
                                class="btn btn-success" onclick="return confirm('Pengembalian Buku <?= $peminjaman['judul_buku'] ?>')">
                                Pengembalian
                                </a>
                            </td>
                        </tr> 
                    <?php } ?>
                    </table>
                    <hr>
                    <h4>Daftar Buku :</h4>
                    <?php
                    $data_buku = mysqli_query($koneksi, "SELECT*FROM buku ORDER BY id_buku DESC");
                    foreach($data_buku as $buku){
                        ?>
                        <div class="col-md-3">
                            <div class="card shadow-sm p-3 d-flex">
                                <h5><?= $buku['judul_buku']?></h5>

                                <p><strong>Pengarang :</strong> <?= $buku['penerbit']?></p>
                                <p><strong>Diterbitkan Tahun :</strong> <?= $buku['tahun_terbit']?></p>
                                <?php if($buku['status']=="tersedia"){ ?>
                            <span class="badge bg-success mb-1">Tersedia</span>
                            <a href="?halaman=peminjaman&id=<?= $buku['id_buku']?>" class="btn btn-primary text-white"
                            onclick="return confirm('Peminjaman Buku <?= $buku['judul_buku'] ?>?')">Pinjam Buku</a>
                            <?php }else{?>
                            <span class="badge bg-danger mb-1">Tidak Tersedia</span>
                            <a href="?halaman=peminjaman&id=<?= $buku['id_buku']?>" class="btn btn-primary text-white disable">Pinjam Buku</a>
                            <?php } ?>
                            </div>
                        </div>
                   <?php } ?>
           <?php } ?>
        </div>
    </div>    
</body>
</html>