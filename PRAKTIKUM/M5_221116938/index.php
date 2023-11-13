<?php 
session_start();

if(!isset($_SESSION["login"])){
    header("Location: login.php");
    exit;
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Paper Web</title>
</head>
<body>

    <h1>Welcome, <?php echo $_SESSION["target"]["fullname"] ?>!</h1>

    
</body>
</html>