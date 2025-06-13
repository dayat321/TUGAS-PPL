<?php
// Data Dummy
$nim = "2210112233";
$data_pembayaran = [
    ["jenis" => "UKT", "periode" => "Ganjil", "tahun" => "2021", "jumlah" => 3000000, "tgl_setor" => "2021-08-10", "keterangan" => "Lunas", "tgl_input" => "2021-08-11"],
    ["jenis" => "DPP", "periode" => "Genap", "tahun" => "2021", "jumlah" => 1500000, "tgl_setor" => "2021-02-15", "keterangan" => "Lunas", "tgl_input" => "2021-02-16"],
    ["jenis" => "UKT", "periode" => "Ganjil", "tahun" => "2022", "jumlah" => 3000000, "tgl_setor" => "2022-08-09", "keterangan" => "Lunas", "tgl_input" => "2022-08-10"],
    ["jenis" => "DPP", "periode" => "Genap", "tahun" => "2022", "jumlah" => 1500000, "tgl_setor" => "2022-02-12", "keterangan" => "Lunas", "tgl_input" => "2022-02-13"],
    ["jenis" => "UKT", "periode" => "Ganjil", "tahun" => "2023", "jumlah" => 3000000, "tgl_setor" => "2023-08-01", "keterangan" => "Lunas", "tgl_input" => "2023-08-02"],
];

// Filter
$filter_jenis = $_GET['jenis'] ?? 'Semua';
$filter_periode = $_GET['periode'] ?? 'Semua';
$filter_tahun = $_GET['tahun'] ?? 'Semua';

$filtered_data = array_filter($data_pembayaran, function($row) use ($filter_jenis, $filter_periode, $filter_tahun) {
    return ($filter_jenis === 'Semua' || $row['jenis'] === $filter_jenis) &&
           ($filter_periode === 'Semua' || $row['periode'] === $filter_periode) &&
           ($filter_tahun === 'Semua' || $row['tahun'] === $filter_tahun);
});
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pembayaran Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
<?php include '../navbar_user.php'; ?>

<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5 class="fw-bold">Data Setoran Mahasiswa</h5>
        <a href="#" class="btn btn-outline-primary"><i class="bi bi-printer"></i> Cetak</a>
    </div>

    <form method="get" class="row g-3 align-items-end mb-4">
        <div class="col-md-3">
            <label class="form-label">NIM</label>
            <input type="text" class="form-control" value="<?= $nim ?>" readonly>
        </div>
        <div class="col-md-2">
            <label class="form-label">Jenis Pembayaran</label>
            <select name="jenis" class="form-select">
                <option <?= $filter_jenis == 'Semua' ? 'selected' : '' ?>>Semua</option>
                <option <?= $filter_jenis == 'UKT' ? 'selected' : '' ?>>UKT</option>
                <option <?= $filter_jenis == 'DPP' ? 'selected' : '' ?>>DPP</option>
            </select>
        </div>
        <div class="col-md-2">
            <label class="form-label">Periode</label>
            <select name="periode" class="form-select">
                <option <?= $filter_periode == 'Semua' ? 'selected' : '' ?>>Semua</option>
                <option <?= $filter_periode == 'Ganjil' ? 'selected' : '' ?>>Ganjil</option>
                <option <?= $filter_periode == 'Genap' ? 'selected' : '' ?>>Genap</option>
            </select>
        </div>
        <div class="col-md-2">
            <label class="form-label">Tahun</label>
            <select name="tahun" class="form-select">
                <option <?= $filter_tahun == 'Semua' ? 'selected' : '' ?>>Semua</option>
                <?php foreach (range(2021, 2024) as $th): ?>
                    <option <?= $filter_tahun == $th ? 'selected' : '' ?>><?= $th ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="col-md-2">
            <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i> Cari</button>
        </div>
    </form>

    <div class="d-flex justify-content-between mb-2">
        <span class="text-muted">Terdapat: <?= count($filtered_data) ?> data</span>
        <span class="text-muted">Jumlah Halaman: 1 dari 1</span>
    </div>

    <div class="table-responsive bg-white shadow-sm rounded mb-4">
        <table class="table table-striped mb-0">
            <thead class="table-primary">
                <tr>
                    <th>NIM</th>
                    <th>Jenis</th>
                    <th>Periode</th>
                    <th>Tahun</th>
                    <th>Jumlah</th>
                    <th>Tgl. Setor</th>
                    <th>Keterangan</th>
                    <th>Tgl. Input</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($filtered_data as $row): ?>
                    <tr>
                        <td><?= $nim ?></td>
                        <td><?= $row['jenis'] ?></td>
                        <td><?= $row['periode'] ?></td>
                        <td><?= $row['tahun'] ?></td>
                        <td>Rp <?= number_format($row['jumlah'], 0, ',', '.') ?></td>
                        <td><?= $row['tgl_setor'] ?></td>
                        <td><?= $row['keterangan'] ?></td>
                        <td><?= $row['tgl_input'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php
    $ukt_total = $dpp_total = [];
    foreach ($data_pembayaran as $d) {
        if ($d['jenis'] == 'UKT') {
            @$ukt_total[$d['tahun']] += $d['jumlah'];
        } elseif ($d['jenis'] == 'DPP') {
            @$dpp_total[$d['tahun']] += $d['jumlah'];
        }
    }
    ?>

    <div class="bg-light p-3 rounded shadow-sm">
        <?php foreach (range(2021, 2023) as $tahun): ?>
            <p class="mb-1">Total Pembayaran UKT hingga tahun <?= $tahun ?>: Rp <?= number_format(array_sum(array_filter($ukt_total, fn($k) => $k <= $tahun, ARRAY_FILTER_USE_KEY)), 0, ',', '.') ?></p>
            <p class="mb-1">Total Pembayaran DPP hingga tahun <?= $tahun ?>: Rp <?= number_format(array_sum(array_filter($dpp_total, fn($k) => $k <= $tahun, ARRAY_FILTER_USE_KEY)), 0, ',', '.') ?></p>
        <?php endforeach; ?>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<?php include '../../footer.php'; ?>
</body>
</html>
