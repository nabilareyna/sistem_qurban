<?php

namespace App\Controllers;

use App\Cores\Views;
use App\Services\Auth;
use App\Models\User;
use App\Models\Qurban;
use App\Models\Hewan;
use App\Models\Distribusi;
use App\Models\Keuangan;

class DashboardController
{
    public function index()
    {
        $user = Auth::user();
        $role = $user->role;
        if ($role === 'admin') {
            $userModel = new User();
            $qurbanModel = new Qurban();
            $distribusiModel = new Distribusi();
            $hewanModel = new Hewan();

            $statistik = [
                'total_users' => count($userModel->all()),
                'total_berqurban' => count($userModel->where('role', '=', 'berqurban')->get()),
                'total_panitia' => count($userModel->where('role', '=', 'panitia')->get()),
                'total_hewan' => count($hewanModel->all()),
                'total_daging' => $qurbanModel->totalDaging(),
                'terdistribusi' => $distribusiModel->totalTerdistribusi(),
                'sisa' => $qurbanModel->totalDaging() - $distribusiModel->totalTerdistribusi()
            ];

            echo Views::render('dashboard.admin', [
                'user' => $user,
                'role' => $role,
                'statistik' => $statistik
            ]);
        } else {
            // Dashboard Panitia/Warga
            echo Views::render('dashboard.' . $role, [
                'user' => $user,
                'role' => $role
            ]);
        }
    }
}
