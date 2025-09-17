<?php
$host = "localhost"; // host database
$user = "root";      // username default XAMPP
$pass = "";          // password default XAMPP kosong
$db   = "ecommerce"; // nama database (buat di phpMyAdmin)

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
