<?php
session_start();
require 'functions.php';

if(isset($_POST["login"])){

    if(cekLogin($_POST)){
        $_SESSION["login"] = true;
        header("Location: index.php");
        exit;
    }else {
        alert("Gagal Login!");
    }

}else if(isset($_POST["register"])){

    header("Location: register.php");
    exit;
    
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Login</h1>

    <form action="" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="form-group">
            <button type="submit" name="login">Login</button>
            <button type="submit" name="register">Register</button>
        </div>
    </form>
</body>
</html>