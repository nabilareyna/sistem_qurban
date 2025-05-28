<?php App\Cores\Views::extend('layout.app') ?>

<?php App\Cores\Views::startSection('content') ?>
<div class="row">
    <div class="col">
        <form action="/add" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Name</label>
            <input type="text" name="username" class="form-control" id="username" placeholder="Full Name">
            <!-- Menampilkan pesan error -->
            <?php if ($error = App\Cores\Flash::get('error_name')): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="password">
            <!-- Menampilkan pesan error -->
            <?php if ($error = App\Cores\Flash::get('error_password')): ?>
                <p style="color: red;"><?php echo $error; ?></p>
            <?php endif; ?>
        </div>
        <input type="submit" class="btn btn-success" value="Submit">
        </form>
    </div>
</div>
<?php App\Cores\Views::endSection() ?>


<?php App\Cores\Views::startSection('head') ?>
<style>
    h1 {
        color:red;
    }
</style>
<?php App\Cores\Views::endSection() ?>

<?php App\Cores\Views::startSection('js') ?>
<script>
    console.log('ini js')
</script>
<?php App\Cores\Views::endSection() ?>
