<?php App\Cores\Views::extend('layout.auth-layout') ?>

<?php App\Cores\Views::startSection('content') ?>
<div class="pt-4 pb-2">
    <h5 class="card-title text-center pb-0 fs-4">Register to Your Account</h5>
    <p class="text-center small">Enter your data to register</p>
</div>
<div class="row">
    <div class="col">
        <form action="/register" method="post" class="row g-3 needs-validation">
            <div class="col-12">
                <label for="username" class="form-label">Name</label>
                <div class="input-group has-validation">
                    <input type="text" name="username" class="form-control" id="username" required>
                    <?php if ($error = App\Cores\Flash::get('error_username')): ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php endif; ?>
                    <div class="invalid-feedback">Please enter your name.</div>
                </div>
            </div>
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
            <div class="col-12">
                <label for="nik" class="form-label">NIK</label>
                <div class="input-group has-validation">
                    <input type="text" name="nik" class="form-control" id="nik" required>
                    <?php if ($error = App\Cores\Flash::get('error_username')): ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php endif; ?>
                    <div class="invalid-feedback">Please enter your nik.</div>
                </div>
            </div>
            <div class="col-12">
                <label for="alamat" class="form-label">Alamat</label>
                <div class="input-group has-validation">
                    <input type="text" name="alamat" class="form-control" id="alamat" required>
                    <?php if ($error = App\Cores\Flash::get('error_username')): ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php endif; ?>
                    <div class="invalid-feedback">Please enter your alamat.</div>
                </div>
            </div>
            <div class="col-12">
                <label for="no_hp" class="form-label">No. HP</label>
                <div class="input-group has-validation">
                    <input type="text" name="no_hp" class="form-control" id="no_hp" required>
                    <?php if ($error = App\Cores\Flash::get('error_username')): ?>
                        <p style="color: red;"><?php echo $error; ?></p>
                    <?php endif; ?>
                    <div class="invalid-feedback">Please enter your alamat.</div>
                </div>
            </div>
            <?php if ($error = App\Cores\Flash::get('register_error')): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
            <div class="col-12">
                <button class="btn btn-primary w-100" type="submit">Create Account</button>
            </div>
            <div class="col-12">
                <p class="small mb-0">Already have an account? <a href="/login">Log in</a></p>
            </div>
        </form>
    </div>
</div>
<?php App\Cores\Views::endSection() ?>