<?php
include("../koneksi.php");

// Pastikan kode_transaksi ada di URL
if(!isset($_GET['kode_transaksi'])){
    die("Kode transaksi tidak ditemukan!");
}

$kode_transaksi = $_GET['kode_transaksi'];

// Ambil data transaksi untuk mengetahui kode_brg dan jumlah
$query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE kode_transaksi='$kode_transaksi'");
if(mysqli_num_rows($query) == 0){
    die("Transaksi tidak ditemukan!");
}

$data = mysqli_fetch_assoc($query);
$kode_brg = $data['kode_brg'];
$jumlah   = $data['jumlah'];

// Hapus transaksi
$sql = "DELETE FROM transaksi WHERE kode_transaksi='$kode_transaksi'";
$hapus = mysqli_query($koneksi, $sql);

if($hapus){
    // Kembalikan stok barang di tabel bara
    mysqli_query($koneksi, "UPDATE bara SET jumlah = jumlah + $jumlah WHERE kode_brg='$kode_brg'");

    // Redirect ke halaman data-transaksi.php
    header('Location: data-transaksi.php?status=sukses');
    exit;
} else {
    echo "Gagal menghapus transaksi: ".mysqli_error($koneksi);
}
?>