<?php 
// 6 elemen perangkat keras komputer
$perangkat_keras = ['Motherboard','Processor','Hard disk','PC Coller', 'VGA Card','SSD'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 4b</title>
</head>
<body>
    <h2>Macam-macam Perangkat Keras Komputer</h2>
    <ol>
        <?php foreach ($perangkat_keras as $p) {?>
        <li><?= $p; ?></li> 
        <?php } ?>  
        <?php 
        // menambahkan perangkat baru 
        array_push($perangkat_keras, 'Card Reader','Modem');
        // mengurutkan dengan sort sesuai abjad a-z
        sort($perangkat_keras);  
        ?>
    </ol>
    <h2>Macam-macam Perangkat Keras Baru</h2>
    <ol>
        <?php foreach ($perangkat_keras as $p) {?>
        <li><?= $p; ?></li> 
        <?php } ?>
    </ol>

</body>
</html>