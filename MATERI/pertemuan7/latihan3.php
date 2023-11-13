<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Post</title>
</head>
<body>
    <?php if ( isset($_POST["submit"]) ) : //apakah tombol submit sudah dipencet atau belum ?>
        <h1>Mobil favorit anda adalah: <?= $_POST["merk"]; ?></h1>
    <?php endif; ?>

    <!-- menggunakan metode post -->
    <!-- jika action kosong maka data dikirim ke halaman ini, jika method kosong maka dianggap GET -->
    <!-- action="latihan4.php" -->
    <form action="" method="post"> 
        Masukkan Merk: 
        <input type="text" name="merk">
        <br>
        <button type="submit" name="submit">Kirim</button>
    </form>


</body>
</html>