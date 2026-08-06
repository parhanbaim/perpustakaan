<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Anggota - Aplikasi Perpustakaan Nirmala </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
</head>


<body class="bg-light">
    <div classs="vh-100 row justify-content-center align-items-center">
        <form action="#" method="post" class="col-md-3 border p-4 bg-white rounded-4">
            <h4 class="text-center">Login Anggota</h4>
            <h5 class="text-center mb-3">Aplikasi Perpustakaan Nirmala</h5>
            <input type="text" name="username" class="form-control mb-3" placeholder="Username">
            <input type="password" name="password" class="form-control mb-3" placeholder="Password">
            <button type="submit" name="tombol" class="btn btn-success w-100 mb-2">Login</button>
            <a href="login-admin.php" class="text-decoration-none">Login Sebagai Admin</a>
            <a href="pendaftaran-anggota.php" class="text-decoration-none">Pendaftaran Anggota</a>
        </form>
    </div>
    
</body>
</html>
<?php
if(isset($_POST['tombol'])){
    include'koneksi.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT*FROM anggota WHERE username='$username' AND password='$password'";
    $data = mysqli_query($koneksi, $query);
    if(mysqli_num_rows($data)>0){
        $data = mysqli_fetch_array($data);
        session_start();
        $_SESSION['id_anggota'] = $data['id_anggota'];
        $_SESSION['username'] = $data['username'];
        $_SESSION['nama_anggota'] = $data['nama_anggota'];
        header("location:anggota/dashboard-anggota.php");
    }else{
        echo"<script>alert('Login Gagal, Username / Password Salah'); window.location.assign('login-anggota.php');</script>";
    }
}
