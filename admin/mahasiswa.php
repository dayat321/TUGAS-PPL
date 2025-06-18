<?php
session_start();

// Validasi akses hanya untuk admin
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
</head>
<body>
<div class="d-flex" id="wrapper">
    <?php include 'bar/sidebar.php'; ?>

    <div id="page-content-wrapper" class="w-100">
        <?php include 'bar/topbar.php'; ?>

        <div class="container mt-4">
            <h3 class="mb-4">Data Mahasiswa</h3>
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-primary">
                        <tr>
                            <th>No</th>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Kelas</th>
                            <th>Program Studi</th>
                            <th>IPK</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data dummy -->
                        <tr>
                            <td>1</td>
                            <td>20231001</td>
                            <td>Akbar Ij</td>
                            <td>TI-1A</td>
                            <td>Teknik Informatika</td>
                            <td>3.75</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>20231002</td>
                            <td>Dina Fitri</td>
                            <td>TI-1B</td>
                            <td>Teknik Informatika</td>
                            <td>3.60</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        <!-- Tambahkan baris lain jika perlu -->
                    </tbody>
                </table>
            </div>
            <a href="dashboard_admin.php" class="btn btn-secondary mt-3">← Kembali ke Dashboard</a>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
