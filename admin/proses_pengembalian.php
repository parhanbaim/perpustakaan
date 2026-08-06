<?php
$id = $_GET['id'];
$buku = $_GET['buku'];
date_default_timezone_set("Asia/Jakarta");
$tgl_kembali = date('Y-m-d H:i:s');
include'../koneksi.php';
$data = mysqli_query($koneksi, "UPDATE transaksi SET status_transaksi='Pengembalian',tgl_kembali='$tgl_kembali' WHERE id_transaksi='$id'");
if($data){
    mysqli_query($koneksi, "UPDATE buku SET status='tersedia' WHERE id_buku='$buku'");
    echo"<script>alert('Buku Sukses Dikembalikan'); window.location.assign('?halaman=data_peminjaman');</script>";
}