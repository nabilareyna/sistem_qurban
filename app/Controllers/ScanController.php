<?php 
namespace App\Controllers;

use App\Cores\Views;
use App\Models\Distribusi;
use App\Services\Auth;
use App\Cores\Flash;

class ScanController
{
    public function index()
    {
        // Hanya panitia yang boleh akses
        if (Auth::user()->role !== 'panitia') {
            Flash::error('global', 'Akses ditolak!');
            header('Location: /');
            exit;
        }
        
        echo Views::render('scan/index', [
            'user' => Auth::user(),
            'role' => Auth::user()->role
        ]);
    }

    public function verify()
    {
        $token = $_POST['token'] ?? null;
        
        if (!$token) {
            Flash::error('global', 'Token tidak valid!');
            header('Location: /scan');
            exit;
        }
        
        $model = new Distribusi();
        $distribusi = $model->withUserByToken($token);
        
        if (!$distribusi) {
            Flash::error('global', 'Data tidak ditemukan!');
            header('Location: /scan');
            exit;
        }
        
        echo Views::render('scan/result', [
            'data' => $distribusi,
            'user' => Auth::user(),
            'role' => Auth::user()->role
        ]);
    }

    public function confirm($id)
    {
        $model = new Distribusi();
        $model->where('id', '=', $id)->update([
            'status_ambil' => 'sudah'
        ]);
        
        Flash::success('global', 'Pengambilan berhasil dikonfirmasi!');
        header('Location: /scan');
        exit;
    }
}