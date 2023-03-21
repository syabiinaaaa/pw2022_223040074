<?php 
// array associative
// array yang indexnya adalah string yang kita buat sendiri
$mahasiswa = [
['nama'=> 'Syahbrina',
'binatang' =>'🦁', 
'makanan' =>['🍫','🍕']], 

['nama' => 'Qory',
'binatang' =>'🐮', 
'makanan'=>['🍔','🍟']], 

['nama' => 'Putri', 
'binatang' =>'🐷',
'makanan'=>['🍩','🥐','🧀']], 

['nama' =>'Ceca',
'binatang' =>'🦄',
'makanan'=>['🍟','🍜']], 

['nama' =>'eki', 
'binatang' =>'🐈',
'makanan'=>['🥩', '🥪','🍣']]
];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 1</title>
</head>
<body>
    
    <h3>Daftar Mahasiswa</h3>
    <?php foreach($mahasiswa as $mhs) { ?>
    <ul>
        <li>Nama: <?= $mhs['nama']; ?></li>
        <li>Makanan favorit:
            <?php foreach ($mhs['makanan'] as $mkn ) {
                echo $mkn;
             } ?>
        </li>
        <li>Binatang Peliharaan: <?= $mhs['binatang']; ?></li>
       
    </ul>
        <?php } ?>
</body>
</html>