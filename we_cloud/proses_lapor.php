<?php
session_start();
include "koneksi.php";

$user_id = $_SESSION['user_id'];
$nama_kota = $_POST['nama_kota'];
$nama_kecamatan = $_POST['nama_kecamatan'];
$kondisi_cuaca = $_POST['kondisi_cuaca'];
$deskripsi = $_POST['deskripsi'];

/* Simpan lokasi */
mysqli_query($koneksi,
    "INSERT INTO lokasi (nama_kota, nama_kecamatan)
     VALUES ('$nama_kota', '$nama_kecamatan')"
);

$lokasi_id = mysqli_insert_id($koneksi);

/* Simpan laporan */
mysqli_query($koneksi,
    "INSERT INTO laporan_cuaca
    (user_id, lokasi_id, kondisi_cuaca, deskripsi)
    VALUES
    ('$user_id','$lokasi_id','$kondisi_cuaca','$deskripsi')"
);

header("Location: dashboard.php");
