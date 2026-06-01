<?php
include("../koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Transaksi</title>
</head>
<body>
    <h1>Data Transaksi</h1>
    <a href="../index.php"><-- Kembali</a>
    <br>
    <a href="tambah-transaksi.php">[+] Tambah Transaksi</a>
    <br><br>

    <table border="1">
        <thead>
            <tr>
                <th>Kode Transaksi</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total Bayar</th>
                <th>Tanggal</th>
                <th>Tindakan</th>
            </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT * FROM transaksi ORDER BY tanggal DESC";
        $query = mysqli_query($koneksi, $sql);

        while($data = mysqli_fetch_assoc($query)){
            echo "<tr>";
            echo "<td>".$data['kode_transaksi']."</td>";
            echo "<td>".$data['kode_brg']."</td>";
            echo "<td>".$data['nama_brg']."</td>";
            echo "<td>".$data['harga']."</td>";
            echo "<td>".$data['jumlah']."</td>";
            echo "<td>".$data['total_bayar']."</td>";
            echo "<td>".$data['tanggal']."</td>";

            echo "<td>";
            echo "<a href='edit-transaksi.php?kode_transaksi=".$data['kode_transaksi']."'>Edit</a> | ";
            echo "<a href='hapus-transaksi.php?kode_transaksi=".$data['kode_transaksi']."'>Hapus</a>";
            echo "</td>";

            echo "</tr>";
        }

        $total = mysqli_num_rows($query);
        ?>
        </tbody>
    </table>

    <p>Total Transaksi: <?php echo $total; ?></p>
</body>
</html>