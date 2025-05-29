<?php App\Cores\Views::extend('layout.app') ?>

<?php App\Cores\Views::startSection('content') ?>
<div class="pagetitle">
    <h1>Edit Peserta Qurban</h1>
</div>

<section class="section">
    <div class="card">
        <div class="card-body pt-3">
            <form action="/qurban/<?= $qurban->id ?>/update" method="POST">
                <div class="mb-3">
                    <label>Nama Peserta (NIK)</label>
                    <select name="user_id" class="form-select" required>
                        <?php foreach ($users as $u): ?>
                            <option value="<?= $u->id ?>" <?= $qurban->user_id == $u->id ? 'selected' : '' ?>>
                                <?= $u->name ?> (<?= $u->nik ?>)
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Jenis Hewan</label>
                    <select name="jenis_hewan" class="form-select" required>
                        <option value="kambing" <?= $qurban->jenis_hewan === 'kambing' ? 'selected' : '' ?>>Kambing
                        </option>
                        <option value="sapi" <?= $qurban->jenis_hewan === 'sapi' ? 'selected' : '' ?>>Sapi</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Jumlah Bagian</label>
                    <input type="number" name="jumlah" class="form-control" value="<?= $qurban->jumlah ?>" min="1"
                        required>
                </div>

                <div class="mb-3">
                    <label>Status Pembayaran</label>
                    <select name="status_bayar" class="form-select" required>
                        <option value="belum" <?= $qurban->status_bayar === 'belum' ? 'selected' : '' ?>>Belum</option>
                        <option value="lunas" <?= $qurban->status_bayar === 'lunas' ? 'selected' : '' ?>>Lunas</option>
                    </select>
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="/qurban" class="btn btn-secondary">Batal</a>
            </form>
        </div>
    </div>
</section>
<?php App\Cores\Views::endSection() ?>