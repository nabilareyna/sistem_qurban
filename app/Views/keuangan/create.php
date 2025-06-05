<?php App\Cores\Views::extend('layout.app') ?>
<?php App\Cores\Views::startSection('content') ?>

<div class="pagetitle">
    <h1>Tambah Transaksi</h1>
</div>

<section class="section">
    <div class="card">
        <div class="card-body pt-3">
            <form action="/admin/keuangan/store" method="POST">

                <div class="mb-3">
                    <label>Tipe Transaksi</label>
                    <select name="tipe" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <option value="masuk">Pemasukan</option>
                        <option value="keluar">Pengeluaran</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Kategori</label>
                    <input type="text" name="kategori" class="form-control" required
                        placeholder="Misal: Iuran warga, Beli sapi">
                </div>

                <div class="mb-3">
                    <label>Jumlah</label>
                    <input type="number" name="jumlah" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Catatan (Opsional)</label>
                    <textarea name="catatan" class="form-control" rows="3"></textarea>
                </div>

                <div class="mb-3">
                    <label for="created_at" class="form-label fw-bold">Tanggal</label>
                    <input type="date" name="created_at" class="form-control"
                        value="<?= App\Cores\Flash::get('old_created_at') ?? date('Y-m-d') ?>" required>
                    <small class="text-muted">Tanggal data keuangan dimasukkan</small>
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="/admin/keuangan" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</section>

<?php App\Cores\Views::endSection() ?>