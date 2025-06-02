<?php

namespace App\Controllers;

use App\Cores\Views;
use App\Models\Distribusi;
use App\Models\Qurban;
use App\Models\User;
use App\Services\Auth;
use App\Cores\Validate;
use App\Cores\Flash;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Writer\PngWriter;

class DistribusiController
{
    const BOBOT_BERQURBAN = 4;
    const BOBOT_PANITIA = 3;
    const BOBOT_WARGA = 1;

    // Total daging dalam gram (100kg sapi + 100kg kambing)
    const TOTAL_DAGING = 200000;

    public function index()
    {
        $model = new Distribusi();
        $data = $model->withUser();

        // Hitung total yang sudah dibagikan
        $total_terdistribusi = $model->totalTerdistribusi();
        $sisa_daging = self::TOTAL_DAGING - $total_terdistribusi;

        if ($sisa_daging < 0) {
            // Log error atau beri peringatan
            error_log("Peringatan: Distribusi melebihi stok! Total: " . self::TOTAL_DAGING . " Terdistribusi: $total_terdistribusi");
            $sisa_daging = 0;
        }

        echo Views::render('distribusi.index', [
            'distribusi' => $data,
            'total' => self::TOTAL_DAGING,
            'terdistribusi' => $total_terdistribusi,
            'sisa' => $sisa_daging,
            'user' => Auth::user(),
            'role' => Auth::user()->role
        ]);
    }

    // FITUR BARU: Hitung pembagian otomatis (tanpa admin)
    public function hitungOtomatis()
    {
        $qurbanModel = new Qurban();
        $totalDaging = $qurbanModel->totalDaging(); // 200.000 gram dari 2 ekor (sapi+kambing)

        // 2. Dapatkan semua user kecuali admin
        $userModel = new User();
        $users = $userModel->where('role', '<>', 'admin')->get();

        // 3. Hitung total bobot
        $totalBobot = 0;
        foreach ($users as $user) {
            $totalBobot += $this->getBobot($user->role);
        }

        // 4. Hitung daging per bobot (dibulatkan per user nanti)
        $dagingPerBobot = $totalBobot > 0 ? $totalDaging / $totalBobot : 0;

        // 5. Hapus distribusi lama
        $distModel = new Distribusi();
        $distModel->truncate();

        // 6. Hitung & distribusikan daging secara aman
        foreach ($users as $user) {
            $bobot = $this->getBobot($user->role);
            $jatah = round($bobot * $dagingPerBobot);

            // Jangan melebihi stok
            if ($jatah > $totalDaging) {
                $jatah = $totalDaging;
            }

            $token = bin2hex(random_bytes(10));

            $distModel->create([
                'user_id' => $user->id,
                'jumlah_daging' => $jatah,
                'status_ambil' => 'belum',
                'token' => $token
            ]);

            // Kurangi stok agar total tidak melebihi
            $totalDaging -= $jatah;
        }

        Flash::success('global', 'Pembagian daging berhasil dihitung otomatis!');
        header('Location: /distribusi');
        exit;
    }

    // Helper: Dapatkan bobot berdasarkan role (admin tidak dihitung)
    private function getBobot($role)
    {
        switch ($role) {
            case 'berqurban':
                return self::BOBOT_BERQURBAN;
            case 'panitia':
                return self::BOBOT_PANITIA;
            case 'warga':
                return self::BOBOT_WARGA;
            default:
                return 0; // Admin dan role lain tidak dapat bagian
        }
    }

    public function kartuQurban($id)
    {
        $model = new Distribusi();
        $distribusi = $model->withUserById($id);


        if (!$distribusi) {
            Flash::error('global', 'Data distribusi tidak ditemukan!');
            header('Location: /distribusi');
            exit;
        }

        // Generate QR Code
        $qrCode = $this->generateQRCode($distribusi->token);

        echo Views::render('distribusi/kartu', [
            'data' => $distribusi,
            'qrcode' => $qrCode
        ]);
    }

    private function generateQRCode($token)
    {
        $result = Builder::create()
            ->writer(new PngWriter())
            ->data($token)
            ->size(200)
            ->margin(10)
            ->build();

        return $result->getDataUri();
    }

    public function create()
    {
        $user = new User();
        $users = $user->all();

        echo Views::render('distribusi.create', [
            'users' => $users,
            'user' => Auth::user(),
            'role' => Auth::user()->role
        ]);
    }

    public function store()
    {
        $data = $_POST;
        $validate = new Validate();

        $validate->validate($data, [
            'user_id' => 'required',
            'jumlah_daging' => 'required'
        ]);

        if ($validate->fails()) {
            foreach ($validate->errors() as $field => $messages) {
                foreach ($messages as $msg) {
                    Flash::set("error_$field", $msg);
                }
            }
            Flash::setOld($data);
            header('Location: /distribusi/create');
            exit;
        }

        $model = new Distribusi();
        $total_terdistribusi = $model->totalTerdistribusi();
        $sisa_daging = self::TOTAL_DAGING - $total_terdistribusi;

        if ($data['jumlah_daging'] > $sisa_daging) {
            Flash::error('jumlah_daging', 'Jumlah melebihi stok! Sisa: ' . ($sisa_daging / 1000) . ' kg');
            header('Location: /distribusi/create');
            exit;
        }
        $model->create([
            'user_id' => $data['user_id'],
            'jumlah_daging' => $data['jumlah_daging'],
            'status_ambil' => $data['status_ambil'] ?? 'belum'
        ]);
        Flash::success('global', 'Distribusi berhasil ditambahkan!');
        header('Location: /distribusi');
        exit;
    }

    public function edit($id)
    {
        $model = new Distribusi();
        $found = $model->where('id', '=', $id)->first();

        $users = (new User())->all();

        echo Views::render('distribusi.edit', [
            'data' => $found,
            'users' => $users,
            'user' => Auth::user(),
            'role' => Auth::user()->role
        ]);
    }

    public function update($id)
    {
        $data = $_POST;
        $model = new Distribusi();

        $model->where('id', '=', $id)->update([
            'user_id' => $data['user_id'],
            'jumlah_daging' => $data['jumlah_daging'],
            'status_ambil' => $data['status_ambil']
        ]);

        header('Location: /distribusi');
        exit;
    }

    public function delete($id)
    {
        $model = new Distribusi();
        $model->delete($id);

        header('Location: /distribusi');
        exit;
    }
}
