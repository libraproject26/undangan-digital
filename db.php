<?php
$host = "localhost";
$user = "root"; // di InfinityFree biasanya: epiz_xxxxxx
$pass = "";
$db   = "undangan_db"; // bikin dulu di phpMyAdmin

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
