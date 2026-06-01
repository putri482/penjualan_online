<?php
include("../koneksi.php");

// Ambil kode barang dari URL
if(!isset($_GET['kode_brg'])){
    die("Kode barang tidak ditemukan!");
}

$kode_brg = $_GET['kode_brg'];

// Ambil data barang dari database
$query = mysqli_query($koneksi, "SELECT * FROM bara WHERE kode_brg='$kode_brg'");

if(mysqli_num_rows($query) == 0){
    die("Data barang tidak ditemukan!");
}

$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Barang</title>
</head>
<body>
    <h3>Edit Barang</h3>
    <a href="data-barang.php"><-- Kembali ke Data Barang</a>
    <br><br>

    <form action="proses-edit-barang.php" method="post">
        <input type="hidden" name="kode_brg" value="<?php echo $data['kode_brg']; ?>" />

        <p>
            <label for="nama">Nama Barang:</label><br>
            <input type="text" name="nama" value="<?php echo $data['nama_brg']; ?>" required />
        </p>
        <p>
            <label for="merk">Merk Barang:</label><br>
            <input type="text" name="merk" value="<?php echo $data['merk']; ?>" required />
        </p>
        <p>
            <label for="harga">Harga Barang:</label><br>
            <input type="number" name="harga" value="<?php echo $data['harga']; ?>" required min="0" />
        </p>
        <p>
            <label for="jumlah">Stok Barang:</label><br>
            <input type="number" name="jumlah" value="<?php echo $data['jumlah']; ?>" required min="0" />
        </p>
        <p>
            <button type="submit" name="edit">Simpan Perubahan</button>
        </p>
    </form>
</body>
</html>