<?php
include("../koneksi.php");

// Ambil daftar barang untuk dropdown
$barang_query = mysqli_query($koneksi, "SELECT * FROM bara ORDER BY nama_brg ASC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Transaksi</title>
</head>
<body>
    <h3>Form Tambah Transaksi</h3>
    <a href="data-transaksi.php"><-- Kembali ke Data Transaksi</a>
    <br><br>

    <form action="proses-tambah-transaksi.php" method="post">
        <fieldset>
            <p>
                <label for="kode_brg">Pilih Barang:</label><br>
                <select name="kode_brg" id="kode_brg" required>
                    <option value="">-- Pilih Barang --</option>
                    <?php
                    while($b = mysqli_fetch_assoc($barang_query)){
                        echo "<option value='".$b['kode_brg']."'>".$b['kode_brg']." - ".$b['nama_brg']."</option>";
                    }
                    ?>
                </select>
            </p>

            <p>
                <label for="jumlah">Jumlah:</label><br>
                <input type="number" name="jumlah" id="jumlah" value="1" min="1" required>
            </p>

            <p>
                <button type="submit" name="tambah">Simpan Transaksi</button>
            </p>
        </fieldset>
    </form>
</body>
</html>