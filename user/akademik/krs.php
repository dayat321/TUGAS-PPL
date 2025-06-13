<?php
session_start();
if (!isset($_SESSION['user']) || $_SESSION['role'] !== 'user') {
    header("Location: /TUGAS-PPL/login.php");
    exit;
}

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

$matkul_tawaran = [
    ['nama' => 'Data Mining', 'kelas' => '6ITA2', 'sks' => 3],
    ['nama' => 'Sistem Cerdas', 'kelas' => '6ITA2', 'sks' => 3]
];
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>KRS Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body class="bg-light">

<?php include '../navbar_user.php'; ?>

<div class="mt-4 mb-4">
    <div class="bg-primary text-white px-3 py-2 rounded shadow-sm d-inline-block">
        <h4 class="fw-bold m-0">Kartu Rencana Studi Semester <?= $semester ?> Tahun Ajaran <?= $tahun_ajaran ?></h4>
    </div>
</div>


    <!-- Info Mahasiswa -->
    <div class="row g-4 mb-5 align-items-center">
        <div class="col-md-9">
            <div class="table-responsive bg-white rounded shadow-sm">
                <table class="table table-bordered mb-0">
                    <tr><th>NIM</th><td><?= $mahasiswa['nim'] ?></td></tr>
                    <tr><th>Nama</th><td><?= $mahasiswa['nama'] ?></td></tr>
                    <tr><th>Kelas</th><td><?= $mahasiswa['kelas'] ?></td></tr>
                    <tr><th>IPK</th><td><?= $mahasiswa['ipk'] ?></td></tr>
                    <tr><th>SKS Kumulatif</th><td><?= $mahasiswa['sks_kumulatif'] ?></td></tr>
                    <tr><th>SKS Maksimal</th><td><?= $mahasiswa['sks_maksimal'] ?></td></tr>
                </table>
            </div>
        </div>
        <div class="col-md-3 text-center">
            <img src="../../../assets/saitama.jpeg" class="student-photo img-thumbnail" alt="Foto Mahasiswa">
        </div>
    </div>

    <!-- Mata Kuliah Diambil -->
    <div class="mb-4">
        <h5 class="fw-semibold">Mata Kuliah yang Diambil</h5>
        <div class="table-responsive bg-white rounded shadow-sm">
            <table class="table table-bordered mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Mata Kuliah</th>
                        <th>Kelas</th>
                        <th>SKS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                $total_sks = 0;
                foreach ($matkul_diambil as $m) {
                    $total_sks += $m['sks'];
                    echo "<tr>
                            <td>{$m['nama']}</td>
                            <td>{$m['kelas']}</td>
                            <td>{$m['sks']}</td>
                            <td>
                                <button class='btn btn-sm btn-danger' onclick=\"hapusMatkul('{$m['nama']}')\">
                                    <i class='bi bi-trash'></i> Hapus
                                </button>
                            </td>
                          </tr>";
                }
                ?>
                </tbody>
                <tfoot>
                    <tr class="fw-bold">
                        <td colspan="2">Total SKS</td>
                        <td colspan="2"><?= $total_sks ?></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>

    <!-- Mata Kuliah Ditawarkan -->
    <div class="mb-5">
        <h5 class="fw-semibold">Mata Kuliah Ditawarkan</h5>
        <div class="table-responsive bg-white rounded shadow-sm">
            <table class="table table-striped mb-0">
                <thead class="table-light">
                    <tr>
                        <th>Mata Kuliah</th>
                        <th>Kelas</th>
                        <th>SKS</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php foreach ($matkul_tawaran as $mt): ?>
                    <tr>
                        <td><?= $mt['nama'] ?></td>
                        <td><?= $mt['kelas'] ?></td>
                        <td><?= $mt['sks'] ?></td>
                        <td>
                            <button class="btn btn-sm btn-success" onclick="ambilMatkul('<?= $mt['nama'] ?>')">
                                <i class="bi bi-plus-circle"></i> Ambil
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Modal Ambil -->
<div class="modal fade" id="modalAmbil" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-sm">
      <div class="modal-header bg-success text-white">
        <h5 class="modal-title" id="modalLabel">Konfirmasi Pengambilan</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin mengambil mata kuliah <strong id="namaMatkul"></strong>?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">Ambil</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Hapus -->
<div class="modal fade" id="modalHapus" tabindex="-1" aria-labelledby="modalHapusLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content border-0 shadow-sm">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title" id="modalHapusLabel">Konfirmasi Penghapusan</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Apakah Anda yakin ingin <strong>menghapus</strong> mata kuliah <strong id="namaHapusMatkul"></strong> dari KRS?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Ya, Hapus</button>
      </div>
    </div>
  </div>
</div>

<script>
function ambilMatkul(nama) {
    document.getElementById('namaMatkul').innerText = nama;
    new bootstrap.Modal(document.getElementById('modalAmbil')).show();
}

function hapusMatkul(nama) {
    document.getElementById('namaHapusMatkul').innerText = nama;
    new bootstrap.Modal(document.getElementById('modalHapus')).show();
}
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php include '../../footer.php'; ?>
</body>
</html>
