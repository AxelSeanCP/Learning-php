<?php 
session_start();

// kalau belum login maka tidak bisa masuk halaman ini
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}


require 'functions.php';
$id = $_GET["id"];

if (hapus($id) > 0) { //kalau berhasil
    echo "
        <script>
            alert('Data Berhasil Dihapus');
            document.location.href = 'index.php';
        </script>
    ";
}else{
    echo "
        <script>
            alert('Data Gagal Dihapus');
            document.location.href = 'index.php';
        </script>
    ";
}
?>