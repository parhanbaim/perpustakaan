<?php
$kunci = isset($_POST['kunci'])? $_POST['kunci'] : '';
?>
<h4>Pencarian Buku : "<?= $kunci ?>"</h4>
<form action="?halaman=cari" method="post">
    <label class="text-muted">Yuk Cari Judul Buku</label>
    <input type="text" name="kunci" class="form-control mb-2" placeholder="Masukkan judul buku yang dicari" value="<?= $kunci ?>">
    <button type="submit" class="btn btn-primary mt-2">Cari</button>
</form>
<div class="row mt-2">
    <?php
    include "../koneksi.php";
    $data_buku = mysqli_query($koneksi, "SELECT*FROM buku WHERE judul_buku LIKE '%$kunci%'");
    foreach ($data_buku as $buku) {
    ?>
        <div class="col-md-3">
            <h5><?= $buku['judul_buku'] ?></h5>
            <p><strong>Pengarang:</strong> <?= $buku['pengarang'] ?></p>
            <p><strong>Penerbit:</strong> <?= $buku['penerbit'] ?></p>
            <p><strong>Tahun Terbit:</strong> <?= $buku['tahun_terbit'] ?></p>
            <?php if (strtolower($buku['status']) == 'tersedia') { ?> 
                <span class="badge bg-success mb-1">Tersedia</span>
                <a href="?halaman=peminjaman&id=<?= $buku['id_buku'] ?>" class="btn btn-primary btn-sm"
                onclick="return confirm('Peminjaman Buku <?= $buku['judul_buku'] ?> ..?')">Pinjam Buku</a>
            <?php }else{ ?>
                <span class="badge bg-danger mb-1">Tidak Tersedia</span>
                <a href="?halaman=peminjaman&id=<?= $buku['id_buku'] ?>" class="btn btn-primary text-white disabled">Pinjam Buku</a>
            <?php } ?>
        </div>
    <?php } ?>
</div>