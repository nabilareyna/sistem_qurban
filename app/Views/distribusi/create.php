<?php App\Cores\Views::extend('layout.app') ?>
<?php App\Cores\Views::startSection('content') ?>

<div class="pagetitle">
    <h1>Tambah Distribusi Daging</h1>
</div>

<section class="section">
    <div class="card">
        <div class="card-body pt-3">

            <form action="/distribusi/store" method="POST">
                <div class="mb-3">
                    <label for="user_id" class="form-label">Nama Warga (NIK)</label>
                    <select name="user_id" class="form-select" required>
                        <option value="">-- Pilih Warga --</option>
                        <?php foreach ($users as $u): ?>
                            <option value="<?= $u->id ?>"><?= $u->name ?> (<?= $u->nik ?>)</option>
                        <?php endforeach ?>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="jumlah_daging" class="form-label">Jumlah Daging (gram)</label>
                    <input type="number" name="jumlah_daging" class="form-control" min="100" step="10" required>
                </div>

                <div class="mb-3">
                    <label for="status_ambil" class="form-label">Status Pengambilan</label>
                    <select name="status_ambil" class="form-select">
                        <option value="belum">Belum Diambil</option>
                        <option value="diambil">Sudah Diambil</option>
                    </select>
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="/distribusi" class="btn btn-secondary">Batal</a>
            </form>

        </div>
    </div>
</section>

<?php App\Cores\Views::endSection() ?>