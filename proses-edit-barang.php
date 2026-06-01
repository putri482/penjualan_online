<?php
include("../koneksi.php");

if(isset($_POST['edit'])){
    $kode_brg = $_POST['kode_brg'];
    $nama     = $_POST['nama'];
    $merk     = $_POST['merk'];
    $harga    = $_POST['harga'];
    $jumlah   = $_POST['jumlah'];

    // Update data di tabel bara
    $sql = "UPDATE bara SET 
            nama_brg='$nama',
            merk='$merk',
            harga='$harga',
            jumlah='$jumlah'
            WHERE kode_brg='$kode_brg'";

    $query = mysqli_query($koneksi, $sql);

    if($query){
        header('Location: data-barang.php?status=sukses');
        exit;
    }else{
        echo "Gagal update: " . mysqli_error($koneksi);
    }
}else{
    die("Akses dilarang!");
}
?>