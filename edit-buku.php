<?php

// Memulai sesi
session_start();

// Jika user tidak memiliki SESSION["email"]
if (!isset($_SESSION['email'])) {
    // Kembalikan ke login.php
    header("Location: login.php");
    exit; // Memastikan agar tidak ada kode yang dieksekusi setelah melakukan redirect
}

include 'connect.php';

$id = $_GET["id"];

$query_get_data = mysqli_query($db, "SELECT * FROM buku WHERE id=$id");
$buku = mysqli_fetch_assoc($query_get_data);
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $isbn = $_POST['isbn'];
    $unit = $_POST['unit'];

    $query = mysqli_query($db, "UPDATE buku SET nama='$nama', isbn='$isbn',unit=$unit WHERE id=$id");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah Buku</title>
</head>

<body>
    <h1>Form Tambah Data Buku</h1>
    <form action="" method="post">
        <label for="nama">Nama</label>
        <input value="<?= $buku["nama"] ?>" type="text" id="nama" name="nama">
        <br>
        <br>
        <label for="isbn">ISBN</label>
        <input value="<?= $buku["isbn"] ?>" type="text" id="isbn" name="isbn">
        <br>
        <br>
        <label for="unit">Unit</label>
        <input value="<?= $buku["unit"] ?>" type="number" id="unit" name="unit">
        <br>
        <br>
        <button type="submit" name="submit">SUBMIT</button>
    </form>
    <br>
    <a href="./buku.php">Kembali ke halaman buku</a>
</body>

</html>