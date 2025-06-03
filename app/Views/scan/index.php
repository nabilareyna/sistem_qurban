<?php App\Cores\Views::extend('layout.app') ?>
<?php App\Cores\Views::startSection('content') ?>
<div class="container-fluid">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Verifikasi Pengambilan Daging</h1>
    </div>

    <div class="card shadow-sm">
        <div class="card-body">
            <div class="text-center mb-4">
                <p class="lead">Masukkan token dari kartu QR penerima</p>

                <form action="/scan/verify" method="POST" class="mt-4">
                    <div class="input-group input-group-lg mb-3">
                        <input type="text" name="token" class="form-control" placeholder="Contoh: a1b2c3d4e5" required
                            autocomplete="off" autofocus>
                        <button class="btn btn-success" type="submit">
                            <i class="fas fa-check me-1"></i> Verifikasi
                        </button>
                    </div>
                </form>

                <div class="mt-5">
                    <h5>Petunjuk Verifikasi:</h5>
                    <ol class="text-start">
                        <li>Minta kartu QR penerima</li>
                        <li>Temukan token di bagian bawah kartu</li>
                        <li>Masukkan token ke dalam form di atas</li>
                        <li>Klik tombol verifikasi</li>
                    </ol>
                    <div class="alert alert-info mt-3">
                        <i class="fas fa-info-circle me-1"></i>
                        Token biasanya berupa kode unik 10-20 karakter (huruf dan angka)
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php App\Cores\Views::endSection() ?>