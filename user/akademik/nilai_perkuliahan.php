<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'user') {
    header("Location: /TUGAS-PPL/login.php");
    exit;
}

$mahasiswa = [
    'nim' => '2210112233',
    'nama' => 'Akbar JJ',
    'kelas' => '6ITA1',
];

// Data semua nilai (dummy)
$semua_nilai = [
    ['kode' => 'IF101', 'mata_kuliah' => 'Dasar Pemrograman', 'sks' => 3, 'nilai' => 'A', 'tahun' => '2021/2022', 'semester' => 'Ganjil'],
    ['kode' => 'IF102', 'mata_kuliah' => 'Struktur Data', 'sks' => 3, 'nilai' => 'A-', 'tahun' => '2021/2022', 'semester' => 'Genap'],
    ['kode' => 'IF201', 'mata_kuliah' => 'Basis Data', 'sks' => 3, 'nilai' => 'B+', 'tahun' => '2022/2023', 'semester' => 'Ganjil'],
    ['kode' => 'IF202', 'mata_kuliah' => 'Pemrograman Web', 'sks' => 3, 'nilai' => 'A', 'tahun' => '2022/2023', 'semester' => 'Genap'],
    ['kode' => 'IF301', 'mata_kuliah' => 'Kecerdasan Buatan', 'sks' => 3, 'nilai' => 'B', 'tahun' => '2023/2024', 'semester' => 'Ganjil'],
];

// Ambil filter dari GET
$tahun_filter = $_GET['tahun'] ?? '';
$semester_filter = $_GET['semester'] ?? '';

// Filter data sesuai pilihan
$nilai = array_filter($semua_nilai, function($n) use ($tahun_filter, $semester_filter) {
    $match_tahun = !$tahun_filter || $n['tahun'] === $tahun_filter;
    $match_semester = !$semester_filter || $n['semester'] === $semester_filter;
    return $match_tahun && $match_semester;
});

$total_sks = array_sum(array_column($nilai, 'sks'));
$ipk = 3.65; // Contoh IPK tetap
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Transkrip Nilai Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">
<?php include '../navbar_user.php'; ?>

<div class="container my-5">
    <div class="bg-white rounded shadow-sm p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="fw-bold mb-0">Transkrip Nilai Mahasiswa</h5>
            <a href="#" class="btn btn-outline-primary btn-sm"><i class="bi bi-printer"></i> Cetak</a>
        </div>

        <!-- Filter Form -->
        <form method="GET" class="row g-3 mb-4">
            <div class="col-md-3">
                <label class="form-label">NIM</label>
                <input type="text" class="form-control" value="<?= $mahasiswa['nim'] ?>" readonly>
            </div>
            <div class="col-md-4">
                <label class="form-label">Tahun Akademik</label>
                <select class="form-select" name="tahun">
                    <option value="">-- Semua --</option>
                    <option <?= $tahun_filter === '2021/2022' ? 'selected' : '' ?>>2021/2022</option>
                    <option <?= $tahun_filter === '2022/2023' ? 'selected' : '' ?>>2022/2023</option>
                    <option <?= $tahun_filter === '2023/2024' ? 'selected' : '' ?>>2023/2024</option>
                </select>
            </div>
            <div class="col-md-3">
                <label class="form-label">Semester</label>
                <select class="form-select" name="semester">
                    <option value="">-- Semua --</option>
                    <option <?= $semester_filter === 'Ganjil' ? 'selected' : '' ?>>Ganjil</option>
                    <option <?= $semester_filter === 'Genap' ? 'selected' : '' ?>>Genap</option>
                </select>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button class="btn btn-primary w-100" type="submit"><i class="bi bi-search"></i> Cari</button>
            </div>
        </form>

        <!-- Jumlah Data dan Cetak -->
        <div class="d-flex justify-content-between align-items-center mb-2">
            <small class="text-muted">Jumlah Data: <?= count($nilai) ?></small>
        </div>

        <!-- Tabel Nilai -->
        <div class="table-responsive">
            <table class="table table-bordered table-hover text-center align-middle">
                <thead class="table-light">
                    <tr>
                        <th>Kode</th>
                        <th>Mata Kuliah</th>
                        <th>SKS</th>
                        <th>Nilai</th>
                        <th>Tahun</th>
                        <th>Semester</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($nilai)): ?>
                        <?php foreach ($nilai as $n): ?>
                            <tr>
                                <td><?= $n['kode'] ?></td>
                                <td class="text-start"><?= $n['mata_kuliah'] ?></td>
                                <td><?= $n['sks'] ?></td>
                                <td><?= $n['nilai'] ?></td>
                                <td><?= $n['tahun'] ?></td>
                                <td><?= $n['semester'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="6" class="text-center text-muted">Data tidak ditemukan.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Total SKS dan IPK -->
        <div class="row mt-3">
            <div class="col-md-6">
                <strong>SKS Tempuh:</strong> <?= $total_sks ?>
            </div>
            <div class="col-md-6 text-end">
                <strong>IPK:</strong> <?= $ipk ?>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php include '../../footer.php'; ?>
</body>
</html>
