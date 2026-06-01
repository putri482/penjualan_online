<?php
include("../koneksi.php");

// Ambil kode_transaksi dari URL
if(!isset($_GET['kode_transaksi'])){
    die("Kode transaksi tidak ditemukan!");
}

$kode_transaksi = $_GET['kode_transaksi'];

// Ambil data transaksi
$query = mysqli_query($koneksi, "SELECT * FROM transaksi WHERE kode_transaksi='$kode_transaksi'");
if(mysqli_num_rows($query) == 0){
    die("Transaksi tidak ditemukan!");
}

$data = mysqli_fetch_assoc($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Transaksi</title>
</head>
<body>
    <h3>Edit Transaksi</h3>
    <a href="data-transaksi.php"><-- Kembali ke Data Transaksi</a>
    <br><br>

    <form action="proses-edit-transaksi.php" method="post">
        <input type="hidden" name="kode_transaksi" value="<?php echo $data['kode_transaksi']; ?>" />
        <input type="hidden" name="kode_brg" value="<?php echo $data['kode_brg']; ?>" />
        <input type="hidden" name="harga" value="<?php echo $data['harga']; ?>" />
        <input type="hidden" name="jumlah_lama" value="<?php echo $data['jumlah']; ?>" />

        <p>
            <label>Kode Barang:</label><br>
            <input type="text" value="<?php echo $data['kode_brg']; ?>" disabled />
        </p>

        <p>
            <label>Nama Barang:</label><br>
            <input type="text" value="<?php echo $data['nama_brg']; ?>" disabled />
        </p>

        <p>
            <label>Harga Barang:</label><br>
            <input type="number" value="<?php echo $data['harga']; ?>" disabled />
        </p>

        <p>
            <label>Jumlah:</label><br>
            <input type="number" name="jumlah" value="<?php echo $data['jumlah']; ?>" min="1" required />
        </p>

        <p>
            <button type="submit" name="edit">Simpan Perubahan</button>
        </p>
    </form>
</body>
</html>