<?php 
// cek apakah tidak ada data di $_GET
if ( !isset($_GET["merk"]) 
    || !isset($_GET["model"])
    || !isset($_GET["tahun"])
    || !isset($_GET["warna"])
    || !isset($_GET["gambar"])) {
    //redirect
    header("Location: latihan1.php");
    exit; //digunakan untuk stop eksekusi program yang ada dibawah
}
// jika coba paksa masuk dengan ganti url maka akan di redirect ke latihan1.php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Mobil</title>
</head>
<body>
    

    <ul>
        <li><img src="carimg/<?= $_GET["gambar"] ?>" alt=""></li>
        <li><?= $_GET["merk"] ?></li>
        <li><?= $_GET["model"] ?></li>
        <li><?= $_GET["tahun"] ?></li>
        <li><?= $_GET["warna"] ?></li>
    </ul>

    <a href="latihan1.php">Kembali ke daftar mobil</a>

</body>
</html>