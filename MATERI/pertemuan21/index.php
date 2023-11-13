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
    <style>
        .loader{
            width: 40px;
            position: absolute;
            top: 130px;
            left: 330px;
            z-index: -1;
            display: none;
        }

        @media print {
            /* p-hilang untuk menghilangkan ketika di print */
            .p-hilang{
                display: none;
            }
        }
    </style>
</head>
<body>
    
    <a href="logout.php" class="p-hilang">LOGOUT</a> | <a href="print.php" target="_blank">Print</a>

    <h1>Daftar Mahasiswa</h1>

    <a href="tambah.php" class="p-hilang">Tambah data mahasiswa</a>
    <br><br>

    <form action="" method="post" class="p-hilang">
        <input type="text" id="keyword" name="keyword" size="40" autofocus placeholder="Masukkan keyword pencarian.." autocomplete="off">
        <button type="submit" id="tombol-cari" name="cari">Cari!</button>

        <img src="img/loader.gif" alt="" class="loader">
    </form>
    <br>

    <div id="container">
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>No.</th>
                <th class="p-hilang">Aksi</th>
                <th>Gambar</th>
                <th>Nrp</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Jurusan</th>
            </tr>

            <?php $ctr=1; ?>
            <?php foreach($mahasiswa as $row) : ?>
            <tr>
                <td><?= $ctr; ?></td>
                <td class="p-hilang">
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
    </div>

    <!-- include jquery sebelum script kita -->
    <script src="js/jquery-3.7.1.min.js"></script>
    <script src="js/script.js"></script>
</body>
</html>