<?php App\Cores\Views::extend('layout.app') ?>
<?php App\Cores\Views::startSection('content') ?>

<h4>Detail Data Distribusi</h4>

<div class="card">
    <div class="card-body">
        <p><strong>Nama:</strong> <?= htmlspecialchars($data->name) ?></p>
        <p><strong>NIK:</strong> <?= $data->nik ?></p>
        <p><strong>Jatah Daging:</strong> <?= number_format($data->jumlah_daging) ?> gram</p>
        <p><strong>Status:</strong> <?= $data->status_ambil ?></p>

        <?php if ($data->status_ambil === 'belum'): ?>
            <a href="/scan/confirm/<?= $data->id ?>" class="btn btn-primary" onclick="return confirm('Konfirmasi pengambilan?')">Konfirmasi Ambil</a>
        <?php else: ?>
            <div class="alert alert-success">Daging sudah diambil.</div>
        <?php endif; ?>
    </div>
</div>

<a href="/scan" class="btn btn-secondary mt-3">Kembali</a>

<?php App\Cores\Views::endSection() ?>
