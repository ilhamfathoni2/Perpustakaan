<?php include("koneksi.php");?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="tampilan.css">
        <title>List Tabel | Perpustakaan</title>
        <style>
            .container table, td, tr{
                border: none;
            }
        </style>
    </head>
    <body>
        <header>
            <div class="logo">
                <a href=""><div>DBMS</div></a>
            </div>
            <div class="navbar">
            <div style="float:right;">
                <a class="btnnav" href="index.php">LOGOUT</a>
            </div>
            </div>
        </header><br><br><br>
        <h1>Welcome to Perpustakaan Reposiory !</h1>
            <h1>Fitur</h1>
                <div class="container-home">
                <a href="list-member.php">MEMBER</a>
                <a href="list-buku.php">BUKU</a>
                <a href="list-transaksi.php">TRANSAKSI</a>
                </div>
            </div>


    </body>
</html>