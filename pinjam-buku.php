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
            <h2 class="Fpinjam">FORM PINJAM BUKU</h2>
            <form action="proses-pinjam-buku.php" method="POST">
                <label class="Fpinjam" class="labelF" for="">Nama Member</label><br>
                <select name="id_member" id="">
                <?php
                    $sql = "SELECT tbm.id_member, tbm.nama_member, COUNT(rkb.id_buku) as jumlah FROM tb_member as tbm
                    LEFT JOIN rekap_belum_kembali as rkb
                    ON tbm.id_member = rkb.id_member
                    GROUP BY tbm.id_member
                    HAVING jumlah < 3 ORDER BY tbm.nama_member";
                    $res  = mysqli_query($conn, $sql);
                    while($mem = mysqli_fetch_array($res)){
                        echo "<option value='" .$mem['id_member']."'>".$mem['id_member']." - ".$mem['nama_member']."</option>";    
                    }
                ?></select><br>
                <label class="labelF" for="">Buku</label><br>
                <select name="id_buku" id="">
                <?php
                    $sql = "SELECT * FROM buku_available ORDER BY judul_buku";
                    $res  = mysqli_query($conn, $sql);
                    while($buku = mysqli_fetch_array($res)){
                        echo "<option value='" .$buku['id_buku']."'>".$buku['judul_buku']."</option>";    
                    }
                ?></select>
                <table width=100%>
                <tr>  
                    <td colspan="2" align="center"><button class="notice" type="submit">Pinjam !</button><br><br><a class="Fpinjam" href="pinjam-buku.php?help">Cannot find member ?</a></td>
                </tr>
                <tr>
                </tr>
                <tr></tr>
                <?php
                if(isset($_GET['help'])){
                    echo "<tr><td colspan=2><h3>Here List of Quota Exceeded member:</h3></td></tr>";
                    echo "<tr></tr><tr><th>ID MEMBER</th><th>Nama Member</th></tr>";
                    $sql = "SELECT tbm.id_member, tbm.nama_member, COUNT(rkb.id_buku) as jumlah FROM tb_member as tbm
                    LEFT JOIN rekap_belum_kembali as rkb
                    ON tbm.id_member = rkb.id_member
                    GROUP BY tbm.id_member
                    HAVING jumlah > 2 ORDER BY tbm.nama_member";
                    $res  = mysqli_query($conn, $sql);
                    while($mem = mysqli_fetch_array($res)){
                        echo "<tr>";
                        echo "<td>" .$mem['id_member']. "</td><td>" . $mem['nama_member']."</td>";    
                    }
                }
                ?>
                </table>
            </form>
            
            </div>
        </div>
        <div class="leb70"  style="padding: 20px;">
        <div class="container" style="padding-top: 30px; padding-bottom: 30px;">
        <h1>List Buku</h1>
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

    <div class="row">
        <div class="column left">
        
        </div>
        <div class="column middle">
        
    </div>
    </body>
</html>