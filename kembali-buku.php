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
    <div class="MenuLeft1">
            <div class="menu-action">
            <h2 class="FiturP">FORM PENGEMBALIAN BUKU</h2>
            <form action="" method="POST">
                <label class="FiturP" for="">Member</label><br>
                <select name="id_member" id="">
                <?php
                    $id_member=$_POST['id_member'];
                    $sql = "SELECT rbk.id_member, tbm.nama_member 
                            FROM rekap_belum_kembali AS rbk, 
                            tb_member AS tbm
                            WHERE rbk.id_member=tbm.id_member
                            GROUP BY rbk.id_member
                            ORDER BY rbk.tgl_batas";
                    $res  = mysqli_query($conn, $sql);
                    while($mem = mysqli_fetch_array($res)){
                        echo "<option value='" .$mem['id_member'] . "'";
                        if($mem['id_member']==$id_member) echo "selected";
                        echo ">".$mem['id_member']." - ".$mem['nama_member']."</option>";    
                    }
                ?></select>
                <table width=100%>
                <tr>  
                    <td colspan="2"><button class="notice" type="submit" name="cek">Check</button></td>
                </tr>
                </table>
            </form>
            <form action="proses-kembali-buku.php" method="POST">
                <input type="hidden" name="id_member" value="<?php echo $id_member; ?>">
                <label class="FiturP" for="">Buku</label><br>
                <select name="id_buku" id="">
                <?php
                    $sql = "SELECT rbk.id_buku, tbk.judul_buku
                    FROM rekap_belum_kembali AS rbk, 
                    tb_buku AS tbk
                    WHERE rbk.id_buku=tbk.id_buku AND rbk.id_member=\"$id_member\"
                    ORDER BY rbk.tgl_batas";
                    $res  = mysqli_query($conn, $sql);
                    while($buku = mysqli_fetch_array($res)){
                        echo "<option value='" .$buku['id_buku']."'>".$buku['judul_buku']."</option>";    
                    }
                ?></select>
                <table width=100%>
                <tr>  
                    <td colspan="2"><button class="notice" type="submit">Kembalikan</button></td>
                </tr>
                </table>
            </form>
            </div>
        </div>
        <div class="leb70" style="padding: 20px;">
        <div class="container" style="padding-top: 30px; padding-bottom: 30px;">
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
            
            $sql = "SELECT rbk.tgl_pinjam,rbk.id_buku, tbk.judul_buku, rbk.id_member, tbm.nama_member, rbk.tgl_batas
            FROM rekap_belum_kembali AS rbk,
            tb_member as tbm,
            tb_buku as tbk
            WHERE rbk.id_member=tbm.id_member AND
            rbk.id_buku = tbk.id_buku
            ORDER BY tgl_batas";
            $result = mysqli_query($conn, $sql);
            cetak($result);
            
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

<?php
    
?>