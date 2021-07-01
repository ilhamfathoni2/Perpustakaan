<?php
include("koneksi.php");
$id_mem = $_POST['id_member'];
$id_buku = $_POST['id_buku'];

$tgl_pinjam = date("Y-m-d");
$tgl_batas = date("Y-m-d", strtotime($tgl_pinjam. '+ 7 days'));
// echo "\"$id_buku\" ,\"$id_mem\",\"$tgl_pinjam\",\"$tgl_batas\"";

$sql = "INSERT INTO trans_pinjam(id_buku, id_member, tgl_batas) 
        VALUES (\"$id_buku\" ,\"$id_mem\",\"$tgl_batas\")";
// echo $sql;

if(mysqli_query($conn, $sql)){
	header("Location: pinjam-buku.php");
    // header("Location: trans_pinjam.php");
} else echo mysqli_error($conn);


?>