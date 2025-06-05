<?php
    use App\Services\Auth;

    $user = Auth::user();
    $uri = $_SERVER['REQUEST_URI'];
    $segments = explode('/', trim($uri, '/'));
    $currentPage = ucfirst(end($segments) ?: 'Dashboard'); // fallback ke "Dashboard" kalau kosong
?>
<div class="topbar">
    <div class="d-flex justify-content-between align-items-center">
        <div class="d-flex align-items-center">
            <button class="btn btn-link d-md-none me-3" id="sidebarToggle">
                <i class="fas fa-bars"></i>
            </button>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-custom">
                    <li class="breadcrumb-item">Pages</li>
                    <li class="breadcrumb-item active"><?= htmlspecialchars($currentPage) ?></li>
                </ol>
            </nav>
        </div>

        <div class="d-flex align-items-center gap-3">
            <div class="search-box d-none d-md-block">
                <i class="fas fa-search search-icon"></i>
                <input type="text" class="search-input" placeholder="Type here...">
            </div>

            <div class="dropdown">
                <a href="#" class="admin-profile dropdown-toggle" data-bs-toggle="dropdown">
                    <div class="admin-avatar">
                        <?= strtoupper(substr($user->name ?? 'Guest', 0, 2)) ?>
                    </div>
                    <div class="d-none d-md-block">
                        <div style="font-weight: 600; font-size: 0.875rem;"><?= htmlspecialchars($user->name ?? 'Guest') ?></div>
                        <div style="font-size: 0.75rem; color: var(--gray-500);"><?= htmlspecialchars($user->role ?? 'Guest') ?></div>
                    </div>
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a class="dropdown-item" href="profile.php"><i class="fas fa-user me-2"></i>Profile</a></li>
                    <li><a class="dropdown-item" href="pengaturan.php"><i class="fas fa-cog me-2"></i>Settings</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li><a class="dropdown-item" href="logout.php"><i class="fas fa-sign-out-alt me-2"></i>Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>