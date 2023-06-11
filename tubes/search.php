<?php
require 'function.php';

// Cek apakah ada parameter "query" yang dikirimkan melalui Ajax
if (isset($_GET['query'])) {
    $searchQuery = $_GET['query'];

    // Melakukan query dengan menggunakan parameter pencarian
    $movies = query("SELECT * FROM movies WHERE name LIKE '%$searchQuery%'");

    // Mengembalikan hasil query dalam format JSON
    echo json_encode($movies);
}


