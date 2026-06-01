<?php
include("../koneksi.php");

if(isset($_POST['tambah'])){

    $kode   = mysqli_real_escape_string($koneksi, $_POST['kode']);
    $nama   = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $merk   = mysqli_real_escape_string($koneksi, $_POST['merk']);
    $harga  = mysqli_real_escape_string($koneksi, $_POST['harga']);
    $jumlah = isset($_POST['jumlah']) ? mysqli_real_escape_string($koneksi, $_POST['jumlah']) : 0;

    // Batasi panjang kode (misal maksimal 20 karakter)
    if(strlen($kode) > 20){
        die("Kode barang terlalu panjang! Maksimal 20 karakter.");
    }

    // Cek apakah kode barang sudah ada
    $cek = mysqli_query($koneksi, "SELECT * FROM bara WHERE kode_brg='$kode'");

    if(mysqli_num_rows($cek) > 0){
        die("Kode barang sudah ada! Gunakan kode lain.");
    }

    $sql = "INSERT INTO bara (kode_brg, nama_brg, merk, harga, jumlah)
            VALUES ('$kode', '$nama', '$merk', '$harga', '$jumlah')";

    $query = mysqli_query($koneksi, $sql);

    if($query){
        header('Location: data-barang.php?status=sukses');
        exit;
    }else{
        echo "Gagal: " . mysqli_error($koneksi);
    }

}else{
    die("Akses dilarang...!");
}
?>