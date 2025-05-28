<?php

namespace App\Controllers;

use App\Cores\Views;
use App\Services\Auth;

class DashboardController
{
    public function index()
    {
        $user = Auth::user();
        $role = $user->role;

        echo Views::render("dashboard.{$role}", ['user' => $user, 'role' => $role]);
    }
}
