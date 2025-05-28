<?php App\Cores\Views::extend('layout.app') ?>

<?php App\Cores\Views::startSection('content') ?>
<div class="pagetitle">
    <h1>Edit Pengguna</h1>
</div>

<section class="section">
    <div class="card">
        <div class="card-body pt-3">

            <form action="/admin/users/<?= $edit->id ?>/update" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($edit->name) ?>"
                        required>
                </div>

                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control" name="username"
                        value="<?= htmlspecialchars($edit->username) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">Password (biarkan kosong jika tidak diubah)</label>
                    <input type="password" class="form-control" name="password">
                </div>

                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select name="role" class="form-select" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin" <?= $edit->role === 'admin' ? 'selected' : '' ?>>Admin</option>
                        <option value="panitia" <?= $edit->role === 'panitia' ? 'selected' : '' ?>>Panitia</option>
                        <option value="berqurban" <?= $edit->role === 'berqurban' ? 'selected' : '' ?>>Berqurban</option>
                        <option value="warga" <?= $edit->role === 'warga' ? 'selected' : '' ?>>Warga</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                <a href="/admin/users" class="btn btn-secondary">Kembali</a>
            </form>

        </div>
    </div>
</section>
<?php App\Cores\Views::endSection() ?>