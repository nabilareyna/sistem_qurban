<?php App\Cores\Views::extend('layout.app') ?>
<?php App\Cores\Views::startSection('content') ?>

<div class="pagetitle">
    <h1>Edit Distribusi Daging</h1>
</div>

<section class="section">
    <div class="card">
        <div class="card-body pt-3">

            <form action="/distribusi/<?= $data->id ?>/update" method="POST">
                <div class="mb-3">
                    <label for="user_id" class="form-label">Nama Warga (NIK)</label>
                    <select name="user_id" class="form-select" required>
                        <?php foreach ($users as $u): ?>
                            <option value="<?= $u->id ?>" <?= $data->user_id == $u->id ? 'selected' : '' ?>>
                                <?= $u->name ?> (<?= $u->nik ?>)
                            </option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jumlah_daging" class="form-label">Jumlah Daging (gram)</label>
                    <input type="number" name="jumlah_daging" class="form-control" value="<?= $data->jumlah_daging ?>"
                        min="100" step="10" required>
                </div>

                <div class="mb-3">
                    <label for="status_ambil" class="form-label">Status Pengambilan</label>
                    <select name="status_ambil" class="form-select">
                        <option value="belum" <?= $data->status_ambil === 'belum' ? 'selected' : '' ?>>Belum Diambil
                        </option>
                        <option value="diambil" <?= $data->status_ambil === 'diambil' ? 'selected' : '' ?>>Sudah Diambil
                        </option>
                    </select>
                </div>

                <button class="btn btn-primary">Simpan Perubahan</button>
                <a href="/distribusi" class="btn btn-secondary">Batal</a>
            </form>

        </div>
    </div>
</section>

<?php App\Cores\Views::endSection() ?>