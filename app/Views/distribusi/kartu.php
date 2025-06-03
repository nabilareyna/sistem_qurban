<?php App\Cores\Views::extend('layout.app') ?>
<?php App\Cores\Views::startSection('content') ?>

<style>
    .kartu-container {
        max-width: 600px;
        margin: 20px auto;
        border: 2px solid #198754;
        border-radius: 15px;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .kartu-header {
        background-color: #198754;
        color: white;
        padding: 15px;
        text-align: center;
    }

    .kartu-body {
        padding: 20px;
        background: white;
    }

    .qr-code {
        margin: 20px auto;
        padding: 15px;
        border: 1px dashed #ddd;
        border-radius: 10px;
        display: inline-block;
        background: #f8f9fa;
    }

    .info-row {
        margin-bottom: 10px;
    }

    .info-label {
        font-weight: bold;
        display: inline-block;
        width: 120px;
    }

    .kartu-footer {
        background-color: #f8f9fa;
        padding: 15px;
        text-align: center;
        font-size: 14px;
        color: #6c757d;
        border-top: 1px solid #eee;
    }

    @media print {
        .no-print {
            display: none;
        }
    }
</style>

<div class="kartu-container">
    <!-- Header -->
    <div class="kartu-header">
        <h3 class="mb-0">KARTU PENGAMBILAN QURBAN</h3>
        <p class="mb-0">RT 001 - Desa AAAA</p>
    </div>

    <!-- Body -->
    <div class="kartu-body text-center">
        <!-- Foto Profil (dari inisial jika tidak ada foto) -->
        <div class="mb-4">
            <div
                style="width: 100px; height: 100px; background-color: #198754; border-radius: 50%; margin: 0 auto; display: flex; align-items: center; justify-content: center; color: white; font-size: 36px;">
                <?= strtoupper(substr($data->name, 0, 1)) ?>
            </div>
        </div>

        <!-- Informasi Penerima -->
        <div class="text-start" style="max-width: 400px; margin: 0 auto;">
            <div class="info-row">
                <span class="info-label">Nama Lengkap:</span>
                <?= htmlspecialchars($data->name) ?>
            </div>

            <div class="info-row">
                <span class="info-label">NIK:</span>
                <?= htmlspecialchars($data->nik) ?>
            </div>

            <div class="info-row">
                <span class="info-label">Peran:</span>
                <span class="badge 
    <?= $data->role == 'berqurban' ? 'bg-success' :
        ($data->role == 'panitia' ? 'bg-primary' : 'bg-secondary') ?>">
                    <?= $data->role ? ucfirst($data->role) : 'Tidak Diketahui' ?>
                </span>
            </div>

            <div class="info-row">
                <span class="info-label">Jatah Daging:</span>
                <span class="fw-bold">
                    <?= number_format($data->jumlah_daging / 1000, 2) ?> kg
                    (<?= number_format($data->jumlah_daging) ?> gram)
                </span>
            </div>

            <div class="info-row">
                <span class="info-label">Status:</span>
                <span class="badge 
                    <?= $data->status_ambil == 'sudah' ? 'bg-success' : 'bg-warning text-dark' ?>">
                    <?= $data->status_ambil == 'sudah' ? 'Sudah Diambil' : 'Belum Diambil' ?>
                </span>
            </div>
        </div>

        <!-- QR Code -->
        <div class="qr-code">
            <img src="<?= $qrcode ?>" alt="QR Code" width="200">
        </div>

        <div class="alert alert-info mt-3">
            <i class="fas fa-info-circle"></i> Tunjukkan kartu ini ke panitia saat pengambilan daging
        </div>
    </div>

    <!-- Footer -->
    <div class="kartu-footer">
        <div class="mb-1">ID: <?= $data->token ?></div>
        <div>Tanggal Cetak: <?= date('d/m/Y H:i') ?></div>
    </div>
</div>

<!-- Tombol Cetak -->
<div class="text-center mt-3 no-print">
    <button onclick="window.print()" class="btn btn-primary">
        <i class="fas fa-print"></i> Cetak Kartu
    </button>
    <a href="/distribusi" class="btn btn-secondary">
        <i class="fas fa-arrow-left"></i> Kembali
    </a>
</div>

<?php App\Cores\Views::endSection() ?>