<?php App\Cores\Views::extend('layout.app') ?>

<?php App\Cores\Views::startSection('content') ?>
<div class="pagetitle">
    <h1>Daftar Peserta Qurban</h1>
</div>

<section class="section">
    <a href="/qurban/create" class="btn btn-success mb-3">+ Tambah Peserta</a>

    <div class="card">
        <div class="card-body pt-3">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Nama Warga</th>
                        <th>NIK</th>
                        <th>Jenis Hewan</th>
                        <th>Jumlah Bagian</th>
                        <th>Harga Hewan</th>
                        <th>Status Bayar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($qurbans) > 0): ?>
                        <?php $no = 1;
                        foreach ($qurbans as $row): ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= htmlspecialchars($row->user_name) ?></td>
                                <td><?= htmlspecialchars($row->nik) ?></td>
                                <td><?= ucfirst($row->hewan_jenis) ?></td>
                                <td><?= $row->jumlah ?> bagian</td>
                                <td>Rp<?= number_format(	$row->hewan_harga, 0, ',', '.') ?></td>
                                <td>
                                    <?php if ($row->status_bayar === 'lunas'): ?>
                                        <span class="badge bg-success">Lunas</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning text-dark">Belum</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="/qurban/edit/<?= $row->id ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="/qurban/delete/<?= $row->id ?>" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="text-center">Belum ada data peserta qurban.</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php App\Cores\Views::endSection() ?>