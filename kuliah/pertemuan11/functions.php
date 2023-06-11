<?php
// Sesuaikan dengan URL project kalian
define('BASE_URL', '/pw2023_223040074/kuliah/pertemuan9/');

function koneksi()
{
  $conn = mysqli_connect('localhost', 'root', '', 'pw2023_223040074') or die('KONEKSI GAGAL!');
  return $conn;
}

function query($query)
{
  $conn = koneksi();
  $result = mysqli_query($conn, $query) or die(mysqli_error($conn));

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function dd($value)
{
  echo "<pre>";
  var_dump($value);
  echo "</pre>";
  die;
}

function uriIS($uri)
{
  return ($_SERVER["REQUEST_URI"] === $uri) ? 'active' : '';
}
