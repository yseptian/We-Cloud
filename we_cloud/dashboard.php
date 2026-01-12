<?php
include "cek_login.php";
include "koneksi.php";

/* ===============================
   SEARCH
================================ */
$search = "";
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($koneksi, $_GET['search']);
}

/* ===============================
   HITUNG LAPORAN PER CUACA
================================ */
$data = [];
$cuaca = ['Berawan', 'Cerah', 'Hujan Ringan', 'Hujan Deras'];

foreach ($cuaca as $c) {
    $q = mysqli_query($koneksi,
        "SELECT COUNT(*) AS total
         FROM laporan_cuaca
         WHERE kondisi_cuaca='$c'"
    );
    $data[$c] = mysqli_fetch_assoc($q)['total'];
}

/* ===============================
   AMBIL LAPORAN
================================ */
$query_laporan = "
    SELECT l.*, lo.nama_kota, lo.nama_kecamatan, u.nama
    FROM laporan_cuaca l
    JOIN lokasi lo ON l.lokasi_id = lo.lokasi_id
    JOIN users u ON l.user_id = u.user_id
";

if ($search != "") {
    $query_laporan .= "
        WHERE lo.nama_kota LIKE '%$search%'
        OR lo.nama_kecamatan LIKE '%$search%'
        OR u.nama LIKE '%$search%'
    ";
}

$query_laporan .= " ORDER BY l.waktu_laporan DESC";

$laporan = mysqli_query($koneksi, $query_laporan);
?>

<!DOCTYPE html>
<html lang="id">
<?php include "header.php"; ?>
<body>


<body>

<!-- NAVBAR -->
<nav class="navbar navbar-dark bg-dark fixed-top">
    <div class="container-fluid">
        <a class="navbar-brand" href="#">We Cloud</a>

        <form class="d-flex" method="GET">
            <input class="form-control me-2"
                   type="search"
                   name="search"
                   placeholder="Cari kota / kecamatan / pelapor"
                   value="<?= htmlspecialchars($search) ?>">
            <button class="btn btn-primary">Search</button>
        </form>
    </div>
</nav>

<!-- SIDEBAR -->
<div class="sidebar">
    <h6 class="text-muted">HOME</h6>
    <a href="dashboard.php" class="active">Dashboard</a>

    <h6 class="text-muted mt-3">ADMIN</h6>
    <a href="lapor_cuaca.php">Lapor Cuaca</a>
    <a href="logout.php">Logout</a>
</div>

<!-- CONTENT -->
<div class="content">
    <h2>Dashboard</h2>
    <p class="text-muted">Home</p>

    <!-- CARD SUMMARY -->
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card bg-warning text-white">
                <div class="card-body">
                    <h5>Cerah</h5>
                    <strong><?= $data['Cerah'] ?> Laporan</strong>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-primary text-white">
                <div class="card-body">
                    <h5>Berawan</h5>
                    <strong><?= $data['Berawan'] ?> Laporan</strong>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Hujan Ringan</h5>
                    <strong><?= $data['Hujan Ringan'] ?> Laporan</strong>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5>Hujan Deras</h5>
                    <strong><?= $data['Hujan Deras'] ?> Laporan</strong>
                </div>
            </div>
        </div>
    </div>

    <!-- LAPORAN CARD -->
    <div class="row">
        <?php if (mysqli_num_rows($laporan) > 0) { ?>
            <?php while ($row = mysqli_fetch_assoc($laporan)) {

                /* WARNA & IKON */
                $class_cuaca = "";
                $icon = "";

                switch ($row['kondisi_cuaca']) {
                    case "Cerah":
                        $class_cuaca = "cuaca-cerah";
                        $icon = "☀️";
                        break;
                    case "Berawan":
                        $class_cuaca = "cuaca-berawan";
                        $icon = "☁️";
                        break;
                    case "Hujan Ringan":
                        $class_cuaca = "cuaca-hujan-ringan";
                        $icon = "🌦️";
                        break;
                    case "Hujan Deras":
                        $class_cuaca = "cuaca-hujan-deras";
                        $icon = "🌧️";
                        break;
                }
            ?>
            <div class="col-md-4 mb-4">
                <div class="card weather-card <?= $class_cuaca ?> h-100">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-2">
                            <span class="weather-title">
                                <?= $row['nama_kota'] ?> - <?= $row['nama_kecamatan'] ?>
                            </span>
                            <span class="weather-icon"><?= $icon ?></span>
                        </div>

                        <p><strong>Cuaca:</strong> <?= $row['kondisi_cuaca'] ?></p>
                        <p><strong>Deskripsi:</strong><br><?= $row['deskripsi'] ?></p>
                        <p><strong>Pelapor:</strong> <?= $row['nama'] ?></p>
                    </div>

                    <div class="card-footer text-muted small">
                        <?= $row['waktu_laporan'] ?>
                    </div>
                </div>
            </div>
            <?php } ?>
        <?php } else { ?>
            <div class="col-12 text-center text-muted">
                Data tidak ditemukan
            </div>
        <?php } ?>
    </div>

    <footer class="mt-4 text-center text-muted">
        © 2026 We Cloud
    </footer>
</div>

</body>
</html>
