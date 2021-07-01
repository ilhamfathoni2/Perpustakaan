<?php include("koneksi.php");

    $judul_buku = $_POST['judul_buku'];
    $judul_buku = strtoupper($judul_buku);
    
    $id_buku = strtoupper($judul_buku[0].$judul_buku[1]) . "-";
    echo $id_buku;
    
    $sql = "SELECT id_buku FROM tb_buku WHERE id_buku LIKE '$id_buku%' ORDER BY id_buku DESC LIMIT 1";
    $res = mysqli_query($conn, $sql);
    $buku = mysqli_fetch_row($res);
    
    if(is_null($buku)){
        $angka = '000';
        echo 'masuk';
    } else {
        $angka = $buku[0];
        $angka = (int)substr($angka,3);
        $angka = str_pad(++$angka, 3, '0', STR_PAD_LEFT);
    }

    $id_buku .= $angka;
    echo $id_buku;
         
    $sql = "INSERT INTO tb_buku(id_buku, judul_buku) VALUE (\"$id_buku\" , \"$judul_buku\")";
    if(mysqli_query($conn, $sql)){
        echo "data berhasil ditambahkan";
        header("Location: list-buku.php");
    } else echo "data gagal ditambahkan<br>" . mysqli_error($conn);
    
?>