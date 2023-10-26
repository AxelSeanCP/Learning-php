<?php
// $mahasiswa = [
//     ["Axel Sean", "23201013", "Teknik Informatika", "axelseancp@gmail.com"],
//     ["Leonard Albert", "23201014", "Teknik Informatika", "leonardalbertcp@gmail.com"],
//     ["Meltryllis", "23201015", "Kelas Ballet", "meltlilith@gmail.com"]
// ];

// Array Associative
// definisinya sama seperti array numerik kecuali
// keynya adalah string yang kita buat sendiri
$mahasiswa = [
    [
        "nama"=> "Axel Sean",
        "nrp"=> "23201013",
        "email"=> "axelseancp@gmail.com",
        "jurusan"=> "Teknik Informatika",
        "gambar"=> "pp axel.jpg" //gambarnya di resize terlebih dahulu 100px * 100px
    ],
    [
        "nama"=> "Meltryllis",
        "nrp"=> "221116938",
        "email"=> "meltlilith@gmail.com",
        "jurusan"=> "Kelas Ballet",
        "gambar"=> "melt pfp.jpg" //gambarnya di resize terlebih dahulu 100px * 100px
        //"tugas"=> [90,80,100]
    ]
];

// echo $mahasiswa[1]["nama"];
// echo $mahasiswa[1]["tugas"][2];

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

    <ul>
        <?php foreach ($mahasiswa as $mhs) : ?>
            <li>
                <img src="img/<?= $mhs["gambar"]; ?>" alt="">
            </li>
            <li> Nama : <?= $mhs["nama"] ?> </li>
            <li> NRP : <?= $mhs["nrp"] ?> </li>
            <li> Jurusan : <?= $mhs["jurusan"] ?> </li>
            <li> Email : <?= $mhs["email"] ?> </li>
            <br>
        <?php endforeach; ?>
    </ul>
    <!-- ketuker nulis gamasalah asal key-nya bener -->

</body>
</html>