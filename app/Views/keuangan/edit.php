<?php App\Cores\Views::extend('layout.app') ?>
<?php App\Cores\Views::startSection('content') ?>

<div class="pagetitle">
    <h1>Edit Transaksi</h1>
</div>

<section class="section">
    <div class="card">
        <div class="card-body pt-3">
            <form action="/admin/keuangan/<?= $data->id ?>/update" method="POST">

                <div class="mb-3">
                    <label>Tipe Transaksi</label>
                    <select name="tipe" class="form-select" required>
                        <option value="masuk" <?= $data->tipe === 'masuk' ? 'selected' : '' ?>>Pemasukan</option>
                        <option value="keluar" <?= $data->tipe === 'keluar' ? 'selected' : '' ?>>Pengeluaran</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Kategori</label>
                    <input type="text" name="kategori" class="form-control"
                        value="<?= htmlspecialchars($data->kategori) ?>" required>
                </div>

                <div class="mb-3">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" value="<?= $data->jumlah ?>" required>
                </div>

                <div class="mb-3">
                    <label>Catatan (Opsional)</label>
                    <textarea name="catatan" class="form-control"><?= htmlspecialchars($data->catatan) ?></textarea>
                </div>

                <button class="btn btn-primary">Simpan Perubahan</button>
                <a href="/admin/keuangan" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</section>

<?php App\Cores\Views::endSection() ?>