<aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

        <li class="nav-item">
            <a class="nav-link " href="/dashboard">
                <i class="bi bi-grid"></i>
                <span>Dashboard</span>
            </a>
        </li><!-- End Dashboard Nav -->
        <?php if ($role === 'admin'): ?>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/users">
                    <i class="bi bi-grid"></i>
                    <span>Kelola Pengguna</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="index.html">
                    <i class="bi bi-grid"></i>
                    <span>Kelola Panitia</span>
                </a>
            </li>
        <?php endif; ?>

        <?php if ($role === 'admin' || $role === 'panitia'): ?>
            <li class="nav-item">
                <a class="nav-link collapsed " href="index.html">
                    <i class="bi bi-grid"></i>
                    <span>Peserta Qurban</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" href="/admin/qurban">
                    <i class="bi bi-list"></i>
                    <span>Peserta Qurban</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-target="#laporan-nav" data-bs-toggle="collapse" href="#">
                    <i class="bi bi-file-earmark-text"></i>
                    <span>Laporan Qurban</span><i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <ul id="laporan-nav" class="nav-content collapse" data-bs-parent="#sidebar-nav">
                    <li><a href="/admin/laporan/hewan"><i class="bi bi-circle"></i><span>Data Hewan</span></a></li>
                    <li><a href="/admin/laporan/distribusi"><i class="bi bi-circle"></i><span>Distribusi Daging</span></a>
                    </li>
                </ul>
            </li>
        <?php endif; ?>
    </ul>
</aside>