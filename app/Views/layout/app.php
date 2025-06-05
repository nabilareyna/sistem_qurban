<?php
    use App\Services\Auth;

    $user = Auth::user();
    $uri = $_SERVER['REQUEST_URI'];
    $segments = explode('/', trim($uri, '/'));
    $currentPage = ucfirst(end($segments) ?: 'Dashboard'); // fallback ke "Dashboard" kalau kosong
?>
<!DOCTYPE html>
<html lang="en">

<link>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" class="fas fa-heart" type="image/png" href="">
    <title>
        QurbanKita - <?= htmlspecialchars($currentPage) ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700,800" rel="stylesheet" />
    <!-- Nucleo Icons -->
    <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="https://demos.creative-tim.com/soft-ui-dashboard/assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- CSS Files -->
    <link id="pagestyle" href="<?= asset("css/soft-ui-dashboard.css?v=1.1.0") ?>" rel="stylesheet" />
    <link id="pagestyle" href="<?= asset("css/custom.css") ?>" rel="stylesheet" />
    <!-- Nepcha Analytics (nepcha.com) -->
    <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>
<!-- sidenav -->

<body class="g-sidenav-show  bg-gray-100">

    <!-- end of sidenav -->
    <?php App\Cores\Views::include('layout.sidebar', ['role' => $role]) ?>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        <!-- Navbar -->
        <?php App\Cores\Views::include('layout.header', ['user' => $user]) ?>
        <!-- End Navbar -->
        <!-- main section -->
        <div class="content-area">
            <?php App\Cores\Views::yieldSection('content') ?>
        </div>
    </main>
    <!--   Core JS Files   -->
    <script src="<?= asset("js/core/popper.min.js") ?>"></script>
    <script src="<?= asset("js/core/bootstrap.min.js") ?>"></script>
    <script src="<?= asset("js/plugins/perfect-scrollbar.min.js") ?>"></script>
    <script src="<?= asset("js/plugins/smooth-scrollbar.min.js") ?>"></script>
    <script src="<?= asset("js/plugins/chartjs.min.js") ?>"></script>
    <script>
        var win = navigator.platform.indexOf('Win') > -1;
        if (win && document.querySelector('#sidenav-scrollbar')) {
            var options = {
                damping: '0.5'
            }
            Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
        }
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Sidebar toggle for mobile
        document.getElementById('sidebarToggle').addEventListener('click', function () {
            document.getElementById('sidebar').classList.toggle('show');
        });

        // Close sidebar when clicking outside on mobile
        document.addEventListener('click', function (e) {
            const sidebar = document.getElementById('sidebar');
            const toggle = document.getElementById('sidebarToggle');

            if (window.innerWidth <= 768 && !sidebar.contains(e.target) && !toggle.contains(e.target)) {
                sidebar.classList.remove('show');
            }
        });

        // Search functionality
        document.querySelector('.search-input').addEventListener('input', function (e) {
            const searchTerm = e.target.value.toLowerCase();
            // Implement search logic here
            console.log('Searching for:', searchTerm);
        });

        // Auto-refresh stats every 30 seconds
        setInterval(function () {
            // Implement auto-refresh logic here
            console.log('Refreshing stats...');
        }, 30000);

        // Animate progress bars on load
        window.addEventListener('load', function () {
            const progressBars = document.querySelectorAll('.progress-fill');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0%';
                setTimeout(() => {
                    bar.style.width = width;
                }, 500);
            });
        });
    </script>
    <!-- Github buttons -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Soft Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="<?= asset("js/soft-ui-dashboard.min.js?v=1.1.0") ?>"></script>
</body>

</html>