<h4>Tambah Data Buku</h4>
<form method="post" action="#" class="mt-3">
    <input name="judul_buku" type="text" class="form-control mb-2" placeholder="Judul Buku" required>
    <input name="pengarang" type="text" class="form-control mb-2" placeholder="Pengarang" required>
    <input name="penerbit" type="text" class="form-control mb-2" placeholder="Penerbit" required>
    <input type="number" name="tahun_terbit" maxlength="4" class="form-control mb-2" placeholder="Tahun Terbit" required>
    <button type="submit" name="tombol" class="btn btn-primary">Simpan</button>
</form>
<?php
if(isset($_POST['tombol'])){
    $judul_buku = $_POST['judul_buku'];
    $pengarang  = $_POST['pengarang'];
    $penerbit   = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $status     = "tersedia";

    include '../koneksi.php';

    $query = "INSERT INTO buku (judul_buku, pengarang, penerbit, tahun_terbit, status)
              VALUES ('$judul_buku', '$pengarang', '$penerbit', '$tahun_terbit', '$status')";
    $data = mysqli_query($koneksi, $query);

    if($data){
        echo "<script>alert('Data tersimpan'); window.location.href='?halaman=data_buku';</script>";
        exit;
    }else{
        echo "<script>alert('Data gagal tersimpan'); window.location.href='?halaman=input_buku';</script>";
        exit;
    }
}
?>