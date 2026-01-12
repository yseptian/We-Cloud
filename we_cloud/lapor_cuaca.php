<?php
include "cek_login.php";
include "koneksi.php";
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lapor Cuaca</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="dashboard.php">We Cloud</a>
    </div>
</nav>

<!-- SIDEBAR -->
<div class="sidebar">
    <div class="menu-title">ADMIN</div>
    <a href="dashboard.php">🏠 Dashboard</a>
    <a href="lapor_cuaca.php" class="active">🌦️ Lapor Cuaca</a>
</div>

<!-- CONTENT -->
<div class="main-content">
    <h3>Lapor Cuaca</h3>
    <p class="text-muted">Isi laporan cuaca daerah Anda</p>

    <div class="card p-4 col-md-6">
        <form method="POST" action="proses_lapor.php">

            <div class="mb-3">
                <label>Nama Kota</label>
                <input type="text" name="nama_kota" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Nama Kecamatan</label>
                <input type="text" name="nama_kecamatan" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Kondisi Cuaca</label>
                <select name="kondisi_cuaca" class="form-select" required>
                    <option value="">-- Pilih Cuaca --</option>
                    <option value="Cerah">Cerah</option>
                    <option value="Berawan">Berawan</option>
                    <option value="Hujan Ringan">Hujan Ringan</option>
                    <option value="Hujan Deras">Hujan Deras</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Deskripsi</label>
                <textarea name="deskripsi" class="form-control" rows="4" required></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Kirim Laporan</button>

        </form>
    </div>
</div>

</body>
</html>
