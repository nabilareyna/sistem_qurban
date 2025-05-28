<?php

namespace App;

use App\Cores\Routes;
use App\Middlewares\{AuthMiddleware, RedirectIfAuth};


$routes = new Routes();

$routes->get('/dashboard', 'DashboardController@index', [AuthMiddleware::class]);

$routes->get('/register', 'AuthController@register', [RedirectIfAuth::class]);
$routes->post('/register', 'AuthController@registerStore');
$routes->get('/login', 'AuthController@login', [RedirectIfAuth::class]);
$routes->post('/login', 'AuthController@loginStore');
$routes->get('/logout', 'AuthController@logout', [AuthMiddleware::class]);

// Admin routes
$routes->get('/admin/users', 'AdminController@showUsers', [AuthMiddleware::class]);
$routes->get('/admin/users/{id}/edit', 'AdminController@editUser', [AuthMiddleware::class]);
$routes->post('/admin/users/{id}/update', 'AdminController@updateUser', [AuthMiddleware::class]);
$routes->post('/admin/users/{id}/delete', 'AdminController@deleteUser', [AuthMiddleware::class]);

$routes->get('/admin/keuangan', 'AdminController@listTransaksi', [AuthMiddleware::class]);
$routes->get('/admin/keuangan/create', 'AdminController@listTransaksi', [AuthMiddleware::class]);
$routes->post('/admin/keuangan/store', 'AdminController@listTransaksi', [AuthMiddleware::class]);

$routes->get('/laporan', 'AdminController@laporan');
$routes->get('/laporan/export', 'AdminController@export');

//Panitia & Admin routes
$routes->get('/hewan', 'HewanController@index', [AuthMiddleware::class]);
$routes->get('/hewan/create', 'HewanController@create', [AuthMiddleware::class]);
$routes->post('/hewan/store', 'HewanController@store');

// BERQURBAN - KONTRIBUSI
$routes->get('/kontribusi', 'KontribusiController@index');
$routes->get('/kontribusi/create', 'KontribusiController@create');
$routes->post('/kontribusi/store', 'KontribusiController@store');

// PANITIA - DISTRIBUSI
$routes->get('/distribusi', 'DistribusiController@index');
$routes->get('/distribusi/scan', 'DistribusiController@scan');
$routes->post('/distribusi/store', 'DistribusiController@store');

// WARGA - PROFILE & KARTU
$routes->get('/profile', 'ProfileController@index');
$routes->get('/kartu', 'ProfileController@kartu');
$routes->get('/kartu/download', 'ProfileController@download');

$routes->run();