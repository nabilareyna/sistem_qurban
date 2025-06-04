<?php App\Cores\Views::extend('layout.app') ?>

<?php App\Cores\Views::startSection('content') ?>
<h4 class="mb-4">Selamat datang, <?= htmlspecialchars($user->name) ?>!</h4>

<div class="row">
    <div class="col-md-3">
        <div class="card text-bg-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Pengguna</h5>
                <p class="card-text fs-4"><?= $statistik['total_users'] ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-bg-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Peserta Qurban</h5>
                <p class="card-text fs-4"><?= $statistik['total_berqurban'] ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-bg-warning mb-3">
            <div class="card-body">
                <h5 class="card-title">Panitia</h5>
                <p class="card-text fs-4"><?= $statistik['total_panitia'] ?></p>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card text-bg-danger mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Hewan</h5>
                <p class="card-text fs-4"><?= $statistik['total_hewan'] ?></p>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-4">
        <div class="card border-success mb-3">
            <div class="card-body">
                <h5 class="card-title">Total Daging</h5>
                <p class="card-text fs-5"><?= number_format($statistik['total_daging'] / 1000, 2) ?> kg</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-primary mb-3">
            <div class="card-body">
                <h5 class="card-title">Sudah Terdistribusi</h5>
                <p class="card-text fs-5"><?= number_format($statistik['terdistribusi'] / 1000, 2) ?> kg</p>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-danger mb-3">
            <div class="card-body">
                <h5 class="card-title">Sisa Daging</h5>
                <p class="card-text fs-5"><?= number_format($statistik['sisa'] / 1000, 2) ?> kg</p>
            </div>
        </div>
    </div>
</div>

<?php App\Cores\Views::endSection() ?>