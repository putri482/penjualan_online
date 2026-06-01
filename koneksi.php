<?php
$host = "localhost";
$user = "root";
$pass = "";
$database = "penjualan_online";

$koneksi = mysqli_connect($host, $user, $pass, $database);

if(!$koneksi){
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>