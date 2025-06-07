<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-dark bg-primary">
    <div class="container-fluid">
        <span class="navbar-brand">Dashboard</span>
        <div>
            <span class="text-white me-3">Login sebagai <strong><?= $_SESSION['user'] ?></strong></span>
            <a href="logout.php" class="btn btn-outline-light btn-sm">Logout</a>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <h3>Selamat datang, <?= $_SESSION['user'] ?>!</h3>
    <p>Ini adalah halaman dashboard yang hanya bisa diakses jika sudah login.</p>
</div>
</body>
</html>
