<?php 
session_start();
require 'functions.php';

// cek cookie
if (isset($_COOKIE['lymrts']) && isset($_COOKIE["Xy#7!"])){
    $id = $_COOKIE['lymrts'];
    $key = $_COOKIE["Xy#7!"];

    // ambil username berdasarkan idnya
    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username di database
    // jika memang benar login dan bukan hacker yang duplikat cookie
    // jika hacker duplikat cookie maka program tidak jalan karena tidak ada user di database
    if ($key === hash('sha256',$row['username'])){
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}

if (isset($_POST["login"])){
    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result)) {
        // cek password
        $row = mysqli_fetch_assoc($result);
        // kalau benar maka diarahkan ke index.php
        if (password_verify($password, $row['password'])){
            // set session
            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_POST["remember"])){
                // buat cookie
                
                // setcookie(<'nama cookie'>, value, expires)
                setcookie('lymrts', $row['id'], time()+60); //cookie id 1 menit

                $username = hash('sha256', $row['username']); //ngehash string username biar ga ketauan
                setcookie('Xy#7!', $username, time()+60); //cookie username
            }

            header("Location: index.php");
            exit;
        }
    }

    // kalau salah
    $error = true;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <style>
        .error{
            color: red;
            font-size: 1rem;
            font-weight: 900;
            text-transform: uppercase;
        }

        a{
            color: grey;
            text-decoration: underline;
            font-style: italic;
        }

        ul{
            list-style-type: none;
        }
        li{
            margin: 10px 0px;
        }
    </style>
</head>
<body>

    <h1>Halaman Login</h1>

    <?php if( isset($error) ) : //kalau variable error di bikin?>
        <div class="error">Username atau Password salah</div>
    <?php endif; ?>

    <form action="" method="post">

        <ul>
            <li>
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
            </li>
            <li>
                <input type="checkbox" name="remember" id="remember">
                <label for="remember">Remember me</label>
            </li>
            <li>
                <button type="submit" name="login">LOGIN</button>
            </li>
        </ul>

    </form>

    <a href="registrasi.php">tidak memiliki akun? daftar dulu disini</a>


</body>
</html>