<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start();

if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'user') {
    header("Location: /TUGAS-PPL/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .info-box {
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: 0.3s;
        }
        .info-box:hover {
            transform: translateY(-3px);
            box-shadow: 0 4px 12px rgba(0,0,0,0.15);
        }
        .info-icon {
            font-size: 2rem;
        }
    </style>
</head>
<body>

<?php include 'navbar_user.php'; ?>

<!-- Info Login -->
<!--<div class="bg-light py-2 border-bottom">
    <div class="container">
        <span class="text-dark">Anda login sebagai: <strong><?= htmlspecialchars($_SESSION['user']) ?></strong> (User)</span>
    </div>
</div>*/-->

<!-- Dashboard Content -->
<div class="container mt-4">
    <div class="text-center mb-4">
        <h3>Selamat Datang, <?= htmlspecialchars($_SESSION['user']) ?>!</h3>
        <p class="text-muted">Gunakan menu berikut untuk mengelola data akademik Anda.</p>
    </div>

    <!-- Ringkasan Akademik -->
    <div class="row text-center mb-4">
        <div class="col-md-4 mb-3">
            <div class="p-3 bg-primary text-white info-box">
                <div class="info-icon mb-2">🎓</div>
                <h5>IPK Saat Ini</h5>
                <p class="mb-0">3.75</p>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="p-3 bg-success text-white info-box">
                <div class="info-icon mb-2">📚</div>
                <h5>SKS Kumulatif</h5>
                <p class="mb-0">112 SKS</p>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="p-3 bg-warning text-dark info-box">
                <div class="info-icon mb-2">📆</div>
                <h5>Semester Aktif</h5>
                <p class="mb-0">Genap 2024/2025</p>
            </div>
        </div>
    </div>

    <!-- Menu Navigasi Cepat -->
    <div class="row">
        <div class="col-md-3 mb-3">
            <a href="/user/akademik/krs.php" class="text-decoration-none text-dark">
                <div class="p-3 bg-light info-box text-center">
                    <div class="info-icon mb-2">📝</div>
                    <h6 class="mb-0">KRS Mahasiswa</h6>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="/user/akademik/nilai_perkuliahan.php" class="text-decoration-none text-dark">
                <div class="p-3 bg-light info-box text-center">
                    <div class="info-icon mb-2">📊</div>
                    <h6 class="mb-0">Nilai Perkuliahan</h6>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="#" class="text-decoration-none text-dark">
                <div class="p-3 bg-light info-box text-center">
                    <div class="info-icon mb-2">💼</div>
                    <h6 class="mb-0">Administrasi</h6>
                </div>
            </a>
        </div>
        <div class="col-md-3 mb-3">
            <a href="#" class="text-decoration-none text-dark">
                <div class="p-3 bg-light info-box text-center">
                    <div class="info-icon mb-2">💰</div>
                    <h6 class="mb-0">Keuangan</h6>
                </div>
            </a>
        </div>
    </div>
</div>

<?php include '../footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
