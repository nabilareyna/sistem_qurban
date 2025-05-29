<?php App\Cores\Views::extend('layout.app') ?>

<?php App\Cores\Views::startSection('content') ?>
<div class="pagetitle">
    <h1>Distribusi Daging Qurban</h1>
</div>

<section class="section">
    <a href="/distribusi/create" class="btn btn-success mb-3">+ Tambah Distribusi</a>

    <div class="row mb-3">
        <div class="col-md-4">
            <div class="card bg-light border">
                <div class="card-body">
                    <h5>Total Daging</h5>
                    <p class="fw-bold"><?= number_format($total, 0, ',', '.') ?> gram</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white border">
                <div class="card-body">
                    <h5>Sudah Dibagikan</h5>
                    <p class="fw-bold"><?= number_format($terdistribusi, 0, ',', '.') ?> gram</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-warning border">
                <div class="card-body">
                    <h5>Sisa Daging</h5>
                    <p class="fw-bold"><?= number_format($sisa, 0, ',', '.') ?> gram</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-body pt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jumlah Daging (gram)</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($distribusi as $d): ?>
                        <tr>
                            <td><?= $d->nik ?></td>
                            <td><?= $d->name ?></td>
                            <td><?= number_format($d->jumlah_daging, 0, ',', '.') ?></td>
                            <td>
                                <span class="badge bg-<?= $d->status_ambil === 'diambil' ? 'success' : 'secondary' ?>">
                                    <?= ucfirst($d->status_ambil) ?>
                                </span>
                            </td>
                            <td>
                                <a href="/distribusi/<?= $d->id ?>/edit" class="btn btn-sm btn-primary">Edit</a>
                                <a href="/distribusi/<?= $d->id ?>/delete" class="btn btn-sm btn-danger"
                                    onclick="return confirm('Hapus data ini?')">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php App\Cores\Views::endSection() ?>