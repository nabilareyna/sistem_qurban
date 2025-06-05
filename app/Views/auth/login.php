<?php App\Cores\Views::extend('layout.auth-layout') ?>

<?php App\Cores\Views::startSection('content') ?>

<div class="card-body p-4">
    <?php if (\App\Cores\Flash::has('status')): ?>
        <div class="alert alert-success alert-custom">
            <div class="d-flex align-items-center">
                <i class="fas fa-check-circle me-2"></i>
                <div><?= \App\Cores\Flash::get('status') ?></div>
            </div>
        </div>
    <?php endif ?>

    <?php if (\App\Cores\Flash::has('login_error')): ?>
        <div class="alert alert-danger alert-custom">
            <div class="d-flex align-items-center">
                <i class="fas fa-exclamation-triangle me-2"></i>
                <div>
                    <strong>Login gagal!</strong>
                    <ul class="mb-0 mt-1">
                        <li><?= \App\Cores\Flash::get('login_error') ?></li>
                    </ul>
                </div>
            </div>
        </div>
    <?php endif ?>

    <form method="POST" action="/login">

        <!-- Email -->
        <div class="form-floating mb-3">
            <input type="text" class="form-control <?= \App\Cores\Flash::has('error_username') ? 'is-invalid' : '' ?>"
                id="Username" name="username" placeholder="Username"
                value="<?= \App\Cores\Flash::get('old_username') ?>" required autofocus>
            <label for="Username">
                <i class="fas fa-envelope me-2"></i>Username
            </label>
        </div>

        <!-- Password -->
        <div class="form-floating mb-3">
            <input type="password"
                class="form-control <?= \App\Cores\Flash::has('error_password') ? 'is-invalid' : '' ?>" id="password"
                name="password" placeholder="Password" required>
            <label for="password">
                <i class="fas fa-lock me-2"></i>Password
            </label>
        </div>

        <!-- Remember & Forgot -->
        <div class="remember-forgot">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="remember" name="remember"
                    <?= \App\Cores\Flash::get('old_remember') ? 'checked' : '' ?>>
                <label class="form-check-label" for="remember">
                    Ingat saya
                </label>
            </div>
            <a href="#" class="auth-link">
                Lupa password?
            </a>
        </div>

        <!-- Submit Button -->
        <button type="submit" class="btn btn-emerald w-100 mb-3">
            <i class="fas fa-sign-in-alt me-2"></i>Masuk
        </button>
    </form>
</div>
<?php App\Cores\Views::endSection() ?>