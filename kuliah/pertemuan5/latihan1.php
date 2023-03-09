<?php 
// array
//membuat array

$hari = array ('senin', 'selasa','rabu');
$bulan = ['januari', 'feburuari','maret'];
$myArray = ['Syahbrina',18,false];
$binatang = ['🦁', '🐮', '🐷', '🦄','🐼'];

// mencetak array
// mencetak 1 elemen di dalam array menggunakan echo
echo $hari[2];
echo "<hr>";

// mencetak semua isi array
// var_dump, print_r
var_dump($hari);
echo "<br>";
print_r($bulan);
echo "<br>";
var_dump($myArray);
echo "<br>";
print_r($binatang);
echo "<hr>";

//manipulasi array
//menambahkan elemen menggunakan index
$hari[3]= 'kamis';
echo "<br>";

// menambahkan elemen di akhir array menggunakan []
$hari[] = "jum'at";
$hari[] = 'Sabtu';
print_r ($hari);
echo "<hr>";

//menambah elemen di akhir array menggunakan array_push
array_push($bulan, 'april','may',);
print_r($bulan);
echo "<br>";

//menamabah elemen di awal array menggunakan array_unshift
array_unshift($binatang, '🐈');
print_r ($binatang);
echo "<hr>";

//menghapus elemen di belakang array dengan array_pop
array_pop($hari);
print_r($hari);
echo "<hr>";

//menghapus elemen di array  dengan array_shift
array_shift ($bulan);
print_r ($bulan);
?>