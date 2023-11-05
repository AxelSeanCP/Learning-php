<?php 
require '../functions.php';

$keyword = $_GET["keyword"]; //dapet dari ajax

$query = "SELECT * FROM mahasiswa 
    WHERE
    nama LIKE '%$keyword%' OR
    nrp LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%' OR
    email LIKE '%$keyword%'
";

$mahasiswa = query($query);
?>
<?php if(!empty($mahasiswa)) : ?>
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
<?php else : ?>
<h2 style="color: red;">No Search Result</h2>
<?php endif; ?>