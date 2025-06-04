<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a class="nav-link " href="/dashboard">
                <i class="bi bi-speedometer2"></i> <!-- Ikon dashboard lebih spesifik -->
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        
        <?php if ($role === 'admin'): ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/users">
                    <i class="bi bi-people"></i> <!-- Ikon pengguna -->
                    <span>Kelola Pengguna</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#keuangan-nav" data-bs-toggle="collapse" href="/admin/keuangan">
                    <i class="bi bi-cash-coin"></i> <!-- Ikon keuangan -->
                    <span>Keuangan</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="keuangan-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li><a href="/admin/keuangan"><i class="bi bi-wallet2"></i><span>Data Keuangan</span></a></li>                  
                </ul>
            </li>
        <?php endif; ?>

        <?php if ($role === 'admin' || $role === 'panitia'): ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/qurban">
                    <i class="bi bi-card-checklist"></i> <!-- Ikon daftar peserta -->
                    <span>Peserta Qurban</span>
                </a>
            </li>
            
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#distribusi-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-truck"></i> <!-- Ikon distribusi -->
                    <span>Distribusi</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="distribusi-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li><a href="/distribusi"><i class="bi bi-list-task"></i><span>Distribusi List</span></a></li>
                    <li><a href="/scan"><i class="bi bi-qr-code-scan"></i><span>Scan QR Code</span></a></li>
                </ul>
            </li>

            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#laporan-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-clipboard-data"></i> <!-- Ikon laporan -->
                    <span>Laporan Qurban</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="laporan-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li><a href="/admin/laporan/hewan"><i class="bi bi-diagram-3"></i><span>Data Hewan</span></a></li>
                    <li><a href="/admin/laporan/distribusi"><i class="bi bi-pie-chart"></i><span>Distribusi Daging</span></a></li>
                </ul>
            </li>
        <?php endif; ?>
    </ul>
</aside>