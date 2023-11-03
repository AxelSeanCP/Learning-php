<?php 
session_start(); //jalankan dulu sebelum semuanya

// kalau sudah login arahkan ke index
if (isset($_SESSION["login"])){
    header("Location: index.php");
    exit;
}

require 'functions.php';

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
                <button type="submit" name="login">LOGIN</button>
            </li>
        </ul>

    </form>

    <a href="registrasi.php">tidak memiliki akun? daftar dulu disini</a>


</body>
</html>