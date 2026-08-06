<?php
include'../koneksi.php';
date_default_timezone_set("Asia/Jakarta");
$id = $_GET['id'];
$buku = $_GET['buku'];
$tgl = date('Y-m-d H:i:s');
$query = "UPDATE transaksi SET tgl_kembali='$tgl', status_transaksi='Pengembalian' WHERE id_transaksi='$id' AND id_anggota='$_SESSION[id_anggota]'";
$data = mysqli_query($koneksi, $query);
if($data){
    mysqli_query($koneksi, "UPDATE buku SET status='tersedia' WHERE id_buku='$buku'");
    echo"<script>alert('Buku Sudah Dikembalikan'); window.location.assign('?halaman=history');</script>";
}
?>