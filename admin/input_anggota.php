<h4>Tambah Data Anggota</h4>
<form method="post" action="#" class="mt-3">
    <input name="nis" type="number" class="form-control mb-2" placeholder="NIS"  required>
    <input name="nama_anggota" type="text" class="form-control mb-2" placeholder="Nama Anggota" required>
    <input name="username" type="text" class="form-control mb-2" placeholder="Username" required>
    <input name="password" type="text" class="form-control mb-2" placeholder="Password" required>
    <input name="kelas" type="text" class="form-control mb-2" placeholder="Kelas" required>
    <button name="tombol" type="submit" class="btn btn-primary">Simpan</button>
</form>
<?php
if(isset($_POST['tombol'])){
    $nis = $_POST['nis'];
    $nama_anggota = $_POST['nama_anggota'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $kelas = $_POST['kelas'];
    include'../koneksi.php';
    $query = "INSERT INTO anggota(nis,nama_anggota,username,password,kelas) VALUES('$nis', '$nama_anggota', '$username', '$password', '$kelas')";
    $data = mysqli_query($koneksi, $query);
    if($data){
        echo "<script>alert('data tersimpan'); window.location.href='?halaman=data_anggota';</script>";
    }else{
        echo "<script>alert('data gagal tersimpan'); window.location.href='?halaman=input_anggota';</script>";
    }
}
?>