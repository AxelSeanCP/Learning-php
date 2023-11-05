<?php 
session_start();

// kalau belum login maka tidak bisa masuk halaman ini
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';
$mahasiswa = query("SELECT * FROM mahasiswa");

//tombol cari di klik
if(isset($_POST["cari"])){
    $mahasiswa = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    
    <a href="logout.php">LOGOUT</a>

    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah data mahasiswa</a>
    <br><br>

    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    </form>

    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <th>No.</th>
            <th>Aksi</th>
            <th>Gambar</th>
            <th>Nrp</th>
            <th>nama</th>
            <th>email</th>
            <th>jurusan</th>
        </tr>

        <?php $ctr=1; ?>
        <?php foreach($mahasiswa as $row) : ?>
        <tr>
            <td><?= $ctr; ?></td>
            <td>
                <a href="ubah.php?id=<?= $row["id"]; ?>">ubah</a> |
                <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('yakin?')">hapus</a>    
            </td>
            <td><img src="img/<?php echo $row["gambar"]; ?>" alt="" width="50"></td>
            <td><?= $row["nrp"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
        </tr>
        <?php $ctr++; ?>
        <?php endforeach; ?>
    </table>

</body>
</html>