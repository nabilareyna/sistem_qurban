<?php 
namespace App\Middlewares;

abstract class Middleware
{
    abstract public function handle($request, $next);
    
    public function terminate($request, $response)
    {
        $response();
    }
}
