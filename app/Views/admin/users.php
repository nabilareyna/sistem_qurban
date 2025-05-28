<?php App\Cores\Views::extend('layout.app') ?>

<?php App\Cores\Views::startSection('content') ?>
<h1>Kelola Pengguna</h1>
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Username</th>
            <th>Role</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $u): ?>
            <tr>
                <td><?= $u->name ?></td>
                <td><?= $u->username ?></td>
                <td><?= $u->role ?></td>
                <td>
                    <a href="/admin/users/<?= $u->id ?>/edit" class="btn btn-sm btn-primary">Edit</a>
                    <form action="/admin/users/<?= $u->id ?>/delete" method="post">
                        <input type="submit" class="btn btn-sm btn-danger" value="Hapus" />
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>
<?php App\Cores\Views::endSection() ?>
