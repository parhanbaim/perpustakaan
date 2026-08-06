<?php
include '../koneksi.php';
$id = isset($_GET['id']) ? $_GET['id'] : 0;
$query_anggota = mysqli_query($koneksi, "SELECT * FROM anggota WHERE id_anggota='$id'");
$data_anggota = mysqli_fetch_array($query_anggota);
?>
<h4>Edit Data Anggota </h4>
<form action="#" method="post" class="mt-3">
    <input type="number" value="<?= $data_anggota['nis']?>" name="nis" class="form-control mb-2" placeholder="NIS" required>
    <input type="text" value="<?= $data_anggota['nama_anggota']?>" name="nama_anggota" class="form-control mb-2" placeholder="Nama Anggota" required>
    <input type="text" value="<?= $data_anggota['username']?>" name="username" class="form-control mb-2" placeholder="Username" required>
    <input type="text" value="<?= $data_anggota['password']?>" name="password" class="form-control mb-2" placeholder="Password" required>
    <input type="text" value="<?= $data_anggota['kelas']?>" name="kelas" class="form-control mb-2" placeholder="Kelas" required>
    <button name="tombol" type="submit" class="btn btn-primary">Simpan</button>
</form>
<?php
if(isset($_POST['tombol'])){
    $nis = $_POST['nis'];
    $nama_anggota = $_POST['nama_anggota'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $kelas = $_POST['kelas'];
    include '../koneksi.php';
    $query = "UPDATE anggota SET nis='$nis', nama_anggota='$nama_anggota', username='$username', password='$password', kelas='$kelas' WHERE id_anggota='$id'";
    $data = mysqli_query($koneksi, $query);
    if($data){
        echo "<script>alert('data tersimpan'); window.location.href='?halaman=data_anggota';</script>";
    }else{
        echo "<script>alert('data gagal tersimpan'); window.location.href='?halaman=input_anggota';</script>";
    }
}
?>