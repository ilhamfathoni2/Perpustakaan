<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="tampilan.css">
    <title>Login | DataBase</title>
</head>
<body class="login">
<header>
    <div class="logo">
        <a href=""><div>DBMS</div></a>
    </div>
    <div class="navbar">
    <div style="float:right;">
        <a class="btnnav" href="">LOGIN</a>
    </div>
    </div>
</header>
    <div class="menu-login" style="margin-top: 50px;">
        <h1>MENU LOGIN</h1>
        <form action="proses-login.php" method="post">
            <table>
                <tr>
                    <td><input type="text" name="username" placeholder="Username . . ."></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" placeholder="Password . . ."></td>
                </tr>
                <tr>
                    <td><input type="text" name="dbname" placeholder="Database Name. . ."></td>
                </tr>
                <tr><td><button type="submit" name="masuk">Login</button></td></tr>
            </table>
        </form>
    </div>
</body>
</html>