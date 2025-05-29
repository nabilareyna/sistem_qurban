<?php App\Cores\Views::extend('layout.app') ?>

<?php App\Cores\Views::startSection('content') ?>
<div class="pagetitle">
    <h1>Tambah Peserta Qurban</h1>
</div>

<section class="section">
    <div class="card">
        <div class="card-body pt-3">
            <form action="/qurban/store" method="POST">
                <div class="mb-3">
                    <label>Nama Peserta (NIK)</label>
                    <select name="user_id" class="form-select" required>
                        <option value="">-- Pilih --</option>
                        <?php foreach ($users as $u): ?>
                            <option value="<?= $u->id ?>"><?= $u->name ?> (<?= $u->nik ?>)</option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Jenis Hewan</label>
                    <select name="jenis_hewan" class="form-select" required>
                        <option value="kambing">Kambing</option>
                        <option value="sapi">Sapi</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Jumlah Bagian</label>
                    <input type="number" name="jumlah" class="form-control" value="1" min="1" required>
                </div>

                <div class="mb-3">
                    <label>Status Pembayaran</label>
                    <select name="status_bayar" class="form-select" required>
                        <option value="belum">Belum</option>
                        <option value="lunas">Lunas</option>
                    </select>
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="/qurban" class="btn btn-secondary">Kembali</a>
            </form>
        </div>
    </div>
</section>
<?php App\Cores\Views::endSection() ?>