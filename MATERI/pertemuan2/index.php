<?php
// Pertemuan 2 - PHP Dasar
// Sintaks PHP

// Standar Output
// echo, print
// print_r (cetak isi array)
// var_dump (lihat isi variable)

// echo "Axel Sean Cahyono Putra";
// echo 123;
// echo true;
// echo false;

// Penulisan sintaks php
// 1. PHP di dalam HTML
// 2. HTML di dalam PHP

// Variabel dan Tipe Data
// Variabel
// Tidak boleh diawali angka tapi boleh ada angka
// $nama = "Axel";

// echo "Halo, nama saya $nama"; //string interpolation


// Operator
// aritmatika
// + - * / %
// $x = 10;
// $y = 20;
// echo $x * $y;

// penggabung string / concat
// .
// $nama_depan = "Axel";
// $nama_belakang = "Sean";
// echo $nama_depan . " " . $nama_belakang;

// assignment
// = += *= %= -= .= /=
// $x = 10;
// $x += 11;
// $nama = "Axel";
// $nama .= " ";
// $nama .= "Sean";
// echo $nama;

// perbandingan
// <, >, >=, <=, ==, !=
// var_dump(1 < 5); //true
// var_dump(1 == "1"); //true karena tidak cek tipe data hanya nilainya


// identitas
// ===, !==
// var_dump(1 === "1");

// Logika
// &&, ||, !
$x = 30;
var_dump($x < 20 && $x % 2 == 0); //false
var_dump($x < 20 || $x % 2 == 0); //false

?>
<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Belajar PHP</title>
</head>
<body>
    <h1>Halo, Selamat Datang <?php //echo $nama; ?> </h1>
</body>
</html> -->