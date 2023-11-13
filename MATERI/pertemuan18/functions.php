<?php 
$conn = mysqli_connect("localhost", "root", "", "phpdasar");

function query($query){
    global $conn; //conn yang sama di atas
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row; //append di akhir array
    }
    return $rows;
}

function pagination($jumlahDataPerHalaman){
    // konfigurasi
    // jumlah halaman = total data / data per halaman
    // round()-pembulatan desimal terdekat, floor()-pembulatan kebawah, ceil()-pembulatan keatas
    $jumlahData = count(query("SELECT * FROM mahasiswa"));
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerHalaman);
    // kalau belum pindah halaman maka default 1
    $halamanAktif = ( isset($_GET["halaman"]) ) ? $_GET["halaman"] : 1;
    // halaman 2, awal = 5
    // halaman 3, awal = 10
    // rumus = 5 * 2 - 5
    $awalData = ( $jumlahDataPerHalaman * $halamanAktif ) - $jumlahDataPerHalaman;

    // limit 1,2 = menampilkan mulai dari index 1 sebanyak 2 data
    $mahasiswa = query("SELECT * FROM mahasiswa LIMIT $awalData, $jumlahDataPerHalaman");

    // return array assoc
    return array('mahasiswa' => $mahasiswa, 'jumlahHalaman' => $jumlahHalaman, 'halamanAktif' => $halamanAktif);
}

function tambah($data){
    global $conn;

    // htmlspecialchars untuk mengubah kalimat yang ada tag html jadi kalimat biasa (mencegah user usil)
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    
    //upload gambar
    $gambar = upload();
    if (!$gambar) {
        return false;
    }

    $query = "INSERT INTO mahasiswa 
                VALUES
                ('','$nama','$nrp','$email','$jurusan','$gambar')";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function upload(){
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4){
        echo "<script>
            alert('Pilih file yang mau diupload')
        </script>";
        return false;
    }

    // macam macam return dari $_FILES["gambar"]["error"]
    // 0 = ga ada error, file terupload lancar
    // 1 = file upload melebihi upload_max_filesize direktif di php.ini
    // 2 = file upload melebihi MAX_FILE_SIZE di html form
    // 3 = file terupload sebagian
    // 4 = file tidak terupload
    // 6 = folder temp hilang
    // 7 = file gagal di tulis di disk
    // 8 = php extension mencegah teruploadnya file


    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg','jpeg','png'];
    $ekstensiGambar = explode('.', $namaFile); //axel.jpg ==> ['axel','jpg']
    $ekstensiGambar = strtolower(end($ekstensiGambar)); //ambil array paling akhir lalu string di lowecase

    if( !in_array($ekstensiGambar, $ekstensiGambarValid) ){ //jika ekstensi file salah
        echo "<script>
            alert('Yang anda upload bukanlah gambar')
        </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    // ukuran dalam byte, 1000000 = 1mb
    if ($ukuranFile > 10000000) {
        echo "<script>
            alert('File gambar terlalu besar')
        </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama file baru biar ga tumpuk di folder
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    // pindah file yang diupload ke folder yang dipilih dan ganti nama filenya
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    return $namaFileBaru;

}

function hapus($id){
    global $conn;

    $file = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM mahasiswa WHERE id = $id"));
    unlink("img/{$file['gambar']}");

    mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}

function ubah($data){
    global $conn;

    $id = $data["id"];
    $nrp = htmlspecialchars($data["nrp"]);
    $nama = htmlspecialchars($data["nama"]);
    $email = htmlspecialchars($data["email"]);
    $jurusan = htmlspecialchars($data["jurusan"]);
    $gambarLama = htmlspecialchars($data["gambarLama"]);

    // cek apakah user pilih gambar baru atau tidak
    if($_FILES['gambar']['error'] === 4){
        // kalau user tidak pilih gambar baru
        $gambar = $gambarLama;
    }else {
        // kalau user pilih gambar baru
        $gambar = upload();
    }

    $query = "UPDATE mahasiswa SET
                nrp = '$nrp', 
                nama = '$nama', 
                email = '$email', 
                jurusan = '$jurusan', 
                gambar = '$gambar'
            where id = $id;
    ";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    global $conn;
    $query = "SELECT * FROM mahasiswa 
    WHERE
    nama LIKE '%$keyword%' OR
    nrp LIKE '%$keyword%' OR
    jurusan LIKE '%$keyword%' OR
    email LIKE '%$keyword%'";
    
    return query($query);
}

function registrasi($data){
    global $conn;

    // username dibuat semua huruf kecil dan hilangkan karakter backslash
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    // kalau ada username yang ada di database
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('username sudah dipakai');
        </script>";
        return false;
    }

    // cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
            alert('konfirmasi password tidak sesuai');
        </script>";
        return false;
    }

    // enkripsi passwordnya
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES('', '$username', '$password')");
    return mysqli_affected_rows($conn);

}


?>