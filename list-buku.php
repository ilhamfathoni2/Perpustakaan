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
        <div class="kolom w-30">
            <ul class="MenuLeft1">
                <h2 class="FiturP">FITUR</h2>
                <?php $buff = "judul buku . ."; include("pencarian.php")?><br>
                <li><a class="MenuLeft" href="tambah-buku.php">[+] tambah baru</a></li>
                <li><a class="MenuLeft" href="pinjam-buku.php">[+] pinjam</a></li>
                <li><a class="MenuLeft" href="buku-tersedia.php">Buku Tersedia</a></li>
            </ul>
        </div>
        
        <div class="leb70">
        <div class="container" style="padding-top: 30px; padding-bottom: 31%;">
        <h1>List Buku</h1>
        <br>
        <table>
            <tr>
                <th>ID BUKU</th>
                <th>JUDUL BUKU</th>
                <th>ACTION</th>
            </tr>
            <?php
            function cetak($result){
                while($buku = mysqli_fetch_array($result)){
                    echo "<tr>";
                    echo "<td align='center'>" . $buku['id_buku'] . "</td>";
                    echo "<td>" . $buku['judul_buku'] . "</td>";
                    echo "<td> <a href='form-edit-buku.php?id_buku=".$buku['id_buku']."'>Edit</a> | <a href='hapus-buku.php?id_buku=".$buku['id_buku']."'>Hapus</a></td>"; 
                    echo "</tr>";
                }
            }
            if(isset($_GET['cari'])){
                $kata_kunci = $_GET['kata_kunci'];
                $sql = "SELECT * FROM tb_buku WHERE judul_buku LIKE '%$kata_kunci%'";
                $result = mysqli_query($conn, $sql);
            cetak($result);
            } else{
                $sql = "SELECT * FROM tb_buku";
            $result = mysqli_query($conn, $sql);
            cetak($result);
            }
            
            ?>
        </table>
        </div>
    </div>
    </body>
</html>

<?php
    
?>