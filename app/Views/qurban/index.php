<?php App\Cores\Views::extend('layout.app') ?>

<?php App\Cores\Views::startSection('content') ?>
<div class="pagetitle">
    <h1>Daftar Peserta Qurban</h1>
</div>

<section class="section">
    <a href="/qurban/create" class="btn btn-success mb-3">+ Tambah Peserta</a>

    <div class="card">
        <div class="card-body pt-3">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Jenis Hewan</th>
                        <th>Jumlah</th>
                        <th>Biaya</th>
                        <th>Status Bayar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($qurbans as $q): ?>
                        <tr>
                            <td><?= $q->nik ?></td>
                            <td><?= $q->name ?></td>
                            <td><?= ucfirst($q->jenis_hewan) ?></td>
                            <td><?= $q->jumlah ?></td>
                            <td>Rp<?= number_format($q->biaya, 0, ',', '.') ?></td>
                            <td>
                                <span class="badge bg-<?= $q->status_bayar === 'lunas' ? 'success' : 'warning' ?>">
                                    <?= ucfirst($q->status_bayar) ?>
                                </span>
                            </td>
                            <td>
                                <a href="/qurban/<?= $q->id ?>/edit" class="btn btn-sm btn-primary">Edit</a>
                                <a href="/qurban/<?= $q->id ?>/delete" onclick="return confirm('Yakin hapus?')"
                                    class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php App\Cores\Views::endSection() ?>