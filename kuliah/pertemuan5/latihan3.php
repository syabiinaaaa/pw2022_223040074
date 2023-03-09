<?php 
$binatang = ['🦁', '🐮', '🐷', '🦄','🐼','🐈'];
$makanan = ['🍫','🍔','🍩','🍦','🍟','🥩'];
$mahasiswa = ['Syahbrina','Qory','Putri','Ceca','eki'];
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
    
    <h3>Daftar Mahasiswa</h3>
    <?php foreach($mahasiswa as $i => $m) { ?>
    <ul>
        <li>Nama: <?= $m; ?></li>
        <li>Makanan favorit: <?= $makanan[$i]; ?></li>
        <li>Binatang Peliharaan: <?= $binatang[$i]; ?></li>
       
    </ul>
        <?php } ?>
</body>
</html>