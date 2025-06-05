<?php App\Cores\Views::extend('layout.app') ?>
<?php App\Cores\Views::startSection('content') ?>
<div class="content-area">
            <!-- Welcome Section -->
            <div class="welcome-section">
                <div class="welcome-title">Selamat datang, <?= htmlspecialchars($user->name) ?>!</div>
                <div class="welcome-subtitle">Kelola sistem qurban komunitas dengan mudah dan efisien</div>
            </div>

            <!-- Stats Cards -->
            <div class="stats-grid">
                <div class="stat-card orange">
                    <div class="stat-header">
                        <div>
                            <div class="stat-value"><?= number_format($statistik['total_users']) ?></div>
                            <div class="stat-label">Total Pengguna</div>
                        </div>
                        <div class="stat-icon orange">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card green">
                    <div class="stat-header">
                        <div>
                            <div class="stat-value"><?= number_format($statistik['total_berqurban']) ?></div>
                            <div class="stat-label">Peserta Qurban</div>
                        </div>
                        <div class="stat-icon green">
                            <i class="fas fa-clipboard-check"></i>
                        </div>
                    </div>
                </div>

                <div class="stat-card yellow">
                    <div class="stat-header">
                        <div>
                            <div class="stat-value"><?= number_format($statistik['total_panitia']) ?></div>
                            <div class="stat-label">Panitia</div>
                        </div>
                        <div class="stat-icon yellow">
                            <i class="fas fa-user-tie"></i>
                        </div>
                    </div>
                    <div class="stat-change positive">
                        <i class="fas fa-check"></i> Semua aktif
                    </div>
                </div>

                <div class="stat-card red">
                    <div class="stat-header">
                        <div>
                            <div class="stat-value"><?= number_format($statistik['total_hewan']) ?></div>
                            <div class="stat-label">Total Hewan</div>
                        </div>
                        <div class="stat-icon red">
                            <i class="fas fa-paw"></i>
                        </div>
                    </div>
                    <div class="stat-change positive">
                        <i class="fas fa-check-circle"></i> Siap disembelih
                    </div>
                </div>
            </div>

            <!-- Distribution Cards -->
            <div class="distribution-grid">
                <div class="distribution-card">
                    <div class="distribution-title">
                        <i class="fas fa-weight me-2 text-primary"></i>
                        Total Daging
                    </div>
                    <div class="distribution-value">
                        <?= number_format($statistik['total_daging'] / 1000, 2) ?>
                        <span class="distribution-unit">kg</span>
                    </div>
                    <div class="progress-bar-custom">
                        <div class="progress-fill" style="width: 100%"></div>
                    </div>
                </div>

                <div class="distribution-card">
                    <div class="distribution-title">
                        <i class="fas fa-check-circle me-2 text-success"></i>
                        Sudah Terdistribusi
                    </div>
                    <div class="distribution-value">
                        <?= number_format($statistik['terdistribusi'] / 1000, 2) ?>
                        <span class="distribution-unit">kg</span>
                    </div>
                    <div class="progress-bar-custom">
                        <div class="progress-fill" style="width: <?= ($statistik['terdistribusi'] / $statistik['total_daging']) * 100 ?>%"></div>
                    </div>
                </div>

                <div class="distribution-card">
                    <div class="distribution-title">
                        <i class="fas fa-clock me-2 text-warning"></i>
                        Sisa Daging
                    </div>
                    <div class="distribution-value">
                        <?= number_format($statistik['sisa'], 2) ?>
                        <span class="distribution-unit">kg</span>
                    </div>
                    <div class="progress-bar-custom">
                        <div class="progress-fill" style="width: <?= ($statistik['sisa'] / $statistik['total_daging']) * 100 ?>%"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php App\Cores\Views::endSection() ?>