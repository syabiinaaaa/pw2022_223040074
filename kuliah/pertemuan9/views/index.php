<?php 
require('functions.php');
$title = "Home";
 ?>
<?php 
  $students = [
    [
        "nama" => "Syahbrina Dinova",
        "npm" => "223040074",
        "email" => "syahbrinadinova@gmail.com"
    ],
    [
        "nama" => "Satria tegar",
        "npm" => "223040000",
        "email" => "tegarsatria@gmail.com"
    ],
  ];

  // dd($_SERVER["REQUEST_URI"]);
  // /pw2023_223040074/kuliah/pertemuan9/

require('views/index.view.php');
?>