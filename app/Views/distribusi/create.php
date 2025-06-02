<?php App\Cores\Views::extend('layout.app') ?>
<?php App\Cores\Views::startSection('content') ?>

<div class="pagetitle">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Tambah Distribusi Daging</h1>
        <div>
            <a href="/distribusi" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/distribusi">Distribusi</a></li>
            <li class="breadcrumb-item active">Tambah</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Tambah Distribusi</h5>

                    <!-- Tampilkan error jika ada -->
                    <?php if (App\Cores\Flash::has('error_user_id')): ?>
                        <div class="alert alert-danger"><?= App\Cores\Flash::get('error_user_id') ?></div>
                    <?php endif; ?>

                    <?php if (App\Cores\Flash::has('error_jumlah_daging')): ?>
                        <div class="alert alert-danger"><?= App\Cores\Flash::get('error_jumlah_daging') ?></div>
                    <?php endif; ?>

                    <form action="/admin/distribusi/store" method="POST">
                        <div class="mb-3">
                            <label for="user_id" class="form-label fw-bold">Penerima</label>
                            <select name="user_id"
                                class="form-select <?= App\Cores\Flash::has('error_user_id') ? 'is-invalid' : '' ?>"
                                required>
                                <option value="">-- Pilih Warga --</option>
                                <?php foreach ($users as $u): ?>
                                    <option value="<?= $u->id ?>" <?= App\Cores\Flash::get('old_user_id') == $u->id ? 'selected' : '' ?>>
                                        <?= $u->name ?> (NIK: <?= $u->nik ?>) - <?= strtoupper($u->role) ?>
                                    </option>
                                <?php endforeach ?>
                            </select>
                            <?php if (App\Cores\Flash::has('error_user_id')): ?>
                                <div class="invalid-feedback">
                                    <?= App\Cores\Flash::get('error_user_id') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="jumlah_daging" class="form-label fw-bold">Jumlah Daging</label>
                            <div class="input-group">
                                <input type="number" name="jumlah_daging"
                                    class="form-control <?= App\Cores\Flash::has('error_jumlah_daging') ? 'is-invalid' : '' ?>"
                                    value="<?= App\Cores\Flash::get('old_jumlah_daging') ?>" min="100" step="10"
                                    required>
                                <span class="input-group-text">gram</span>
                            </div>
                            <small class="text-muted">Contoh: 1000 gram = 1 kg</small>
                            <?php if (App\Cores\Flash::has('error_jumlah_daging')): ?>
                                <div class="invalid-feedback">
                                    <?= App\Cores\Flash::get('error_jumlah_daging') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-4">
                            <label for="status_ambil" class="form-label fw-bold">Status Pengambilan</label>
                            <select name="status_ambil" class="form-select">
                                <option value="belum" <?= App\Cores\Flash::get('old_status_ambil') == 'belum' ? 'selected' : '' ?>>Belum Diambil</option>
                                <option value="sudah" <?= App\Cores\Flash::get('old_status_ambil') == 'sudah' ? 'selected' : '' ?>>Sudah Diambil</option>
                            </select>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="reset" class="btn btn-outline-secondary me-md-2">
                                <i class="fas fa-redo me-1"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Petunjuk Pengisian</h5>
                    <div class="alert alert-info">
                        <ul class="mb-0">
                            <li>Pilih penerima dari daftar warga</li>
                            <li>Masukkan jumlah daging dalam gram</li>
                            <li>1 kg = 1000 gram</li>
                            <li>Status "Sudah Diambil" berarti warga sudah mengambil jatahnya</li>
                            <li>Untuk distribusi otomatis, gunakan tombol "Hitung Otomatis" di halaman distribusi</li>
                        </ul>
                    </div>

                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-1"></i>
                        Pastikan data yang dimasukkan sudah benar karena akan mempengaruhi laporan distribusi
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php App\Cores\Views::endSection() ?>