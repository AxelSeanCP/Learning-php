<?php 
$mahasiswa = [
    ["Axel Sean", "23201013", "Teknik Informatika", "axelseancp@gmail.com"],
    ["Leonard Albert", "23201014", "Teknik Informatika", "leonardalbertcp@gmail.com"],
    ["Meltryllis", "23201015", "Kelas Ballet", "meltlilith@gmail.com"]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Mahasiswa</title>
</head>
<body>
    
    <h1>Daftar Mahasiswa</h1>

    <!-- <ul>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <?php foreach($mhs as $m) : ?>
                <li><?php echo $m; ?></li>
            <?php endforeach; ?>
        <?php endforeach; ?>
    </ul> -->


    <ul>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <li> Nama : <?= $mhs[0] ?> </li>
            <li> NRP : <?= $mhs[1] ?> </li>
            <li> Jurusan : <?= $mhs[2] ?> </li>
            <li> Email : <?= $mhs[3] ?> </li>
            <br>
        <?php endforeach; ?>
    </ul>


</body>
</html>