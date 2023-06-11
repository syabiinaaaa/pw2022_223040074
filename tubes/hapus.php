<?php


session_start();

if (!isset($_SESSION["submit"])) {
    header("Location: login.php");
}
require 'function.php';

$id = htmlspecialchars($_GET['id']);

if (hapus($id) > 0) {
    echo "<script>
        alert('Data Berhasil dihapus!');
        document.location.href='admin1.php';
        </script>";
} else {
    echo "<script>
        alert('Data Gagal dihapus!');
        document.location.href='admin1.php';
        </script>";
}
