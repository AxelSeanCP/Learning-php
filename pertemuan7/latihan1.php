<?php 
// variabel scope
// $x = 10;
// function tampilX(){
//     // $x = 20; //variabel x di function beda dengan x di luar
//     global $x;
//     echo $x; 
// }

// tampilX();


// SUPERGLOBAS
// variabel global milik php
// merupakan array associative
// $_GET, $_POST
// $_GET["Nama"] = "Axel Sean";
// $_GET["Nrp"] = "232111003";

$list_mobil = [
    [// Ford
        "merk"=> "Ford",
        "model"=> "Mustang",
        "tahun"=> "2018",
        "warna"=> "Yellow",
        "gambar"=> "ford-mustang.jpg"
    ],
    [// BMW
        "merk"=> "BMW",
        "model"=> "M3 GTR",
        "tahun"=> "2005",
        "warna"=> "White and Blue Stripes",
        "gambar"=> "bmw-m3-gtr.jpg"
    ],
    [// Audi
        "merk"=> "Audi",
        "model"=> "R8",
        "tahun"=> "2020",
        "warna"=> "Black",
        "gambar"=> "audi-r8.jpg"
    ],
    [// Ferrari
        "merk"=> "Ferrari",
        "model"=> "SF90 Stradale",
        "tahun"=> "2013",
        "warna"=> "Red",
        "gambar"=> "Ferrari-SF90-Stradale.jpg"
    ],
    [// Mitsubishi
        "merk"=> "Mitsubishi",
        "model"=> "Lancer Evo 8",
        "tahun"=> "2012",
        "warna"=> "White",
        "gambar"=> "mitsubishi-lancer-evo.jpg"
    ],
    [// Nissan
        "merk"=> "Nissan",
        "model"=> "R34 Skyline",
        "tahun"=> "2002",
        "warna"=> "Blue",
        "gambar"=> "r34-skyline.jpg"
    ],
    [// Toyota
        "merk"=> "Toyota",
        "model"=> "Supra MK4",
        "tahun"=> "2004",
        "warna"=> "black",
        "gambar"=> "toyota-supra.jpg"
    ],
    [// Volkswagen
        "merk"=> "Volkswagen",
        "model"=> "Golf GTI",
        "tahun"=> "2006",
        "warna"=> "White",
        "gambar"=> "volkswagen-golf-gti.jpg"
    ],
    [// Lamborghini
        "merk"=> "Lamborghini",
        "model"=> "Aventador",
        "tahun"=> "2021",
        "warna"=> "Gold",
        "gambar"=> "lamborghini-aventador.jpg"
    ],
    [// Aston Martin
        "merk"=> "Aston Martin",
        "model"=> "DB12",
        "tahun"=> "2023",
        "warna"=> "Emerald",
        "gambar"=> "aston-martin-db12.jpg"
    ]
];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GET</title>
</head>
<body>
    
    <h1>List Mobil</h1>

    <ul>
        <?php foreach ($list_mobil as $mobil) : ?>
            <li>
                <a href="latihan2.php?merk=<?= $mobil["merk"] ?>
                &model=<?= $mobil["model"] ?>
                &tahun=<?= $mobil["tahun"] ?>
                &warna=<?= $mobil["warna"] ?>
                $gambar=<?= $mobil["gambar"] ?>">
                    <?= $mobil["merk"]; ?>
                </a>
                <!-- kirim data menggunakan "?" lalu pisahkan menggunakan "=" melalui href untuk diambil menggunakan $_GET di halaman selanjutnya -->
                <!-- jika data lebih dari 1 maka gunakan "&" di akhir  -->
            </li>
        <?php endforeach; ?>
    </ul>

</body>
</html>