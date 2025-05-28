<?php App\Cores\Views::extend('layout.app') ?>

<?php App\Cores\Views::startSection('content') ?>
<h1>Dashboard Peserta Qurban</h1>
<p>Halo <?= $user->name ?>! Di sini kamu bisa melihat status qurbanmu, bukti pembayaran, dan distribusi hasil qurban.</p>
<?php App\Cores\Views::endSection() ?>
