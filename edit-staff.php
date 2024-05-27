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

$query_get_data = mysqli_query($db, "SELECT * FROM staff WHERE id=$id");
$staff = mysqli_fetch_assoc($query_get_data);
if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $telp = $_POST['telp'];
    $email = $_POST['email'];

    $query = mysqli_query($db, "UPDATE staff SET nama='$nama', telp='$telp',email='$email' WHERE id=$id");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Tambah staff</title>
</head>

<body>
    <h1>Form Tambah Data staff</h1>
    <form action="" method="post">
        <label for="nama">Nama</label>
        <input value="<?= $staff["nama"] ?>" type="text" id="nama" name="nama">
        <br>
        <br>
        <label for="telp">Telp</label>
        <input value="<?= $staff["telp"] ?>" type="text" id="telp" name="telp">
        <br>
        <br>
        <label for="email">Email</label>
        <input value="<?= $staff["email"] ?>" type="email" id="email" name="email">
        <br>
        <br>
        <button type="submit" name="submit">SUBMIT</button>
    </form>
    <br>
    <a href="./staff.php">Kembali ke halaman staff</a>
</body>

</html>