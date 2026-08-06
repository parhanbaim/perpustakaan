<?php
$id = $_GET['id'];
include'../koneksi.php';
$query = mysqli_query($koneksi, "DELETE FROM buku WHERE id_buku='$id'");
header("location:?halaman=data_buku");