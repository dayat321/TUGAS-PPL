<?php
session_start();

// Cek login dan peran admin
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header('Location: ../login.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - SIAKAD</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
<div class="d-flex" id="wrapper">
    <?php include 'bar/sidebar.php'; ?>
    
    <div id="page-content-wrapper" class="w-100">
        <?php include 'bar/topbar.php'; ?>

        <div class="container-fluid mt-4">
            <h2 class="mb-4">Dashboard Admin</h2>
            <div class="row g-4">
                <!-- Kartu Data Mahasiswa -->
                <div class="col-md-4">
                    <div class="card shadow-sm bg-primary text-white">
                        <div class="card-body">
                            <h5 class="card-title">Data Mahasiswa</h5>
                            <p class="card-text">Total: <strong>240</strong> Mahasiswa</p>
                            <a href="mahasiswa.php" class="btn btn-light btn-sm">Lihat Data</a>
                        </div>
                    </div>
                </div>

                <!-- Kartu Data Dosen -->
                <div class="col-md-4">
                    <div class="card shadow-sm bg-success text-white">
                        <div class="card-body">
                            <h5 class="card-title">Data Dosen</h5>
                            <p class="card-text">Total: <strong>35</strong> Dosen</p>
                            <a href="dosen.php" class="btn btn-light btn-sm">Lihat Data</a>
                        </div>
                    </div>
                </div>

                <!-- Kartu Matakuliah -->
                <div class="col-md-4">
                    <div class="card shadow-sm bg-warning text-dark">
                        <div class="card-body">
                            <h5 class="card-title">Matakuliah</h5>
                            <p class="card-text">Total: <strong>80</strong> Mata Kuliah</p>
                            <a href="matakuliah.php" class="btn btn-dark btn-sm">Lihat Data</a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Menu cepat -->
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Manajemen KRS</h5>
                            <p class="card-text">Kelola pengambilan mata kuliah mahasiswa</p>
                            <a href="krs.php" class="btn btn-outline-primary">Kelola KRS</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title">Laporan Akademik</h5>
                            <p class="card-text">Cetak dan unduh laporan IPK dan transkrip</p>
                            <a href="laporan.php" class="btn btn-outline-secondary">Lihat Laporan</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
