<?php include '../navbar_user.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Ujian Proposal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container py-5">
    <div class="card shadow-lg rounded">
        <div class="card-header bg-primary text-white">
            <h4 class="mb-0">Form Pendaftaran Ujian Proposal</h4>
        </div>
        <div class="card-body">
            <?php
                // Simulasi pengecekan SKS, ganti ini dengan query ke database jika perlu
                $sks_tempuh = 90; // Misal total SKS mahasiswa saat ini
                $sks_minimal = 100;
                if ($sks_tempuh < $sks_minimal): 
            ?>
            <div class="alert alert-danger text-center fw-bold">
                Total SKS Anda Tidak Memenuhi Persyaratan Minimal Untuk Mengikuti Ujian Proposal (Minimal <?= $sks_minimal ?> SKS)
            </div>
            <?php endif; ?>

            <form action="proses_proposal.php" method="POST">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="2023101234" readonly>
                    </div>
                    <div class="col-md-6">
                        <label for="nama" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
                    </div>
                </div>

                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Proposal</label>
                    <input type="text" class="form-control" id="judul" name="judul" placeholder="Masukkan Judul Proposal Anda">
                </div>

                <div class="mb-3">
                    <label for="dosen_pembimbing" class="form-label">Dosen Pembimbing</label>
                    <select class="form-select" id="dosen_pembimbing" name="dosen_pembimbing">
                        <option selected disabled>Pilih Dosen Pembimbing</option>
                        <option value="Dr. Budi">Dr. Budi</option>
                        <option value="Prof. Ani">Prof. Ani</option>
                        <option value="Ir. Joko">Ir. Joko</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="file_proposal" class="form-label">Upload Proposal (.pdf)</label>
                    <input type="file" class="form-control" id="file_proposal" name="file_proposal" accept=".pdf">
                </div>

                <div class="text-end">
                    <button type="submit" class="btn btn-success">Daftar Sekarang</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include '../../footer.php'; ?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
