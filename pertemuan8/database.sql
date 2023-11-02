-- Masuk ke direktori mysql
D:
cd xampp
cd mysql
cd bin
mysql -u root -p
-- buat di powershell
.\mysql -u root -p --passwordnya kosong

-- 29/10/2023 - 20:25
create database phpdasar;
use phpdasar;

create table mahasiswa (
    id int primary key auto_increment,
    nama varchar(100),
    nrp varchar(10),
    email varchar(100),
    jurusan varchar(100),
    gambar varchar(100)
);

insert into mahasiswa value ('', 'Axel Sean', '23201013', 'axelseancp@gmail.com' ,'Teknik Informatika', 'pp axel.jpg');

insert into mahasiswa value ('', 'Meltryllis', '23201014', 'meltryllis@gmail.com', 'Tari Balet', 'melt pfp.jpg');

insert into mahasiswa value ('', 'Izuna Kuda', '23201015', 'izunakuda@gmail.com', 'Ilmu Ninjutsu', 'izuna chibi.jpeg');

insert into mahasiswa value ('', 'Silverwolf', '23201016', 'silverwolf@gmail.com', 'Teknik Informatika', 'silverwolf.jpg');

insert into mahasiswa value ('', 'Okita Souji', '23201017', 'okitachan@gmail.com' ,'Ilmu Pedang', 'okita souji.png');

insert into mahasiswa value ('', 'Ichika Nakamasa', '23201018', 'nakamasaichika@gmail.com', 'Ilmu Hukum', 'nakamasa ichika.png');

insert into mahasiswa value ('', 'Nagisa Kirifuji', '23201019', 'nagisahifumi@gmail.com', 'Ilmu Teh dan Herbal', 'nagisa kirifuji.png');

insert into mahasiswa value ('', 'Nilou', '23201020', 'nilou@gmail.com', 'Tari Daerah', 'nilou.png');

insert into mahasiswa value ('', 'Melusine', '23201021', 'melusine@gmail.com', 'Sejarah', 'melusine.jpg');

insert into mahasiswa value ('', 'Jeanne Alter', '23201022', 'jalter@gmail.com', 'Ilmu Hewan', 'jalter.png');

insert into mahasiswa value ('', 'Castoria', '23201033', 'castor@gmail.com', 'Ilmu Sihir', 'castoria.jpg');


-- 02/11/2023 - 17:53
create table user (
    id INT PRIMARY KEY auto_increment,
    username VARCHAR(50),
    password VARCHAR(255)
);






--tampilin data
select * from mahasiswa;

--delete database
drop database phpdasar;

--buka phpmyadmin
localhost/phpmyadmin