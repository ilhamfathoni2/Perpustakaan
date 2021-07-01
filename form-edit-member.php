<?php include("koneksi.php");

$id_member = $_GET['id_member'];
$sql = "SELECT * FROM tb_member WHERE id_member='$id_member'";
$result = mysqli_query($conn, $sql);
$txt = mysqli_fetch_row($result);
$nama = $txt[1];
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
        <form action="proses-edit-member.php" method="post">
        <h1>FORM EDIT BUKU</h1>
            <input type="hidden" name="id_member" value="<?php echo $id_member?>">
            <label for="judul">Nama</label>
            <input type="text" name="nama_member" value="<?php echo $nama?>">
            <table width=100%>
            <tr>
                <td><button type="reset">Reset</button></td>    
                <td><button class="notice" type="submit">Ubah</button></td>
            </tr>
            </table>
        </form>
        </div>
    </body>
</html>