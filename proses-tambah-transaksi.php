<?php
include("../koneksi.php");

if(isset($_POST['tambah'])){
    $kode_brg = $_POST['kode_brg'];
    $jumlah   = $_POST['jumlah'];

    // Ambil data barang dari tabel bara
    $barang_query = mysqli_query($koneksi, "SELECT * FROM bara WHERE kode_brg='$kode_brg'");
    $barang = mysqli_fetch_assoc($barang_query);

    if(!$barang){
        die("Barang tidak ditemukan!");
    }

    $nama_brg       = $barang['nama_brg'];
    $harga          = $barang['harga'];
    $stok_sekarang  = $barang['jumlah'];

    // Cek stok barang
    if($jumlah > $stok_sekarang){
        die("Stok barang tidak cukup! Stok tersedia: $stok_sekarang");
    }

    // Hitung total bayar
    $total_bayar = $harga * $jumlah;

    // Buat kode transaksi otomatis (misal: T + timestamp)
    $kode_transaksi = "T".time();

    // Tanggal transaksi
    $tanggal = date("Y-m-d H:i:s");

    // Simpan transaksi ke tabel transaksi
    $sql = "INSERT INTO transaksi (kode_transaksi, kode_brg, nama_brg, harga, jumlah, total_bayar, tanggal)
            VALUES ('$kode_transaksi', '$kode_brg', '$nama_brg', '$harga', '$jumlah', '$total_bayar', '$tanggal')";
    
    $query = mysqli_query($koneksi, $sql);

    if($query){
        // Update stok barang di tabel bara
        $sisa_stok = $stok_sekarang - $jumlah;
        mysqli_query($koneksi, "UPDATE bara SET jumlah='$sisa_stok' WHERE kode_brg='$kode_brg'");

        // Redirect ke halaman data-transaksi.php
        header('Location: data-transaksi.php?status=sukses');
        exit;
    } else {
        echo "Gagal menambahkan transaksi: ".mysqli_error($koneksi);
    }

} else {
    die("Akses dilarang!");
}
?>