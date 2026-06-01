<?php include("../koneksi.php"); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Barang</title>
</head>
<body>
   <h1>Data Barang</h1> 
   <a href="../index.php"><--Kembali</a>
   <br>
   <a href="tambah-barang.php">[+] Tambah Barang</a>
   <br><br>

   <table border="1"> 
      <thead>
        <tr>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Merk</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Tindakan</th>
        </tr>
      </thead>
      <tbody>
        <?php
         $sql = "SELECT * FROM bara";
         $query = mysqli_query($koneksi, $sql);

         while($databarang = mysqli_fetch_array($query)){
            echo "<tr>";
              echo "<td>".$databarang['kode_brg']."</td>";
              echo "<td>".$databarang['nama_brg']."</td>";
              echo "<td>".$databarang['merk']."</td>";
              echo "<td>".$databarang['harga']."</td>";
              echo "<td>".$databarang['jumlah']."</td>";

              echo "<td>";
              echo "<a href='edit-barang.php?kode_brg=".$databarang['kode_brg']."'>Edit</a> | ";
              echo "<a href='hapus-barang.php?kode_brg=".$databarang['kode_brg']."'>Hapus</a>";
              echo "</td>";
            echo "</tr>";
         }

         $total = mysqli_num_rows($query);
        ?>
      </tbody>
   </table>

   <p>Total: <?php echo $total; ?></p>

</body>
</html>