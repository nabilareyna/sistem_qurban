<?php App\Cores\Views::extend('layout.app') ?>
<?php App\Cores\Views::startSection('content') ?>

<div class="pagetitle">
    <div class="d-flex justify-content-between align-items-center">
        <h1>Edit Distribusi Daging</h1>
        <div>
            <a href="/admin/distribusi" class="btn btn-secondary">
                <i class="fas fa-arrow-left me-1"></i> Kembali
            </a>
        </div>
    </div>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="/admin/distribusi">Distribusi</a></li>
            <li class="breadcrumb-item active">Edit</li>
        </ol>
    </nav>
</div>

<section class="section">
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Edit Data Distribusi</h5>

                    <!-- Tampilkan error jika ada -->
                    <?php if (App\Cores\Flash::has('error_user_id')): ?>
                        <div class="alert alert-danger"><?= App\Cores\Flash::get('error_user_id') ?></div>
                    <?php endif; ?>

                    <?php if (App\Cores\Flash::has('error_jumlah_daging')): ?>
                        <div class="alert alert-danger"><?= App\Cores\Flash::get('error_jumlah_daging') ?></div>
                    <?php endif; ?>

                    <form action="/admin/distribusi/<?= $data->id ?>/update" method="POST">
                        <div class="mb-3">
                            <label for="user_id" class="form-label fw-bold">Penerima</label>
                            <select name="user_id"
                                class="form-select <?= App\Cores\Flash::has('error_user_id') ? 'is-invalid' : '' ?>"
                                required>
                                <?php foreach ($users as $u): ?>
                                    <option value="<?= $u->id ?>" <?= (App\Cores\Flash::get('old_user_id', $data->user_id) == $u->id ? 'selected' : '') ?>>
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
                                    value="<?= App\Cores\Flash::get('old_jumlah_daging', $data->jumlah_daging) ?>"
                                    min="100" step="10" required>
                                <span class="input-group-text">gram</span>
                            </div>
                            <small class="text-muted">
                                <?= number_format(App\Cores\Flash::get('old_jumlah_daging', $data->jumlah_daging) / 1000, 2) ?>
                                kg
                            </small>
                            <?php if (App\Cores\Flash::has('error_jumlah_daging')): ?>
                                <div class="invalid-feedback">
                                    <?= App\Cores\Flash::get('error_jumlah_daging') ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="mb-3">
                            <label for="status_ambil" class="form-label fw-bold">Status Pengambilan</label>
                            <select name="status_ambil" class="form-select">
                                <option value="belum" <?= (App\Cores\Flash::get('old_status_ambil', $data->status_ambil) == 'belum' ? 'selected' : '') ?>>Belum Diambil</option>
                                <option value="sudah" <?= (App\Cores\Flash::get('old_status_ambil', $data->status_ambil) == 'sudah' ? 'selected' : '') ?>>Sudah Diambil</option>
                            </select>
                        </div>

                        <?php if ($data->status_ambil === 'sudah'): ?>
                            <div class="alert alert-success">
                                <i class="fas fa-check-circle me-1"></i>
                                Daging sudah diambil pada <?= date('d M Y H:i', strtotime($data->updated_at)) ?>
                            </div>
                        <?php endif; ?>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <a href="/admin/distribusi" class="btn btn-outline-secondary me-md-2">
                                <i class="fas fa-times me-1"></i> Batal
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-1"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-lg-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informasi Distribusi</h5>

                    <div class="list-group">
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span>ID Distribusi</span>
                            <span class="badge bg-primary">#<?= $data->id ?></span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Tanggal Dibuat</span>
                            <span><?= date('d M Y', strtotime($data->created_at)) ?></span>
                        </div>
                        <div class="list-group-item d-flex justify-content-between align-items-center">
                            <span>Terakhir Diupdate</span>
                            <span><?= date('d M Y H:i', strtotime($data->updated_at)) ?></span>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="/distribusi/kartu/<?= $data->id ?>" class="btn btn-outline-info w-100" target="_blank">
                            <i class="fas fa-qrcode me-1"></i> Lihat Kartu QR
                        </a>
                    </div>

                    <div class="alert alert-warning mt-3">
                        <i class="fas fa-exclamation-triangle me-1"></i>
                        Perubahan data distribusi akan mempengaruhi laporan dan statistik sistem
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php App\Cores\Views::endSection() ?>