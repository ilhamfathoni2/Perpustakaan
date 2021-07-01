<?php
if(isset($_POST["masuk"])){
    $file = fopen("koneksi.php", "w");
    $username = $_POST["username"];
    $password = $_POST["password"];
    $dbname = $_POST["dbname"];
    $servername = "localhost";
$txt = "<?php   
    \$servername = \"$servername\";
    \$username = \"$username\";
    \$password = \"$password\";
    \$dbname = \"$dbname\";

    \$conn = mysqli_connect(\$servername, \$username, \$password, \$dbname);
?>";
    fwrite($file,$txt);
    fclose($file);
}
include("koneksi.php");
if(mysqli_connect_errno()){
    die("koneksi gagal") . mysqli_connect_error();
    
} else {
    header("Location: perpustakaan.php");
}
?>