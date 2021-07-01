<?php include('koneksi.php');
    $id_member = $_GET['id_member'];
    //echo $id_member;
    $sql = "DELETE FROM tb_member WHERE id_member=\"$id_member\"";
    if(mysqli_query($conn,$sql)){
        header("Location: list-member.php");
    } else echo "Data gagal dirubah" . mysqli_error($conn);

    
?>