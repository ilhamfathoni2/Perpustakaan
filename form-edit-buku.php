<?php include("koneksi.php");

$id_buku = $_GET['id_buku'];
$sql = "SELECT * FROM tb_buku WHERE id_buku='$id_buku'";
$result = mysqli_query($conn, $sql);
$txt = mysqli_fetch_row($result);
$judul = $txt[1];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="tampilan.css">
        <title>Form Edit Buku</title>
    </head>
    <body>
        <?php include("header-perpustakaan.html")?>
        <div class="menu-action" style="width: 50%;">
        <form action="proses-edit-buku.php" method="post">
        <h1>FORM EDIT BUKU</h1>
            <input type="hidden" name="id_buku" value="<?php echo $id_buku?>">
            <label for="judul">Judul</label>
            <input type="text" name="judul_baru" value="<?php echo $judul?>">
            <table width=100%>
            <tr>
                <td><button type="reset">Reset</button></td>    
                <td><button class="notice" type="submit" name="ubah">Ubah</button></td>
            </tr>
            </table>
        </form>
        </div>
    </body>
</html>