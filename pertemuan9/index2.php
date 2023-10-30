<?php 
// koneksi ke database
// parameternya : nama host, username database admin, password database admin, nama databasenya
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

//ambil data dari tabel mahasiswa
$result = mysqli_query($conn, "SELECT * FROM mahasiswa");

//buat check apakah query bener
if ( !$result ) {
    echo mysqli_error($conn);
}

// ambil data (fetch) mahasiswa dari object result
// mysqli_fetch_row() //return array numerik
// mysqli_fetch_assoc() //return array associative (key string)
// mysqli_fetch_array() //return array numerik dan associative tapi arraynya ada 2 (datanya double)
// mysqli_fetch_object() //return object = $mhs->nama

// selama masih ada data, ambil terus satu persatu
// while ($mhs = mysqli_fetch_assoc($result)){
//     var_dump($mhs);
// }


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Admin</title>
</head>
<body>
    
    <h1>Daftar Mahasiswa</h1>

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
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
        <tr>
            <td><?= $ctr; ?></td>
            <td>
                <a href="">ubah</a> |
                <a href="">hapus</a>    
            </td>
            <td><img src="img/<?php echo $row["gambar"]; ?>" alt="" width="50"></td>
            <td><?= $row["nrp"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td><?= $row["email"]; ?></td>
            <td><?= $row["jurusan"]; ?></td>
        </tr>
        <?php $ctr++; ?>
        <?php endwhile; ?>
    </table>

</body>
</html>