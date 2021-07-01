<?php include("koneksi.php");
    $id_member = $_POST['id_member'];
    $id_buku = $_POST['id_buku'];
    $tgl_kembali = date("Y-m-d h:i:s");
    echo $id_member . $id_buku . $tgl_kembali;
    $sql = "UPDATE trans_pinjam SET tgl_kembali='$tgl_kembali' WHERE id_member='$id_member' AND id_buku='$id_buku'";
    if(mysqli_query($conn, $sql)){
        header("Location: list-transaksi.php");
    } else echo "Data gagal diperbarui" . mysqli_error($conn);
    
?>
