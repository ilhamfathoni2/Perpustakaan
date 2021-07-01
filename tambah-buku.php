<?php include('koneksi.php');?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List-Buku</title>
        <link rel="stylesheet" href="tampilan.css">
        <style>

        </style>
    </head>
    <body>
    <?php include("header-perpustakaan.html")?>
    <div class="row">
        <div class="MenuLeft1">
            <div class="menu-action">
            <h2 class="FiturP">FORM TAMBAH BUKU BARU</h2>
            <form action="proses-tambah-buku.php" method="POST">
                <input type="text" name="judul_buku" placeholder="Masukan judul buku baru">
                <table width=100%>
                    <tr>
                        <td><button class="notice" type="reset">Clear</button></td>    
                        <td><button class="notice" type="submit">Tambahkan</button></td>
                    </tr>
                </table>
            </form>
            </div>
        </div>
        <div class="leb70" style="padding: 20px;">
        <div class="container" style="padding-top: 30px; padding-bottom: 30px;">
        <h1>List Buku</h1>
        <a href="tambah-buku.php">[+] Tambah Baru <br></a>
        <br>
        <table>
            <tr>
                <th>ID BUKU</th>
                <th>JUDUL BUKU</th>
                <th>ACTION</th>
            </tr>
            <?php

            $sql = "SELECT * FROM tb_buku";
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

    <div class="row">
        <div class="column left">
        
        </div>
        <div class="column middle">
        
    </div>
    </body>
</html>