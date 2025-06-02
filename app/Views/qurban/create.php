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
                    <label for="user_id" class="form-label">Pilih Warga</label>
                    <select name="user_id" id="user_id" class="form-select">
                        <?php foreach ($users as $user): ?>
                            <option value="<?= $user->id ?>"><?= $user->name ?> (<?= $user->nik ?>)</option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="hewan_id" class="form-label">Pilih Hewan</label>
                    <select name="hewan_id" id="hewan_id" class="form-select">
                        <?php foreach ($hewans as $hewan): ?>
                            <option value="<?= $hewan->id ?>">
                                <?= ucfirst($hewan->jenis) ?> - Rp<?= number_format($hewan->harga, 0, ',', '.') ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jumlah" class="form-label">Jumlah Bagian</label>
                    <input type="number" class="form-control" name="jumlah" id="jumlah" value="1" min="1" max="7">
                </div>

                <div class="mb-3">
                    <label for="status_bayar" class="form-label">Status Bayar</label>
                    <select name="status_bayar" id="status_bayar" class="form-select">
                        <option value="belum">Belum</option>
                        <option value="lunas">Lunas</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </div>
</section>
<?php App\Cores\Views::endSection() ?>