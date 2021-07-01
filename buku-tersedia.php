<?php include('koneksi.php');?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List-Buku</title>
        <link rel="stylesheet" href="tampilan.css">
    </head>
    <body>
    <?php include("header-perpustakaan.html")?>
    <div class="row">
        <div>
            <ul class="MenuLeft1">
                <h2 class="Fpinjam">FITUR</h2>
                <li><a class="MenuLeft" href="tambah-buku.php">[+] Tambah baru</a></li>
                <li><a class="MenuLeft" href="pinjam-buku.php">[+] Pinjam</a></li>
                <li><a class="MenuLeft" href="buku-tersedia.php">Buku Tersedia</a></li>
            </ul>
        </div>
        <div class="leb70" style="padding: 20px;">
        <div class="container" style="padding-top: 30px; padding-bottom: 30px;">
        <h1>List Buku Tersedia</h1>
        
        <br>
        <table>
            <tr>
                <th>ID BUKU</th>
                <th>JUDUL BUKU</th>
                <th>ACTION</th>
            </tr>
            <?php

            $sql = "SELECT * FROM buku_available";
            $result = mysqli_query($conn, $sql);

            while($buku = mysqli_fetch_array($result)){
                echo "<tr>";
                echo "<td align='center'>" . $buku['id_buku'] . "</td>";
                echo "<td>" . $buku['judul_buku'] . "</td>";
                echo "<td> <a href='form-edit-buku.php?id_buku=".$buku['id_buku']."'>Edit</a> | <a href='hapus-buku.php?id_buku=".$buku['id_buku']."'>Hapus</a></td>"; 
                echo "</tr>";
            }
            
            ?>
        </div>
    </div>
    </body>
</html>