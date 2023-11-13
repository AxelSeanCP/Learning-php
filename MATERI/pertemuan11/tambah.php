<?php 
// koneksi ke dbms
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

require 'functions.php'; //ambil functions dari file functions.php

// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["submit"])){
    //ambil data dari tiap elemen dalam form
    // $nrp = $_POST["nrp"];
    // $nama = $_POST["nama"];
    // $email = $_POST["email"];
    // $jurusan = $_POST["jurusan"];
    // $gambar = $_POST["gambar"];

    // query insert data
    // $query = "INSERT INTO mahasiswa 
    //             VALUES
    //             ('','$nama','$nrp','$email','$jurusan','$gambar')";
    // mysqli_query($conn, $query);

    // cek apakah data berhasil di tambahkan atau tidak
    // var_dump(mysqli_affected_rows($conn)); //return -1 berarti gagal, return 1 berarti 1 baris berubah

    if (tambah($_POST) > 0){
        echo "
            <script>
                alert('Data Berhasil Ditambahkan');
                document.location.href = 'index.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Data Gagal Ditambahkan');
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
    

    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="nrp">NRP : </label>
                <input type="text" name="nrp" id="nrp" required>
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="text" name="email" id="email" required>
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>
            <li>
                <label for="gambar">Gambar : </label>
                <input type="text" name="gambar" id="gambar" required>
            </li>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>

</body>
</html>