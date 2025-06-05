<?php App\Cores\Views::extend('layout.app') ?>
<?php App\Cores\Views::startSection('content') ?>

<div class="pagetitle">
    <h1>Keuangan Qurban</h1>
</div>

<section class="section">
    <a href="/admin/keuangan/create" class="btn btn-success mb-3">+ Tambah Transaksi</a>

    <div class="row mb-3">
        <div class="col-md-4">
            <div class="card border-success shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-success">Pemasukan</h5>
                    <h3 class="fw-bold text-success">Rp<?= number_format($masuk, 0, ',', '.') ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-warning shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-danger">Pengeluaran</h5>
                    <h3 class="fw-bold text-danger">Rp<?= number_format($keluar, 0, ',', '.') ?></h3>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-primary bg-light">
                <div class="card-body">
                    <h5 class="card-title text-primary">Saldo Akhir</h5>
                    <h3 class="fw-bold text-primary">Rp<?= number_format($saldo, 0, ',', '.') ?></h3>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Tipe</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Kategori</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Catatan</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Tanggal</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($keuangan as $k): ?>
                        <tr>
                            <td class="mb-0 text-xs">
                                <span class="badge bg-<?= $k->tipe === 'masuk' ? 'success' : 'danger' ?>">
                                    <?= ucfirst($k->tipe) ?>
                                </span>
                            </td>
                            <td class="mb-0 text-xs"><?= htmlspecialchars($k->kategori) ?></td>
                            <td class="mb-0 text-xs">Rp<?= number_format($k->jumlah, 0, ',', '.') ?></td>
                            <td class="mb-0 text-xs"><?= nl2br(htmlspecialchars($k->catatan)) ?></td>
                            <td class="mb-0 text-xs"><?= date('d-m-Y H:i', strtotime($k->created_at)) ?></td>
                            <td class="mb-0 text-xs">
                                <a href="/admin/keuangan/<?= $k->id ?>/edit" class="btn btn-sm btn-primary">Edit</a>
                                <a href="/admin/keuangan/<?= $k->id ?>/delete"
                                    onclick="return confirm('Hapus transaksi ini?')" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>

<?php App\Cores\Views::endSection() ?>