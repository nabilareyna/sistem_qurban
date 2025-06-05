<?php App\Cores\Views::extend('layout.app') ?>

<?php App\Cores\Views::startSection('content') ?>
<h1>Kelola Pengguna</h1>
<div class="card w-60">
    <div class="table-responsive">
        <table class="table align-items-center mb-0">
            <thead>
                <tr>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Username</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Role</th>
                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $u): ?>
                    <tr>
                        <td>
                            <p class="mb-0 text-xs"><?= $u->name ?></p>
                        </td>
                        <td>
                            <p class="mb-0 text-xs"><?= $u->username ?></p>
                        </td>
                        <td>
                            <p class="mb-0 text-xs"><?= $u->role ?></p>
                        </td>
                        <td>
                            <div class="d-flex">
                                <span class="mx-2"><a href="/admin/users/<?= $u->id ?>/edit"
                                        class="btn btn-sm btn-primary text-xs">Edit</a></span>
                                <span>
                                    <form action="/admin/users/<?= $u->id ?>/delete" method="post">
                                        <input type="submit" class="btn btn-sm btn-danger text-xs" value="Hapus" />
                                    </form>
                                </span>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?php App\Cores\Views::endSection() ?>