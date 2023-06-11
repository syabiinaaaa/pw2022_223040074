<?php 
// array multidimensi atau array di dalam array
$mahasiswa = [
['Syahbrina','🦁','🍫'], 
['Qory','🍔','🐮'], 
['Putri','🍩','🐷'], 
['Ceca','🍟','🦄'], 
['eki','🥩','🐈']
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
        <li>Nama: <?= $mhs[0]; ?></li>
        <li>Makanan favorit: <?= $mhs[2]; ?></li>
        <li>Binatang Peliharaan: <?= $mhs[1]; ?></li>
       
    </ul>
        <?php } ?>
</body>
</html>