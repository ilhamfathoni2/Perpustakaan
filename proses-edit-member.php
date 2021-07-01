<?php

	include('koneksi.php');

    $id_member = $_POST['id_member'];
    $nama_member = $_POST['nama_member'];
    echo $id_member . $nama_member;

    $sql = "UPDATE tb_member SET nama_member=\"$nama_member\" WHERE id_member=\"$id_member\"";
    
    if(mysqli_query($conn,$sql)){
        echo "Data berhasil di rubah";
        header("Location: list-member.php");
    } else echo "Data gagal dirubah" . mysqli_error($conn);
?>