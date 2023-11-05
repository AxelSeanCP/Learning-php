// ambil elemen yang dibutuhkan
const keyword = document.getElementById("keyword");
const tombolCari = document.getElementById("tombol-cari");
const container = document.getElementById("container");

// tambahkan event ketika keyword (input) ditulis, pakai keyup biar ajax tidak terlambat
keyword.addEventListener('keyup', () => {

    // buat object ajax
    let ajax = new XMLHttpRequest();

    // cek kesiapan ajax
    ajax.onreadystatechange = () => {
        if (ajax.readyState == 4 && ajax.status == 200) {
            // ketika siap maka ubah isi container sesuai ajax
            container.innerHTML = ajax.responseText; // response text didapat dari file di ajax.open (mahasiswa.php)
        }
    };

    // eksekusi ajax
    // params = request method, source, async or not
    console.log(keyword.value);
    ajax.open('GET', 'ajax/mahasiswa.php?keyword=' + keyword.value, true);
    ajax.send();

});