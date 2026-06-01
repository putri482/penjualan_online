<?php include("../koneksi.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Form Tambah Barang</title>
</head>
<body>
    <h3>Form Tambah Barang</h3>
    <a href="data-barang.php"><-- Kembali ke Data Barang</a>
    <br><br>

    <form action="proses-tambah-barang.php" method="post">
        <fieldset>
            <p>
                <label for="kode">Kode Barang:</label><br>
                <input type="text" name="kode" id="kode" placeholder="Kode barang" required />
            </p>
            <p>
                <label for="nama">Nama Barang:</label><br>
                <input type="text" name="nama" id="nama" placeholder="Nama barang" required />
            </p>
            <p>
                <label for="merk">Merk Barang:</label><br>
                <input type="text" name="merk" id="merk" placeholder="Merk barang" required />
            </p>
            <p>
                <label for="harga">Harga Barang:</label><br>
                <input type="number" name="harga" id="harga" placeholder="Harga barang" required min="0" />
            </p>
            <p>
                <label for="jumlah">Stok Barang:</label><br>
                <input type="number" name="jumlah" id="jumlah" placeholder="Stok barang" required min="0" value="0" />
            </p>
            <p>
                <button type="submit" name="tambah">Tambah</button>
            </p>
        </fieldset>
    </form>
</body>
</html>