<?php App\Cores\Views::extend('layout.app') ?>

<?php App\Cores\Views::startSection('content') ?>
<div class="row">
    <div class="col">
        <a href="/add" class="btn btn-primary">Tambah</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col">Password</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $key => $user): ?>

                    <tr>
                        <th scope="row"><?= $key + 1 ?></th>
                        <td><?= $user->username ?></td>
                        <td><?= $user->password ?></td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="/edit/<?= $user->id ?>" type="button" class="btn btn-warning">Edit</a>
                                <form action="/delete/<?= $user->id ?>" method="post">
                                    <input type="submit" class="btn btn-danger" value="Hapus" />
                                </form>
                            </div>
                        </td>
                    </tr>

                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>
<?php App\Cores\Views::endSection() ?>

<?php App\Cores\Views::startSection('head') ?>
<style>
    h1 {
        color: blue;
    }
</style>
<?php App\Cores\Views::endSection() ?>

<?php App\Cores\Views::startSection('js') ?>
<script>
    console.log('This is a JavaScript section');
</script>
<?php App\Cores\Views::endSection() ?>