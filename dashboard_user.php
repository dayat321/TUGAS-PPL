<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'user') {
    header("Location: login.php");
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
        .nav-link {
            color: white !important;
        }
        .nav-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container">
        <a class="navbar-brand fw-bold" href="#">Sistem Informasi</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUser">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarUser">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Akademik</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Administrasi</a></li>
                <li class="nav-item"><a class="nav-link" href="#">Keuangan</a></li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Keluar</a></li>
            </ul>
        </div>
    </div>
</nav>

<!-- Info User -->
<div class="bg-light py-2">
    <div class="container">
        <span class="text-dark">Anda login sebagai: <strong><?= htmlspecialchars($_SESSION['user']) ?></strong> (User)</span>
    </div>
</div>

<!-- Konten -->
<div class="container mt-4">
    <h3>Selamat datang, <?= htmlspecialchars($_SESSION['user']) ?>!</h3>
    <p>Silakan gunakan menu di atas untuk mengakses fitur akademik, administrasi, dan keuangan.</p>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
