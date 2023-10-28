<?php 
// empty()
// mengecek apakah sebuah variabel kosong
// return true jika sebuah variabel kosong / berisi 0 / tidak didefinisikan
$x = 20;
if (empty($x)){
    echo "variabel X tidak didefinisikan / bernilai 0";
}else{
    echo "variabel X ada dan tidak bernilai 0";
}
echo "<br>";
echo "isi X : ".$x;
?>