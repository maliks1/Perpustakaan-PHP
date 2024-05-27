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

    $id = $_GET["id"];

    $query = mysqli_query($db, "DELETE FROM buku WHERE id=$id");

    header("Location: buku.php");
