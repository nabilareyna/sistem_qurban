<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title><?= isset($role) ? ucfirst($role) . ' Dashboard' : 'Dashboard' ?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <!-- Favicons -->
    <link href="<?= asset('img/favicon.png') ?>" rel="icon">
    <link href="<?= asset('img/apple-touch-icon.png') ?>" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.gstatic.com" rel="preconnect">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
        rel="stylesheet">

    <link href="<?= asset('vendor/bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('vendor/bootstrap-icons/bootstrap-icons.css') ?>" rel="stylesheet">
    <link href="<?= asset('vendor/boxicons/css/boxicons.min.css') ?>" rel="stylesheet">
    <link href="<?= asset('vendor/quill/quill.snow.css') ?>" rel="stylesheet">
    <link href="<?= asset('vendor/quill/quill.bubble.css') ?>" rel="stylesheet">
    <link href="<?= asset('vendor/remixicon/remixicon.css') ?>" rel="stylesheet">
    <link href="<?= asset('vendor/simple-datatables/style.css') ?>" rel="stylesheet">
    <link href="<?= asset('css/style.css') ?>" rel="stylesheet">
    <?php App\Cores\Views::yieldSection('head') ?>
</head>

<body>

    <?php App\Cores\Views::include('layout.header', ['user' => $user]) ?>
    <?php App\Cores\Views::include('layout.sidebar', ['role' => $role]) ?>

    <main id="main" class="main">
        <?php App\Cores\Views::yieldSection('content') ?>
    </main>

    <?php App\Cores\Views::include('layout.footer') ?>

    <script src="<?= asset('vendor/apexcharts/apexcharts.min.js') ?>"></script>
    <script src="<?= asset('vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <script src="<?= asset('vendor/chart.js/chart.umd.js') ?>"></script>
    <script src="<?= asset('vendor/echarts/echarts.min.js') ?>"></script>
    <script src="<?= asset('vendor/quill/quill.js') ?>"></script>
    <script src="<?= asset('vendor/simple-datatables/simple-datatables.js') ?>"></script>
    <script src="<?= asset('vendor/tinymce/tinymce.min.js') ?>"></script>
    <script src="<?= asset('vendor/php-email-form/validate.js') ?>"></script>
    <script src="<?= asset('js/main.js') ?>"></script>
    <?php App\Cores\Views::yieldSection('js') ?>

</body>

</html>