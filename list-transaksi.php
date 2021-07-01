<?php include('koneksi.php');
function cetak($result){
    while($buku = mysqli_fetch_array($result)){
        echo "<tr>";
        echo "<td>" . $buku['tgl_pinjam'] . "</td>";
        echo "<td>" . $buku['id_buku'] . "</td>";
        echo "<td>" . $buku['judul_buku'] . "</td>";
        echo "<td>" . $buku['id_member'] . "</td>";
        echo "<td>" . $buku['nama_member'] . "</td>";
        echo "<td>" . $buku['tgl_batas'] . "</td>";
        echo "</tr>";
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>List-Transaksi</title>
        <link rel="stylesheet" href="tampilan.css">
    </head>
    <body>
    <?php include("header-perpustakaan.html")?>
    <div class="row">
        <div class="kolom w-30">
            <ul class="MenuLeft1">
                <h2 class="FiturP">FITUR</h2>
                <li><a class="MenuLeft" href="pinjam-buku.php">[+] pinjam</a></li>
                <li><a class="MenuLeft" href="kembali-buku.php">[+] kembali</a></li>
                <li><a class="MenuLeft" href="list-transaksi.php?dead-line">Buku Deadline</a></li>
                <!-- <a href="#"><li>Fitur 2</li></a>
                <a href="#"><li>Fitur 3</li></a> -->
            </ul>
        </div>
        <div class="leb70">
        <div class="container" style="padding-top: 30px; padding-bottom: 50%;">
        <h1>Rekap Buku Belum Kembali</h1>
        <br>
        <table>
            <tr><th>TGL PINJAM</th>
                <th>ID BUKU</th>
                <th>JUDUL BUKU</th>
                <th>ID MEMBER</th>
                <th>NAMA MEMBER</th>
                <th>TGL BATAS</th>
            </tr>
            <?php
            if(isset($_GET['dead-line'])){
                $hari_ini = date("Y-m-d");
                $sql = "SELECT rbk.tgl_pinjam,rbk.id_buku, tbk.judul_buku, rbk.id_member, tbm.nama_member, rbk.tgl_batas
                            FROM rekap_belum_kembali AS rbk,
                            tb_member as tbm,
                            tb_buku as tbk
                            WHERE rbk.id_member=tbm.id_member AND
                            rbk.id_buku = tbk.id_buku
                            HAVING tgl_batas<'$hari_ini'
                            ORDER BY tgl_batas";
            }
            else{
                $sql = "SELECT rbk.tgl_pinjam,rbk.id_buku, tbk.judul_buku, rbk.id_member, tbm.nama_member, rbk.tgl_batas
                    FROM rekap_belum_kembali AS rbk,
                    tb_member as tbm,
                    tb_buku as tbk
                    WHERE rbk.id_member=tbm.id_member AND
                    rbk.id_buku = tbk.id_buku
                    ORDER BY tgl_batas";
            }
            $result = mysqli_query($conn, $sql);
            cetak($result);
            // echo $sql;
            ?>
        </div>
    </div>
</html>