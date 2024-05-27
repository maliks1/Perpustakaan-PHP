<?php

// Memulai sesi
session_start();

// Jika user tidak memiliki SESSION["email"]
if (!isset($_SESSION['email'])) {
    // Kembalikan ke login.php
    header("Location: login.php");
    exit; // Memastikan agar tidak ada kode yang dieksekusi setelah melakukan redirect
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Aplikasi Perpustakaan</h1>
    <a href="./buku.php">Daftar Buku</a>
    <br>
    <a href="./staff.php">Daftar Staff</a>
    <br>
    <a href='logout.php'>logout</a>
</body>

</html>