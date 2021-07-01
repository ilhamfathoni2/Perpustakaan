<?php include('koneksi.php')?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="tampilan.css">
<title>List-Member</title>
</head>
<body>
<?php include("header-perpustakaan.html")?>
<div class="row">
<div class="MenuLeft1">
    <div class="menu-action">
    <h2 class="FiturP">FORM TAMBAH MEMBER BARU</h2>
    <form action="proses-tambah-member.php" method="POST">
        <label class="FiturP" for="nama-member">Nama Member</label>
        <input type="text" name="nama_member" placeholder="masukan nama . ."></td>
        <label class="FiturP" for="id-member">Tanggal tgl_lahir</label>
        <input type="date" name="tgl_lahir">
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
    <h1>List Member</h1>
    <table>
        <tr>
            <th>ID MEMBER</th>
            <th>NAMA MEMBER</th>
            <th>ACTION</th>
        </tr>
        <?php
        $sql = "SELECT * FROM tb_member";
        $result = mysqli_query($conn, $sql);

        while($member = mysqli_fetch_array($result)){
            echo "<tr>";
            echo "<td align='center'>" . $member['id_member'] . "</td>";
            echo "<td>" . $member['nama_member'] . "</td>";
            echo "<td> <a href='form-edit-member.php?id_member=".$member['id_member']."'>Edit</a> | <a href='hapus-member.php?id_member=".$member['id_member']."'>Hapus</a></td>"; 
            echo "</tr>";
        }
        ?>
    </table>
    </div>
</div>
</div>
</body>
</html>