<?php
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
    <title>List Mobil</title>
</head>
<body>
    
    <h1>List Mobil</h1>

    <ul>
        <?php foreach ($list_mobil as $mobil) : ?>
            <li>
                <img src="carimg/<?= $mobil["gambar"]; ?>" alt="">
            </li>
            <li> Merk : <?= $mobil["merk"] ?> </li>
            <li> Model : <?= $mobil["model"] ?> </li>
            <li> Tahun : <?= $mobil["tahun"] ?> </li>
            <li> Warna : <?= $mobil["warna"] ?> </li>
            <br>
        <?php endforeach; ?>
    </ul>

</body>
</html>