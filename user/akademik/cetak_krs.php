<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'user') {
    header("Location: /TUGAS-PPL/login.php");
    exit;
}

// Simulasi data
$semester = "Ganjil";
$tahun_ajaran = "2024/2025";

$mahasiswa = [
    'nim' => '2210112233',
    'nama' => 'Akbar jj',
    'kelas' => '6ITA1',
    'ipk' => 3.75,
    'sks_kumulatif' => 110,
    'sks_maksimal' => 24,
    'foto' => '/TUGAS-PPL/assets/img/mahasiswa.jpg'
];

$matkul_diambil = [
    ['nama' => 'Etika dan Profesi', 'kelas' => '6ITA1', 'sks' => 3],
    ['nama' => 'Pemrograman Web', 'kelas' => '6ITA1', 'sks' => 3],
    ['nama' => 'Kecerdasan Buatan', 'kelas' => '6ITA1', 'sks' => 3],
    ['nama' => 'Basis Data Lanjut', 'kelas' => '6ITA1', 'sks' => 3],
    ['nama' => 'Manajemen Proyek TI', 'kelas' => '6ITA1', 'sks' => 3],
    ['nama' => 'Jaringan Komputer', 'kelas' => '6ITA1', 'sks' => 3]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Cetak KRS</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        @media print {
            .no-print {
                display: none;
            }
        }

        .krs-header {
            background-color: #0d6efd;
            color: white;
            padding: 20px;
            border-radius: 0.5rem;
            margin-block-end: 20px;
        }

        .table th, .table td {
            vertical-align: middle;
        }

        .card-style {
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 0.5rem;
        }

        .student-photo {
            max-inline-size: 100%;
            border-radius: 0.5rem;
        }
    </style>
</head>
<body>

<?php include '../navbar_user.php'; ?>

<div class="container mt-4">
    <div class="krs-header d-flex justify-content-between align-items-center flex-wrap">
        <div>
            <h4 class="mb-0">Kartu Rencana Studi</h4>
            <small>Semester <strong><?= $semester ?></strong> - Tahun Ajaran <strong><?= $tahun_ajaran ?></strong></small>
        </div>
        <button onclick="window.print()" class="btn btn-light fw-bold no-print">🖨 Cetak KRS</button>
    </div>

    <!-- Info Mahasiswa -->
    <div class="row mb-4">
        <div class="col-md-8">
            <div class="card card-style p-3">
                <h5 class="mb-3">Data Mahasiswa</h5>
                <table class="table table-sm">
                    <tr><th>NIM</th><td><?= $mahasiswa['nim'] ?></td></tr>
                    <tr><th>Nama</th><td><?= $mahasiswa['nama'] ?></td></tr>
                    <tr><th>Kelas</th><td><?= $mahasiswa['kelas'] ?></td></tr>
                    <tr><th>IPK</th><td><?= $mahasiswa['ipk'] ?></td></tr>
                    <tr><th>SKS Kumulatif</th><td><?= $mahasiswa['sks_kumulatif'] ?></td></tr>
                    <tr><th>SKS Maksimal</th><td><?= $mahasiswa['sks_maksimal'] ?></td></tr>
                </table>
            </div>
        </div>
        <div class="col-md-4 text-center">
             <img src="../../../assets/saitama.jpeg" class="student-photo img-thumbnail" alt="Foto Mahasiswa">
        </div>
    </div>

    <!-- Mata Kuliah Diambil -->
    <div class="card card-style p-3">
        <h5 class="mb-3">Mata Kuliah yang Diambil</h5>
        <table class="table table-bordered table-hover">
            <thead class="table-light">
                <tr>
                    <th>No</th>
                    <th>Mata Kuliah</th>
                    <th>Kelas</th>
                    <th>SKS</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $total_sks = 0;
                foreach ($matkul_diambil as $i => $m) {
                    $total_sks += $m['sks'];
                    echo "<tr>
                        <td>".($i+1)."</td>
                        <td>{$m['nama']}</td>
                        <td>{$m['kelas']}</td>
                        <td>{$m['sks']}</td>
                    </tr>";
                }
                ?>
            </tbody>
            <tfoot>
                <tr class="fw-bold bg-light">
                    <td colspan="3" class="text-end">Total SKS</td>
                    <td><?= $total_sks ?></td>
                </tr>
            </tfoot>
        </table>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php include '../../footer.php'; ?>
</body>
</html>
