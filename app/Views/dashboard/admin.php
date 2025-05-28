<?php App\Cores\Views::extend('layout.app') ?>

<?php App\Cores\Views::startSection('content') ?>
<h1>Dashboard Admin</h1>
<p>Halo, <?= $user->name ?>. Di sini kamu bisa mengelola data user, panitia, qurban, dan laporan.</p>
<?php App\Cores\Views::endSection() ?>