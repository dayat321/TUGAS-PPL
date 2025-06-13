<!-- Header Atas -->
<div class="bg-secondary text-white py-2">
    <div class="container d-flex align-items-center">
        <img src="/assets/mejikomsakti.png" alt="Logo" width="60" class="me-3 rounded-circle"> <!-- Ganti path logo sesuai -->
        <div>
            <h5 class="mb-0 fw-bold">SIAKAD</h5>
            <small class="d-block">PERGURUAN MEJIKOM SAKTI</small>
            <small class="text-light">Jl. Jend Sudirman No. 4, Lumajang, Jawa Timur</small>
        </div>
    </div>
</div>

<!-- Navbar Bawah -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary shadow-sm">
    <div class="container">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarUser">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarUser">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="/user/dashboard_user.php">Home</a>
                </li>

                <!-- Dropdown Akademik -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarAkademik" role="button" data-bs-toggle="dropdown">
                        Akademik
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="/user/akademik/krs.php">KRS Mahasiswa</a></li>
                        <li><a class="dropdown-item" href="/user/akademik/cetak_krs.php">Cetak KRS</a></li>
                        <li><a class="dropdown-item" href="/user/akademik/cetak_kru.php">Cetak KRU</a></li>
                        <li><a class="dropdown-item" href="/user/akademik/cetak_khs.php">Cetak KHS</a></li>
                        <li><a class="dropdown-item" href="/user/akademik/nilai_perkuliahan.php">Nilai Perkuliahan</a></li>
                    </ul>
                </li>

                <!-- Dropdown Administrasi -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarAdministrasi" role="button" data-bs-toggle="dropdown">
                        Administrasi
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="/user/administrasi/Pendaftaran_proposal.php">Pendaftaran Proposal</a></li>
                        <li><a class="dropdown-item" href="/user/administrasi/Pendaftaran_skripsi.php">Pendaftaran Skripsi</a></li>
                    </ul>
                </li>

                <!-- Dropdown Keuangan -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarKeuangan" role="button" data-bs-toggle="dropdown">
                        Keuangan
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="/user/keuangan/pembayaran.php">Mahasiswa Membayar</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="../../logout.php">Keluar</a>
                </li>

            </ul>
        </div>
    </div>
</nav>

<!-- Script JS Bootstrap WAJIB -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
