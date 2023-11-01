<?php 
// koneksi ke dbms
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

require 'functions.php'; //ambil functions dari file functions.php

// ambil data di URL
$id = $_GET["id"];
// query data mahasiswa berdasarkan idnya
$mhs = query("SELECT * FROM mahasiswa where id = $id")[0]; //[0] karena query return array dalam array, jadi akses dulu array luarnya

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])){

    // cek apakah data berhasil diubah atau tidak

    if (ubah($_POST) > 0){
        echo "
            <script>
                alert('Data Berhasil Diubah');
                document.location.href = 'index.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Gagal Diubah');
                document.location.href = 'index.php';
            </script>
        ";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
</head>
<body>
    

    <h1>Ubah Data Mahasiswa</h1>

    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $mhs["id"]; ?>">
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required value="<?= $mhs["nama"]; ?>">
            </li>
            <li>
                <label for="nrp">NRP : </label>
                <input type="text" name="nrp" id="nrp" required value="<?= $mhs["nrp"]; ?>">
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" required value="<?= $mhs["email"]; ?>">
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" required value="<?= $mhs["jurusan"]; ?>">
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="text" name="gambar" id="gambar" required value="<?= $mhs["gambar"]; ?>">
            </li>
            <li>
                <button type="submit" name="submit">Ubah Data</button>
            </li>
        </ul>
    </form>

</body>
</html>