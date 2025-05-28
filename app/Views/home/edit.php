<?php App\Cores\Views::extend('layout.app') ?>

<?php App\Cores\Views::startSection('content') ?>
<div class="row">
    <div class="col">
        <form action="/update/<?=$user->id?>" method="post">
        <div class="mb-3">
            <label for="username" class="form-label">Name</label>
            <input type="text" name="username" class="form-control" value="<?=$user->username?>" id="username" placeholder="Full Name">
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
