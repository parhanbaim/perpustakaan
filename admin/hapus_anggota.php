<?php
$id = $_GET['id'];
include'../koneksi.php';
$query = mysqli_query($koneksi, "DELETE FROM anggota WHERE id_anggota='$id'");
header("location:?halaman=data_anggota");