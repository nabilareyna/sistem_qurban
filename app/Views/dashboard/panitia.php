<?php App\Cores\Views::extend('layout.app') ?>

<?php App\Cores\Views::startSection('content') ?>
<h1>Dashboard Panitia</h1>
<p>Selamat datang, <?= $user->name ?>. Kamu bisa melihat data hewan qurban, rekap distribusi, dan cetak laporan.</p>
<?php App\Cores\Views::endSection() ?>
