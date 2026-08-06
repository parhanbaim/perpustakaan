<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Anggota - Aplikasi Perpustakaan Farhana Nirmala</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>


<body class="bg-light">
    <div class="vh-100 row justify-content-center align-items-center">
        <form action="#" method="post" class="col-md-3 border p-4 bg-white rounded-4">
            <h4 class="text-center">Pendaftaran Anggota</h4>
            <h5 class="text-center mb-3">Aplikasi Perpustakaan Farhana Nirmala</h5>
            <input type="number" name="nis" class="form-control mb-3" placeholder="NIS" required>
            <input type="text" name="nama_anggota" class="form-control mb-3" placeholder="Nama Anggota" required>
            <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
            <input type="text" name="password" class="form-control mb-3" placeholder="Password" required>
            <input type="text" name="kelas" class="form-control mb-3" placeholder="Kelas" required>
            <button type="submit" name="tombol" class="btn btn-success w-100 mb-2">Daftar</button>
            <a href="login-admin.php" class="text-decoration-none">Login Sebagai Admin</a>
            <a href="login-anggota.php" class="text-decoration-none">Login Sebagai Anggota</a>
        </form>
    </div>
    
</body>
</html>
<?php
if(isset($_POST['tombol'])){
    include'koneksi.php';
    $nis = $_POST['nis'];
    $nama_anggota = $_POST['nama_anggota'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $kelas = $_POST['kelas'];
    $query = "INSERT INTO anggota(nis,nama_anggota,username,password,kelas) VALUES('$nis','$nama_anggota','$username','$password','$kelas')";
    $data = mysqli_query($koneksi, $query);
    if($data){
        session_start();
        $_SESSION['id_anggota'] = mysqli_insert_id($koneksi);
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password;
        $_SESSION['nama_anggota'] = $password;
        echo"<script>alert('Pendaftaran Berhasil'); window.location.assign('anggota/dashboard.php');</script>";
    }else{
        echo"<script>alert('Pendaftaran Gagal'); window.location.assign('pendaftaran-anggota.php');</script>";
    }
}
