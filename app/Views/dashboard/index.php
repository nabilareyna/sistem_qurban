<?php App\Cores\Views::extend('layout.app') ?>

<?php App\Cores\Views::startSection('content') ?>
<div class="container mt-5">
    <div class="alert alert-primary">
        <h4 class="alert-heading">Selamat datang, <?= htmlspecialchars($name) ?>!</h4>
        <p>Anda login sebagai <strong><?= strtoupper($role) ?></strong></p>
    </div>

    <?php if ($role === 'admin'): ?>
        <p>Fitur Admin: Kelola user, laporan, dll.</p>
    <?php elseif ($role === 'panitia'): ?>
        <p>Fitur Panitia: Lihat daftar qurban, rekap distribusi daging, dll.</p>
    <?php elseif ($role === 'berqurban'): ?>
        <p>Fitur Peserta Qurban: Cek status qurban, lihat data pembayaran, dll.</p>
    <?php else: ?>
        <p>Fitur Warga: Lihat jadwal pembagian, unduh kartu QR, dll.</p>
    <?php endif; ?>
</div>
<?php App\Cores\Views::endSection() ?>
