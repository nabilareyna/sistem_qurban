<?php
$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
?>

<div class="sidebar" id="sidebar">
        <div class="sidebar-header">
            <a href="/dashboard" class="sidebar-brand">
                <div class="brand-icon">
                    <i class="fas fa-heart"></i>
                </div>
                <div class="brand-text">QurbanKita</div>
            </a>
        </div>
        
        <nav class="sidebar-nav">
            <div class="nav-item">
                <a href="/dashboard" class="nav-link <?= $currentPath == '/dashboard' ? 'active' : '' ?>">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </div>
            <?php if ($role === 'admin'): ?>
            <div class="nav-item">
                <a href="/admin/users" class="nav-link <?= $currentPath == '/admin/users' ? 'active' : '' ?>">
                    <i class="fas fa-users"></i>
                    <span>Kelola Pengguna</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="/admin/keuangan" class="nav-link <?= $currentPath == '/admin/keuangan' ? 'active' : '' ?>">
                    <i class="fas fa-chart-line"></i>
                    <span>Data Keuangan</span>
                </a>
            </div>
            <?php endif; ?>
            <?php if ($role === 'admin' || $role === 'panitia'): ?>
            <div class="nav-item">
                <a href="/qurban" class="nav-link <?= $currentPath == '/qurban' ? 'active' : '' ?>">
                    <i class="fas fa-clipboard-list"></i>
                    <span>Peserta Qurban</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="/distribusi" class="nav-link <?= $currentPath == '/distribusi' ? 'active' : '' ?>">
                    <i class="fas fa-truck"></i>
                    <span>List Distribusi</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="/scan" class="nav-link <?= $currentPath == '/scan' ? 'active' : '' ?>">
                    <i class="fas fa-qrcode"></i>
                    <span>Scan QR Code</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="laporan.php" class="nav-link">
                    <i class="fas fa-file-alt"></i>
                    <span>Laporan</span>
                </a>
            </div>
            <div class="nav-item">
                <a href="pengaturan.php" class="nav-link">
                    <i class="fas fa-cog"></i>
                    <span>Pengaturan</span>
                </a>
            </div>
            <?php endif; ?>
            <div class="nav-item mt-4">
                <a href="/logout" class="nav-link" onclick="return confirm('Yakin ingin keluar?')">
                    <i class="fas fa-sign-out-alt"></i>
                    <span>Sign Out</span>
                </a>
            </div>
        </nav>
    </div>