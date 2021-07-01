<?php include("koneksi.php");
    $tgl_lahir = $_POST['tgl_lahir'];
    $nama_member = strtoupper($_POST['nama_member']);
    $id_member = str_replace("-", "", "$tgl_lahir");
    $sql = "SELECT id_member FROM tb_member WHERE id_member LIKE '$id_member%' ORDER BY id_member DESC LIMIT 1";
    $res = mysqli_query($conn, $sql);
    $mem = mysqli_fetch_row($res);
    
    if(is_null($mem)){
        $angka = '00';
    } else {
        $angka = $mem[0];
        $angka = (int)substr($angka,8);
        $angka = str_pad(++$angka, 2, '0', STR_PAD_LEFT);
    }

    $id_member .= $angka;
    echo $id_member;

    $sql = "INSERT INTO tb_member(id_member, nama_member) VALUE (\"$id_member\" , \"$nama_member\")";
    if(mysqli_query($conn, $sql)){
        echo "data berhasil ditambahkan";
        header("Location: list-member.php");
    } else echo "data gagal ditambahkan<br>" . mysqli_error($conn);
    
?>