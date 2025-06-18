<?php
session_start();

// Validasi akses hanya untuk admin
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../login.php");
    exit;
}

// Data dummy mata kuliah
$data_mk = [
    ['kode' => 'TI101', 'nama' => 'Algoritma & Pemrograman', 'sks' => 3, 'semester' => 1, 'jurusan' => 'Teknik Informatika', 'dosen' => 'Dr. Budi'],
    ['kode' => 'TI202', 'nama' => 'Struktur Data', 'sks' => 3, 'semester' => 3, 'jurusan' => 'Teknik Informatika', 'dosen' => 'Dra. Siti'],
    ['kode' => 'TI301', 'nama' => 'Basis Data', 'sks' => 3, 'semester' => 5, 'jurusan' => 'Teknik Informatika', 'dosen' => 'Pak Andi'],

    ['kode' => 'MA101', 'nama' => 'Pengantar Manajemen', 'sks' => 3, 'semester' => 2, 'jurusan' => 'Manajemen', 'dosen' => 'Bu Fitri'],
    ['kode' => 'MA201', 'nama' => 'Manajemen Pemasaran', 'sks' => 3, 'semester' => 4, 'jurusan' => 'Manajemen', 'dosen' => 'Pak Rudi'],

    ['kode' => 'AK101', 'nama' => 'Akuntansi Dasar', 'sks' => 3, 'semester' => 1, 'jurusan' => 'Akuntansi', 'dosen' => 'Bu Ratna'],
    ['kode' => 'AK201', 'nama' => 'Akuntansi Biaya', 'sks' => 3, 'semester' => 2, 'jurusan' => 'Akuntansi', 'dosen' => 'Pak Doni'],
];

// Ambil filter
$filter_jurusan = $_GET['jurusan'] ?? '';
$filter_semester = $_GET['semester'] ?? '';

// Filter data
$filtered = array_filter($data_mk, function ($mk) use ($filter_jurusan, $filter_semester) {
    if ($filter_jurusan && $mk['jurusan'] !== $filter_jurusan) return false;
    if ($filter_semester && $mk['semester'] != $filter_semester) return false;
    return true;
});
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="d-flex" id="wrapper">
    <?php include 'bar/sidebar.php'; ?>
    <div id="page-content-wrapper" class="w-100">
        <?php include 'bar/topbar.php'; ?>

        <div class="container mt-4">
            <h3 class="mb-4">Data Mata Kuliah</h3>

            <!-- Filter -->
            <form method="GET" class="row g-2 mb-3">
                <div class="col-md-4">
                    <select name="jurusan" class="form-select">
                        <option value="">-- Semua Jurusan --</option>
                        <option value="Teknik Informatika" <?= $filter_jurusan == 'Teknik Informatika' ? 'selected' : '' ?>>Teknik Informatika</option>
                        <option value="Manajemen" <?= $filter_jurusan == 'Manajemen' ? 'selected' : '' ?>>Manajemen</option>
                        <option value="Akuntansi" <?= $filter_jurusan == 'Akuntansi' ? 'selected' : '' ?>>Akuntansi</option>
                    </select>
                </div>
                <div class="col-md-4">
                    <select name="semester" class="form-select">
                        <option value="">-- Semua Semester --</option>
                        <?php for ($i = 1; $i <= 8; $i++): ?>
                            <option value="<?= $i ?>" <?= $filter_semester == $i ? 'selected' : '' ?>>Semester <?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-md-4 d-grid">
                    <button class="btn btn-primary">Tampilkan</button>
                </div>
            </form>

            <!-- Tabel Data -->
            <div class="table-responsive">
                <table class="table table-bordered table-striped align-middle">
                    <thead class="table-warning">
                        <tr>
                            <th>No</th>
                            <th>Kode</th>
                            <th>Nama Mata Kuliah</th>
                            <th>SKS</th>
                            <th>Semester</th>
                            <th>Jurusan</th>
                            <th>Dosen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (empty($filtered)) : ?>
                            <tr><td colspan="7" class="text-center">Tidak ada data ditemukan</td></tr>
                        <?php else : ?>
                            <?php $no = 1; foreach ($filtered as $mk): ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $mk['kode'] ?></td>
                                    <td><?= $mk['nama'] ?></td>
                                    <td><?= $mk['sks'] ?></td>
                                    <td><?= $mk['semester'] ?></td>
                                    <td><?= $mk['jurusan'] ?></td>
                                    <td><?= $mk['dosen'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
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
