<?php
$host = "sql211.infinityfree.com";   // MySQL Workbench
$user = "if0_40901908";        // username MySQL
$pass = "samsungS21fe"; // isi sesuai Workbench
$db   = "if0_40901908_db_cloud";
$port = 3306;          // cek di Workbench

$koneksi = mysqli_connect($host, $user, $pass, $db, $port);
mysqli_query($koneksi, "SET time_zone = '+07:00'");


if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>



