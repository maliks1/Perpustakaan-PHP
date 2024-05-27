<?php

// Memulai sesi
session_start();

// Jika user tidak memiliki SESSION["email"]
if (!isset($_SESSION['email'])) {
    // Kembalikan ke login.php
    header("Location: login.php");
    exit; // Memastikan agar tidak ada kode yang dieksekusi setelah melakukan redirect
}

include_once("./connect.php");
$query = mysqli_query($db, "SELECT * FROM buku");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Buku</title>
</head>

<body>
    <h1>Daftar Buku</h1>
    <table border="1">
        <tr>
            <td>Nama</td>
            <td>ISBN</td>
            <td>Unit</td>
            <td>ACTION</td>
        </tr>
        <?php foreach ($query as $buku) { ?>
            <tr>
                <td><?= $buku["nama"] ?></td>
                <td><?= $buku["isbn"] ?></td>
                <td><?= $buku["unit"] ?></td>
                <td>
                    <a href=<?php echo "edit-buku.php?id=" . $buku["id"] ?>>EDIT</a>
                    <a href=<?php echo "delete-buku.php?id=" . $buku["id"] ?>>DELETE</a>
                </td>
            </tr>
        <?php } ?>
    </table>
    <br>
    <a href="./tambah-buku.php">Tambah data buku</a>
    <br>
    <a href="./index.php">Kembali ke halaman utama</a>
</body>

</html>