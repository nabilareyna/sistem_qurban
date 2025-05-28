<?php App\Cores\Views::extend('layout.app') ?>

<?php App\Cores\Views::startSection('content') ?>
<h1>Dashboard Warga</h1>
<p>Halo <?= $user->name ?>! Kamu bisa melihat jadwal pembagian daging, lokasi pengambilan, dan info qurban lainnya.</p>
<?php App\Cores\Views::endSection() ?>
