<?php App\Cores\Views::extend('layout.auth-layout') ?>

<?php App\Cores\Views::startSection('content') ?>
<div class="pt-4 pb-2">
    <h5 class="card-title text-center pb-0 fs-4">Login to Your Account</h5>
    <p class="text-center small">Enter your username & password to login</p>
</div>
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
        </form>
    </div>
</div>
<?php App\Cores\Views::endSection() ?>