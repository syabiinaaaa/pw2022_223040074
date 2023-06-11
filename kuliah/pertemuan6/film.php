<?php 
$film = [

[
    'poster'=> 'img1.jpg',
    'judul' =>'Wednesday', 
    'tahun' =>'2022',
    'genre'=> ['comedy,', 'crime, ', 'fantasy'],
    'pemeran' => ['Jenna Ortega'],
    'sutradara' => ['Tim Burton, ', 'James Marshall, ', 'Gandja Monteiro']
], 

[
    'poster'=>'img2.jpg' ,
    'judul' =>'Stranger Things', 
    'tahun' =>'2016',
    'genre'=> ['Drama,', 'Fantasy, ', 'Horor'],
    'pemeran' => ['Millie Bobby Brown'],
    'sutradara' => ['Matt Duffer, ', 'Shawn Levy, ', 'Ross Duffer']
],

[
    'poster'=>'img3.jpg' ,
    'judul' =>'Uncharted', 
    'tahun' =>'2022',
    'genre'=> ['Action,', 'Adventure'],
    'pemeran' => ['Tom Holland, ', 'Mark Wahlberg'],
    'sutradara' => ['Ruben Fleischer']
],

[
    'poster'=>'img4.jpg' ,
    'judul' =>'Spider-man : No Way Home', 
    'tahun' =>'2021',
    'genre'=> ['Action, ' ,'Adventure, ', 'Fantasy'],
    'pemeran' => ['Tom Holland, ', 'Zendaya, ', 'Benedict Cumberbatch'],
    'sutradara' => ['Jon Watts']
],

[
    'poster'=>'img5.jpg' ,
    'judul' =>'True Beauty', 
    'tahun' =>'2020',
    'genre'=> ['Comedy, ', 'Drama, ', 'Romance'],
    'pemeran' => ['Moon Ga-young, ', 'Cha Eun-Woo, ', 'Hwang In-Youp'],
    'sutradara' => ['Sang-hyub Kim']
]
]
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 3</title>
</head>
<body>
    <h2>Daftar Film</h2>
    <?php foreach($film as $fi) { ?>
    <ul>
        <img src="img/<?= $fi ['poster']; ?>" width=200>
        <li>Judul: <?= $fi['judul']; ?></li>
        <li>Tahun: <?= $fi['tahun']; ?></li>
        <li>Genre:
            <?php foreach ($fi['genre'] as $gnr ) {
                echo $gnr;
             } ?>
        </li>
        <li>Pemeran utama: 
        <?php foreach ($fi['pemeran'] as $pmrn ) {
                echo $pmrn;
             } ?>
        </li>
        <li>Sutradara:
        <?php foreach ($fi['sutradara'] as $st ) {
                echo $st;
             } ?>
        </li>  
    </ul>
        <?php } ?>
</body>
</html>