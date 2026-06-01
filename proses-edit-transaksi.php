<?php
include("../koneksi.php");

if(isset($_POST['edit'])){
    $kode_transaksi = $_POST['kode_transaksi'];
    $kode_brg       = $_POST['kode_brg'];
    $harga          = $_POST['harga'];
    $jumlah_lama    = $_POST['jumlah_lama'];
    $jumlah_baru    = $_POST['jumlah'];

    // Ambil stok barang saat ini
    $barang = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT * FROM bara WHERE kode_brg='$kode_brg'"));
    $stok_sekarang = $barang['jumlah'];

    // Hitung stok baru setelah update
    $selisih = $jumlah_baru - $jumlah_lama;
    if($selisih > $stok_sekarang){
        die("Stok barang tidak cukup! Stok tersedia: $stok_sekarang");
    }

    $total_bayar = $harga * $jumlah_baru;

    // Update transaksi
    $sql = "UPDATE transaksi SET 
            jumlah='$jumlah_baru',
            total_bayar='$total_bayar'
            WHERE kode_transaksi='$kode_transaksi'";
    
    $query = mysqli_query($koneksi, $sql);

    if($query){
        // Update stok barang di tabel bara
        $sisa_stok = $stok_sekarang - $selisih;
        mysqli_query($koneksi, "UPDATE bara SET jumlah='$sisa_stok' WHERE kode_brg='$kode_brg'");

        header('Location: data-transaksi.php?status=sukses');
        exit;
    } else {
        echo "Gagal update transaksi: ".mysqli_error($koneksi);
    }
}else{
    die("Akses dilarang!");
}
?>