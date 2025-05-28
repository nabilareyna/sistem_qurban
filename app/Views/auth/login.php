<?php App\Cores\Views::extend('layout.auth-layout') ?>

<?php App\Cores\Views::startSection('content') ?>
<div class="row">
    <div class="col">
        <form action="/login" method="post" class="row g-3 needs-validation">

            <div class="col-12">
                <label for="username" class="form-label">Username</label>
                <div class="input-group has-validation">
                    <span class="input-group-text" id="inputGroupPrepend">@</span>
                    <input type="text" name="username" class="form-control" id="username" required>
                    <?php if ($error = App\Cores\Flash::get('error_username')): ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php endif; ?>
                    <div class="invalid-feedback">Please enter your username.</div>
                </div>
            </div>
            <div class="col-12">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" required>
                <div class="invalid-feedback">Please enter your password!</div>
                <?php if ($error = App\Cores\Flash::get('error_password')): ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>
            </div>
            <?php if ($error = App\Cores\Flash::get('login_error')): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Login</button>
            </div>
            <div class="col-12">
                <p class="small mb-0">Don't have account? <a href="/register">Create an account</a></p>
            </div>
        </form>
    </div>
</div>
<?php App\Cores\Views::endSection() ?>