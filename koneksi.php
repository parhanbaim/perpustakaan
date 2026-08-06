<?php
$server = "localhost";
$pengguna = "root";
$password = "";
$database = "perpustakaan";

$koneksi = mysqli_connect($server,$pengguna,
$password,$database);
if(!$koneksi){
    echo "Koneksi Eror : ".mysqli_error($koneksi);
}
