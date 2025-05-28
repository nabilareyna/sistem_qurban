<?php

namespace App\Middlewares;

use App\Services\Auth;

class RedirectIfAuth extends Middleware
{
    public function handle($request, $next)
    {
        if (Auth::check()) {
            header('Location: /dashboard');
            exit;
        }

        $next();
    }

    public function terminate($request, $response)
    {
        $response();
    }
}
