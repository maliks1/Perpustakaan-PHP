<?php

// Memulai sesi
session_start();

if (isset($_SESSION['email'])) {
    header("Location: index.php");
    exit; // Memastikan agar tidak ada kode yang dieksekusi setelah melakukan redirect
} ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Login</h1>
    <form method="POST" action="./login_proccess.php">
        <div>
            <label for="email">Email:</label><br>
            <input type="text" id="email" name="email"><br>
        </div>

        <div><label for="password">Password:</label><br>
            <input type="password" id="password" name="password"><br>
        </div>
        <br>
        <input type="submit" value="LOGIN">
    </form>
</body>

</html>