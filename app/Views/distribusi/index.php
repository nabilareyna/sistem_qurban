<?php App\Cores\Views::extend('layout.app') ?>

<?php App\Cores\Views::startSection('content') ?>
<div class="container-fluid">
    <!-- Flash Messages -->
    <?php if ($sisa < 0): ?>
        <div class="alert alert-danger">
            <i class="fas fa-exclamation-triangle me-1"></i>
            <strong>Peringatan!</strong> Total distribusi melebihi stok daging.
            Harap periksa kembali data distribusi.
        </div>
    <?php endif; ?>
    <?php if ($success = App\Cores\Flash::get('success')): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= App\Cores\Flash::get('success') ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <!-- Header dan Tombol Aksi -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Distribusi Daging Qurban</h1>
        <div>
            <form action="/distribusi/hitung-otomatis" method="POST" class="d-inline">
                <button type="submit" class="btn btn-primary me-2">
                    <i class="fas fa-calculator me-1"></i> Hitung Otomatis
                </button>
            </form>
            <a href="/distribusi/create" class="btn btn-success">
                <i class="fas fa-plus me-1"></i> Tambah Manual
            </a>
        </div>
    </div>

    <!-- Statistik Distribusi -->
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="card border-primary shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-primary">Total Daging</h5>
                    <h3 class="mb-0"><?= number_format($total / 1000, 2) ?> kg</h3>
                    <small class="text-muted">200 kg (100 sapi + 100 kambing)</small>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-success">Terdistribusi</h5>
                    <h3 class="mb-0"><?= number_format($terdistribusi / 1000, 2) ?> kg</h3>
                    <small class="text-muted">
                        <?= number_format(($terdistribusi / $total) * 100, 2) ?>% dari total
                    </small>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card <?= $sisa < 0 ? 'border-danger' : 'border-warning' ?> shadow-sm">
                <div class="card-body">
                    <h5 class="card-title <?= $sisa < 0 ? 'text-danger' : 'text-warning' ?>">Sisa Daging</h5>
                    <h3 class="mb-0"><?= number_format($sisa / 1000, 2) ?> kg</h3>
                    <small class="text-muted">
                        <?= $total > 0 ? number_format(($sisa / $total) * 100, 2) : '0' ?>% dari total
                    </small>
                </div>
            </div>
        </div>
    </div>

    <!-- Tabel Distribusi -->
    <div class="card shadow-sm">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table align-items-center mb-0">
                    <thead class="">
                        <tr>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIK</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jatah (gram)</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">QR Code</th>
                            <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($distribusi as $key => $d): ?>
                            <tr>
                                <td class="mb-0 text-xs"><?= $key + 1 ?></td>
                                <td class="mb-0 text-xs"><?= $d->name ?></td>
                                <td class="mb-0 text-xs"><?= $d->nik ?></td>
                                <td class="mb-0 text-xs">
                                    <span class="badge 
                                        <?php
                                        if ($d->role == 'berqurban') {
                                            echo 'bg-success';
                                        } elseif ($d->role == 'panitia') {
                                            echo 'bg-primary';
                                        } else {
                                            echo 'bg-secondary';
                                        }
                                        ?>">
                                        <?= htmlspecialchars($d->role) ?>
                                    </span>

                                </td>
                                <td class="mb-0 text-xs"><?= number_format($d->jumlah_daging) ?> g</td>
                                <td class="mb-0 text-xs">
                                    <?php
                                    $ambilClass = ($d->status_ambil === 'sudah') ? 'bg-success' : 'bg-warning text-dark';
                                    ?>
                                    <span class="badge <?= $ambilClass ?>">
                                        <?= htmlspecialchars($d->status_ambil) ?>
                                    </span>

                                </td>
                                <td class="mb-0 text-xs">
                                    <a href="/distribusi/kartu/<?= $d->id ?>" class="btn btn-sm btn-outline-info"
                                        target="_blank">
                                        <i class="fas fa-qrcode"></i> Kartu
                                    </a>
                                </td>
                                <td class="mb-0 text-xs">
                                    <div class="d-flex gap-1">
                                        <a href="/distribusi/edit/<?= $d->id ?>" class="btn btn-sm btn-warning">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <a href="/distribusi/delete/<?= $d->id ?>" class="btn btn-sm btn-danger"
                                            onclick="return confirm('Hapus distribusi ini?')">Hapus</a>
                                    </div>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>



<!-- Informasi Pembagian -->
<div class="card border-info mt-4">
    <div class="card-header bg-info text-white">
        <i class="fas fa-info-circle me-1"></i> Sistem Pembagian Otomatis
    </div>
    <div class="card-body">
        <p class="mb-1">Sistem pembagian otomatis menggunakan bobot peran:</p>
        <ul class="mb-0">
            <li><strong>Penyumbang (berqurban)</strong>: Bobot 4x</li>
            <li><strong>Panitia</strong>: Bobot 3x</li>
            <li><strong>Warga</strong>: Bobot 1x</li>
            <li><strong>Admin</strong>: Tidak mendapat bagian</li>
        </ul>
    </div>
</div>
</div>
<?php App\Cores\Views::endSection() ?>

<?php App\Cores\Views::startSection('js') ?>
<script>
    // Auto close alert setelah 5 detik
    setTimeout(() => {
        document.querySelectorAll('.alert').forEach(alert => {
            new bootstrap.Alert(alert).close();
        });
    }, 5000);
</script>
<?php App\Cores\Views::endSection() ?>