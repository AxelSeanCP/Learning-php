<?php
// Date
// Menampilkan tanggal dengan format tertentu
// echo date("l");
// echo date("d");
// echo date("M");
// echo date("m");
// echo date("l, d-M-Y")

// Time
// UNIX TimeStamp / EPOCH Time
// detik yang sudah berlalu sejak 1 januari 1970
// echo time();

// echo date("l", time()+60*60*24*100) //100 hari kedepan hari apa
// echo date("d M Y", time()-60*60*24*100) //100 hari kebelakang hari apa

// mktime
// membuat sendiri detik
// mktime(0,0,0,0,0,0)
// jam, menit, detik, bulan, tanggal, tahun
// $hari_axel_lahir = mktime(0,0,0,6,11,2003);
// echo date("l", $hari_axel_lahir);

// strtotime
// $hari_axel_lahir = strtotime("11 june 2003");
// echo date("l", $hari_axel_lahir);

// String
// strlen()
// strcmp()
// explode()
// htmlspecialchars()

// Utility
// var_dump()
// isset()
// empty()
// die()
// sleep()

?>