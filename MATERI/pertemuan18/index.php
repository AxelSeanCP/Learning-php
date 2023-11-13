<?php 
session_start();

// kalau belum login maka tidak bisa masuk halaman ini
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'functions.php';

// pagination
$dataPagination = pagination(5);
$mahasiswa = $dataPagination["mahasiswa"];
$jumlahHalaman = $dataPagination["jumlahHalaman"];
$halamanAktif = $dataPagination["halamanAktif"]; //return string

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
    <style>
        .page{
            display: inline-block;
            font-size: 1.6rem;
            border: 1px solid black;
            text-decoration: none;
            text-align: center;
            width: 40px;
            height: 40px;
            line-height: 40px;
            margin-right: 5px;
            color: black;
        }

        a:hover{
            background-color: yellow;
        }

        .current{
            font-weight: bold;
            background-color: yellow;
            color: navy;
        }
    </style>
</head>
<body>
    
    <a href="logout.php">LOGOUT</a>

    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php">Tambah data mahasiswa</a>
    <br><br>

    <!-- cari -->
    <form action="" method="post">
        <input type="text" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off">
        <button type="submit" name="cari">Cari!</button>
    </form>
    <br>

    <!-- navigasi -->
    <?php if($halamanAktif > 1) : ?>
        <a href="?halaman=<?= $halamanAktif-1 ?>" class="page">&lt;</a>
    <?php endif; ?>

    <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if($i == $halamanAktif) : ?>
            <a href="?halaman=<?= $i; ?>" class="current page" > <?= $i ?> </a>
        <?php else : ?>
            <a href="?halaman=<?= $i; ?>" class="page" > <?= $i ?> </a>
        <?php endif; ?>
    <?php endfor; ?>
    
    <?php if($halamanAktif < $jumlahHalaman) : ?>
        <a href="?halaman=<?= $halamanAktif+1 ?>" class="page">&gt;</a>
    <?php endif; ?>
    <!-- end navigasi -->

    <br> <br>
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
    <br>

    <!-- navigasi -->
    <?php if($halamanAktif > 1) : ?>
        <a href="?halaman=<?= $halamanAktif-1 ?>" class="page">&laquo;;</a>
    <?php endif; ?>

    <?php for($i = 1; $i <= $jumlahHalaman; $i++) : ?>
        <?php if($i == $halamanAktif) : ?>
            <a href="?halaman=<?= $i; ?>" class="current page" > <?= $i ?> </a>
        <?php else : ?>
            <a href="?halaman=<?= $i; ?>" class="page" > <?= $i ?> </a>
        <?php endif; ?>
    <?php endfor; ?>
    
    <?php if($halamanAktif < $jumlahHalaman) : ?>
        <a href="?halaman=<?= $halamanAktif+1 ?>" class="page">&raquo;;</a>
    <?php endif; ?>
    <!-- end navigasi -->
</body>
</html>