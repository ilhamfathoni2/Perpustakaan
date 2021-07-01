<?php include("koneksi.php");
    $id_buku = $_GET['id_buku'];
    // echo $id_buku;

    $sql = "DELETE FROM tb_buku WHERE id_buku='$id_buku'";
    if(mysqli_query($conn, $sql)){
        header("Location: list-buku.php");
    } else echo "Data gagal dihapus" . mysqli_error($conn);
    
?>
