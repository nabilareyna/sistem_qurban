<?php App\Cores\Views::extend('layout.app') ?>

<?php App\Cores\Views::startSection('content') ?>
<div class="pagetitle">
    <h1>Daftar Peserta Qurban</h1>
</div>

<section class="section">
    <a href="/qurban/create" class="btn btn-success mb-3">+ Tambah Peserta</a>

    <div class="card">
        <div class="card-body pt-3 table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">#</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Nama Warga</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">NIK</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jenis Hewan</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Jumlah Bagian</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga Hewan</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Status Bayar</th>
                        <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (count($qurbans) > 0): ?>
                        <?php $no = 1;
                        foreach ($qurbans as $row): ?>
                            <tr>
                                <td class="mb-0 text-xs"><?= $no++ ?></td>
                                <td class="mb-0 text-xs"><?= htmlspecialchars($row->user_name) ?></td>
                                <td class="mb-0 text-xs"><?= htmlspecialchars($row->nik) ?></td>
                                <td class="mb-0 text-xs"><?= ucfirst($row->hewan_jenis) ?></td>
                                <td class="mb-0 text-xs"><?= $row->jumlah ?> bagian</td>
                                <td class="mb-0 text-xs">Rp<?= number_format(	$row->hewan_harga, 0, ',', '.') ?></td>
                                <td class="mb-0 text-xs">
                                    <?php if ($row->status_bayar === 'lunas'): ?>
                                        <span class="badge bg-success">Lunas</span>
                                    <?php else: ?>
                                        <span class="badge bg-warning text-dark">Belum</span>
                                    <?php endif; ?>
                                </td>
                                <td class="mb-0 text-xs">
                                    <a href="/qurban/edit/<?= $row->id ?>" class="btn btn-sm btn-primary">Edit</a>
                                    <a href="/qurban/delete/<?= $row->id ?>" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="8" class="mb-0 text-xs">Belum ada data peserta qurban.</td>
                        </tr>
                    <?php endif ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
<?php App\Cores\Views::endSection() ?>