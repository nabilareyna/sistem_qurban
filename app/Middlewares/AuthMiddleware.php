<?php

namespace App\Middlewares;
use App\Services\Auth;
class AuthMiddleware extends Middleware
{
    public function handle($request, $next)
    {
        if (!Auth::check()) {
            header('Location: /login');
            exit;
        }

        if (!Auth::roleIs('admin', 'panitia', 'warga', 'berqurban')) {
            header('Location: /dashboard');
            exit;
        }

        $next();
    }

}