<?php
include '../koneksi.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (isset($_POST['tombol'])) {
    $judul_buku = $_POST['judul_buku'];
    $pengarang = $_POST['pengarang'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $status = "tersedia";

    $query = "UPDATE buku SET judul_buku='$judul_buku', pengarang='$pengarang', penerbit='$penerbit', tahun_terbit='$tahun_terbit', status='$status' WHERE id_buku=$id";
    $data = mysqli_query($koneksi, $query);

    if ($data) {
        header("Location: dashboard.php?halaman=data_buku");
        exit;
    } else {
        echo "<script>alert('data gagal tersimpan');</script>";
    }
}

$query_buku = mysqli_query($koneksi, "SELECT * FROM buku WHERE id_buku=$id");
$data_buku = mysqli_fetch_assoc($query_buku);
?>
<h4>Edit Data Buku</h4>
<form action="?halaman=edit_buku&id=<?= $id ?>" method="post" class="mt-3">
    <input value="<?= $data_buku['judul_buku'] ?>" type="text" name="judul_buku" class="form-control mb-2" placeholder="Judul buku" required>
    <input value="<?= $data_buku['pengarang'] ?>" type="text" name="pengarang" class="form-control mb-2" placeholder="Pengarang" required>
    <input value="<?= $data_buku['penerbit'] ?>" type="text" name="penerbit" class="form-control mb-2" placeholder="Penerbit" required>
    <input value="<?= $data_buku['tahun_terbit'] ?>" type="number" maxlength="4" name="tahun_terbit" class="form-control mb-2" placeholder="Tahun Terbit">
    <button name="tombol" type="submit" class="btn btn-primary">Simpan</button>
</form>