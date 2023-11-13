<?php
session_start();
require 'functions.php';

if(isset($_POST["register"])){

    if(!isset($_SESSION["user"])){
        $_SESSION["user"] = [];
    }

    if(cekRegister($_POST)){
        alert("Berhasil registrasi!");
    }else{
        alert("gagal registrasi!");
    }

}else if(isset($_POST["login"])){

    header("Location: login.php");
    exit;
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Register</h1>

    <form action="" method="post">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div class="form-group">
            <label for="fullname">Fullname</label>
            <input type="text" name="fullname" id="fullname">
        </div>
        <div class="form-group">
            <label for="insname">Institute Name</label>
            <input type="text" name="insname" id="insname">
        </div>
        <div class="form-group">
            <label for="country">Country / Region</label>
            <select name="country" id="country">
                <option value="Indonesia">Indonesia</option>
                <option value="United States">United States</option>
                <option value="China">China</option>
            </select>
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>
        <div class="form-group">
            <label for="cpassword">Confirm Password</label>
            <input type="password" name="cpassword" id="cpassword">
        </div>
        <div class="form-group">
            <button type="submit" name="register">Register</button>
            <button type="submit" name="login">Login</button>
        </div>
    </form>
</body>
</html>