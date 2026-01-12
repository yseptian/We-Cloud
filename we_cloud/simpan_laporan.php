<?php
session_start();
include "koneksi.php";

$kota = $_POST['nama_kota'];
$kec  = $_POST['nama_kecamatan'];
$kond = $_POST['kondisi'];
$desk = $_POST['deskripsi'];

mysqli_query($koneksi,
    "INSERT INTO laporan_cuaca
    (nama_kota, nama_kecamatan, kondisi, deskripsi, tanggal)
    VALUES
    ('$kota','$kec','$kond','$desk', NOW())"
);

header("Location: dashboard.php");
