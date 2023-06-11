<?php 
$mahasiswa = [

[
    'foto'=> 'syahbrina.jpeg',
    'nama' =>'Syahbrina Dinova', 
    'nrp' =>'223040074',
    'jurusan'=> 'Teknik Informatika',
    'email' => 'Syahbrina.223040074@mail.unpas.ac.id',
], 

[
    'foto'=> 'syerly.jpeg',
    'nama' =>'Syerly Arianti', 
    'nrp' =>'223040100',
    'jurusan'=> 'Teknik Informatika',
    'email' => 'Syerly.223040100@mail.unpas.ac.id',
],

[
    'foto'=> 'ichka.jpeg',
    'nama' =>'Ichka Sabila', 
    'nrp' =>'223040144',
    'jurusan'=> 'Teknik Informatika',
    'email' => 'Ichka.223040144@mail.unpas.ac.id',
],

[
    'foto'=> 'dena.jpeg',
    'nama' =>'Dena Astia', 
    'nrp' =>'223040116',
    'jurusan'=> 'Teknik Informatika',
    'email' => 'Dena.223040116@mail.unpas.ac.id',
],

[
    'foto'=> 'melinda.jpeg',
    'nama' =>'Melinda Sulaeman', 
    'nrp' =>'223040091',
    'jurusan'=> 'Teknik Informatika',
    'email' => 'Melinda.223040134@mail.unpas.ac.id',
],
[
    'foto'=> 'fadhilla.jpeg',
    'nama' =>'Fadhilla Nur ', 
    'nrp' =>'223040082',
    'jurusan'=> 'Teknik Informatika',
    'email' => 'Fadhilla.223040082@mail.unpas.ac.id',
],
[
    'foto'=> 'Jayan.jpeg',
    'nama' =>'Jayan Rezki Perdana', 
    'nrp' =>'223040134',
    'jurusan'=> 'Teknik Informatika',
    'email' => 'Jayan.223040134@mail.unpas.ac.id',
],
[
    'foto'=> 'fesia.jpeg',
    'nama' =>'Fesia Ananda', 
    'nrp' =>'223040211',
    'jurusan'=> 'Teknik Informatika',
    'email' => 'Fesia.223040211@mail.unpas.ac.id',
],
[
    'foto'=> 'qory.jpeg',
    'nama' =>'Qory Fajrina', 
    'nrp' =>'223040224',
    'jurusan'=> 'Teknik Informatika',
    'email' => 'Qory.223040224@mail.unpas.ac.id',
],
[
    'foto'=> 'putri.jpeg',
    'nama' =>'Putri Nadhira', 
    'nrp' =>'223040251',
    'jurusan'=> 'Teknik Informatika',
    'email' => 'Putri.223040251@mail.unpas.ac.id',
],

]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tugas 5</title>
</head>
<body>
    <h2>Daftar Mahasiswa</h2>
    <?php foreach($mahasiswa as $mhs) { ?>
    <ul>
        <img src="image/<?= $mhs ['foto']; ?>" width=150>
        <li>Nama: <?= $mhs['nama']; ?></li>
        <li>NRP: <?= $mhs['nrp']; ?></li>
        <li>Jurusan: <?= $mhs['jurusan']; ?></li>
        <li>E-mail: <?= $mhs['email']; ?></li>
    </ul>
    <?php } ?>
        