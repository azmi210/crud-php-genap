<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "saya_aal";

// Membuat koneksi
$mysqli = new mysqli($servername, $username, $password, $dbname);

// Mengecek koneksi
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
?>
