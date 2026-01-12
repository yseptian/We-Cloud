<?php
$host = "localhost";   // MySQL Workbench
$user = "root";        // username MySQL
$pass = "samsungS21fe+"; // isi sesuai Workbench
$db   = "db_cloud";
$port = 3306;          // cek di Workbench

$koneksi = mysqli_connect($host, $user, $pass, $db, $port);
$main_url = "http://localhost/we_cloud/";

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>

