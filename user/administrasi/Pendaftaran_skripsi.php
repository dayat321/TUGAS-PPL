<?php include '../navbar_user.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Ujian Skripsi / Tesis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow rounded mb-4">
        <div class="card-header bg-primary text-white ">
            <h4 class="mb-0">Form Pendaftaran Ujian Skripsi / Tesis</h4>
        </div>
        <div class="card-body">
            <?php
                $sks_tempuh = 120;
                $sks_minimal = 130;
                if ($sks_tempuh < $sks_minimal):
            ?>
            <div class="alert alert-danger text-center fw-bold">
                Total SKS Anda Tidak Memenuhi Persyaratan Minimal Untuk Mengikuti Ujian Skripsi / Tesis (Minimal <?= $sks_minimal ?> SKS)
            </div>
            <?php endif; ?>

            <form action="proses_skripsi.php" method="POST" enctype="multipart/form-data">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="2023101234" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan Nama Lengkap">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="judul_skripsi" class="form-label">Judul Skripsi / Tesis</label>
                    <input type="text" class="form-control" id="judul_skripsi" name="judul_skripsi" placeholder="Masukkan Judul Skripsi / Tesis">
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="pembimbing1" class="form-label">Dosen Pembimbing I</label>
                        <select class="form-select" name="pembimbing1" id="pembimbing1">
                            <option selected disabled>Pilih Dosen</option>
                            <option value="Dr. Budi">Dr. Budi</option>
                            <option value="Prof. Ani">Prof. Ani</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="pembimbing2" class="form-label">Dosen Pembimbing II</label>
                        <select class="form-select" name="pembimbing2" id="pembimbing2">
                            <option selected disabled>Pilih Dosen</option>
                            <option value="Ir. Joko">Ir. Joko</option>
                            <option value="Dr. Siti">Dr. Siti</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="file_skripsi" class="form-label">Upload Draft Skripsi (.pdf)</label>
                    <input type="file" class="form-control" id="file_skripsi" name="file_skripsi" accept=".pdf">
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">Daftar Ujian</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Riwayat Pendaftaran -->
    <div class="card shadow">
        <div class="card-header bg-secondary text-white">
            <h5 class="mb-0">Riwayat Pendaftaran Ujian Skripsi / Tesis</h5>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Judul Skripsi</th>
                            <th>Pembimbing I</th>
                            <th>Pembimbing II</th>
                            <th>Status</th>
                            <th>Komentar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Sistem Informasi Desa Berbasis Web</td>
                            <td>Dr. Budi</td>
                            <td>Dr. Siti</td>
                            <td><span class="badge bg-warning">Menunggu Verifikasi</span></td>
                            <td>-</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Aplikasi Keuangan Bumdes</td>
                            <td>Prof. Ani</td>
                            <td>Ir. Joko</td>
                            <td><span class="badge bg-success">Disetujui</span></td>
                            <td>Judul sudah sesuai topik</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php include '../../footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
