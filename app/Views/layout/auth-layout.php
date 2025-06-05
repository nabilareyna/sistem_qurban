<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Masuk - QurbanKita</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- Google Fonts -->

    <link href="<?= asset('css/auth.css') ?>" rel="stylesheet">
</head>

<body>

    <main>
        <div class="auth-container">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6 col-lg-5">
                        <div class="card auth-card">
                            <!-- Header -->
                            <div class="auth-header">
                                <div class="logo-icon">
                                    <i class="fas fa-heart"></i>
                                </div>
                                <h2 class="mb-2">Selamat Datang Kembali</h2>
                                <p class="mb-0 opacity-90">Masuk ke akun QurbanKita Anda</p>
                            </div>

                            <!-- Form -->
                            <?php App\Cores\Views::yieldSection('content') ?>
                        </div>
                    </div>
                </div>
            </div>
    </main><!-- End #main -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Toggle password visibility
        function togglePassword(inputId, iconId) {
            const input = document.getElementById(inputId);
            const icon = document.getElementById(iconId);

            if (input.type === 'password') {
                input.type = 'text';
                icon.classList.remove('fa-eye');
                icon.classList.add('fa-eye-slash');
            } else {
                input.type = 'password';
                icon.classList.remove('fa-eye-slash');
                icon.classList.add('fa-eye');
            }
        }

        // Form validation feedback
        document.addEventListener('DOMContentLoaded', function () {
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function (e) {
                    const submitBtn = form.querySelector('button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Memproses...';
                        submitBtn.disabled = true;
                    }
                });
            });
        });
    </script>
</body>

</html>