<?php
	
	include("koneksi.php");

    if(isset($_POST['ubah'])){
        $id_buku = $_POST['id_buku'];
        $judul_baru = $_POST['judul_baru'];
    	$judul_buku = strtoupper($judul_baru);
    
    	$id_buku1 = strtoupper($judul_buku[0].$judul_buku[1]) . "-";
    
    	$sql = "SELECT id_buku FROM tb_buku WHERE id_buku LIKE '$id_buku1%' ORDER BY id_buku DESC LIMIT 1";
    	$res = mysqli_query($conn, $sql);
    	$buku = mysqli_fetch_row($res);
    
    	// var_dump($buku);
    	$iii = strtoupper($id_buku);
    	$jjj = strtoupper($iii[0].$iii[1])."-";
    	// var_dump($jjj);
    	if(is_null($buku)){
        $angka = '000';
    	}
    	elseif ($id_buku1==$jjj) {
    	$angka = $iii[3].$iii[4].$iii[5];
    	// var_dump($angka);
    	} 
    	else {
        $angka = $buku[0];
        $angka = (int)substr($angka,3);
        $angka = str_pad(++$angka, 3, '0', STR_PAD_LEFT);
    	}

    	$id_buku1 .= $angka;
    	// var_dump($id_buku1);
    	// var_dump($id_buku);

        $sql1 = "UPDATE tb_buku SET id_buku='$id_buku1', judul_buku='$judul_baru' WHERE id_buku='$id_buku'";
        $result1 = mysqli_query($conn, $sql1);

        header("Location: list-buku.php");
    }   else echo "Edit Gagal". mysqli_error($conn);
?>
