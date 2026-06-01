<?php
include("../koneksi.php");

// Pastikan kode_brg ada di URL
if(!isset($_GET['kode_brg'])){
    die("Kode barang tidak ditemukan!");
}

$kode_brg = $_GET['kode_brg'];

// Hapus barang dari tabel bara
$sql = "DELETE FROM bara WHERE kode_brg='$kode_brg'";
$query = mysqli_query($koneksi, $sql);

if($query){
    // Redirect ke halaman data barang setelah sukses
    header('Location: data-barang.php?status=sukses');
    exit;
}else{
    echo "Gagal menghapus barang: ".mysqli_error($koneksi);
}
?>