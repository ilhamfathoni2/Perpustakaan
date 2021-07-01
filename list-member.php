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
<div class="kolom w-30">
    <ul class="MenuLeft1">
        <h2 class="FiturP">FITUR</h2>
        <li><a class="MenuLeft" href="tambah-member.php">[+] tambah baru</a></li>
        <!-- <a href=""><li>MELEWATI DEADLINE PENGEMBALIAN</li></a>
        <a href=""><li>BELUM MENGEMBALIKAN BUKU</li></a>
        <a href=""><li>Fitur 3</li></a> -->
    </ul>
</div>
<div class="leb70">
    <div class="container" style="padding-top: 30px; padding-bottom: 50%;">
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