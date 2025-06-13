<?php
session_start();

// Simulasi data mahasiswa
$nim = "2210112233";
$nama = "Akbar JJ";
$kelas = "6ITA1";

// Simulasi data KHS per semester
$data_khs = [
    1 => [
        ['matkul' => 'Matematika Dasar', 'sks' => 3, 'nilai' => 'A'],
        ['matkul' => 'Logika Informatika', 'sks' => 2, 'nilai' => 'B+']
    ],
    2 => [
        ['matkul' => 'Struktur Data', 'sks' => 3, 'nilai' => 'B'],
        ['matkul' => 'Basis Data', 'sks' => 3, 'nilai' => 'A-']
    ],
    6 => [
        ['matkul' => 'Etika dan Profesi', 'sks' => 3, 'nilai' => 'A'],
        ['matkul' => 'Pemrograman Web', 'sks' => 3, 'nilai' => 'B+']
    ]
];

$selected_semester = isset($_GET['semester']) ? (int)$_GET['semester'] : null;
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak KHS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        @media print {
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body class="bg-light">
<?php include '../navbar_user.php'; ?>
<div class="container my-5">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Cetak Kartu Hasil Studi (KHS)</h5>
            <button onclick="window.print()" class="btn btn-outline-light btn-sm no-print">
                <i class="bi bi-printer"></i> Cetak
            </button>
        </div>
        <div class="card-body">

            <!-- Form Pilih Semester -->
            <form method="get" class="row g-3 align-items-end mb-4 no-print">
                <div class="col-md-4">
                    <label class="form-label">NIM</label>
                    <input type="text" class="form-control" value="<?= $nim ?>" readonly>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Semester</label>
                    <select name="semester" class="form-select" required>
                        <option value="">-- Pilih Semester --</option>
                        <?php for ($i = 1; $i <= 8; $i++): ?>
                            <option value="<?= $i ?>" <?= $selected_semester == $i ? 'selected' : '' ?>>Semester <?= $i ?></option>
                        <?php endfor; ?>
                    </select>
                </div>
                <div class="col-md-4">
                    <button type="submit" class="btn btn-success w-100">
                        <i class="bi bi-search"></i> Tampilkan KHS
                    </button>
                </div>
            </form>

            <?php if ($selected_semester && isset($data_khs[$selected_semester])): ?>
                <div class="mb-3">
                    <strong>Nama:</strong> <?= $nama ?><br>
                    <strong>Kelas:</strong> <?= $kelas ?><br>
                    <strong>Semester:</strong> <?= $selected_semester ?>
                </div>

                <div class="table-responsive bg-white rounded shadow-sm">
                    <table class="table table-bordered">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Mata Kuliah</th>
                                <th>SKS</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 1;
                            $total_sks = 0;
                            foreach ($data_khs[$selected_semester] as $khs) {
                                $total_sks += $khs['sks'];
                                echo "<tr>
                                        <td>{$no}</td>
                                        <td>{$khs['matkul']}</td>
                                        <td>{$khs['sks']}</td>
                                        <td>{$khs['nilai']}</td>
                                    </tr>";
                                $no++;
                            }
                            ?>
                        </tbody>
                        <tfoot>
                            <tr class="fw-bold">
                                <td colspan="2" class="text-end">Total SKS</td>
                                <td><?= $total_sks ?></td>
                                <td></td>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            <?php elseif ($selected_semester): ?>
                <div class="alert alert-warning mt-3">Data KHS untuk semester <?= $selected_semester ?> tidak tersedia.</div>
            <?php endif; ?>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php include '../../footer.php'; ?>
</body>
</html>
