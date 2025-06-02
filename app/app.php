<?php

namespace App;

use App\Cores\Routes;
use App\Middlewares\{AuthMiddleware, RedirectIfAuth};


$routes = new Routes();

$routes->get('/dashboard', 'DashboardController@index', [AuthMiddleware::class]);

// $routes->get('/register', 'AuthController@register', [RedirectIfAuth::class]);
// $routes->post('/register', 'AuthController@registerStore');
$routes->get('/login', 'AuthController@login', [RedirectIfAuth::class]);
$routes->post('/login', 'AuthController@loginStore');
$routes->get('/logout', 'AuthController@logout', [AuthMiddleware::class]);

// Admin routes
$routes->get('/admin/users', 'AdminController@showUsers', [AuthMiddleware::class]);
$routes->get('/admin/users/{id}/edit', 'AdminController@editUser', [AuthMiddleware::class]);
$routes->post('/admin/users/{id}/update', 'AdminController@updateUser', [AuthMiddleware::class]);
$routes->post('/admin/users/{id}/delete', 'AdminController@deleteUser', [AuthMiddleware::class]);

$routes->get('/admin/keuangan', 'KeuanganController@index', [[AuthMiddleware::class, ['admin']]]);
$routes->get('/admin/keuangan/create', 'KeuanganController@create', [[AuthMiddleware::class, ['admin']]]);
$routes->post('/admin/keuangan/store', 'KeuanganController@store', [[AuthMiddleware::class, ['admin']]]);
$routes->get('/admin/keuangan/{id}/edit', 'KeuanganController@edit', [[AuthMiddleware::class, ['admin']]]);
$routes->post('/admin/keuangan/{id}/update', 'KeuanganController@update', [[AuthMiddleware::class, ['admin']]]);
$routes->get('/admin/keuangan/{id}/delete', 'KeuanganController@delete', [[AuthMiddleware::class, ['admin']]]);


$routes->get('/laporan', 'AdminController@laporan');
$routes->get('/laporan/export', 'AdminController@export');

//Panitia & Admin routes

//qurban
$routes->get('/qurban', 'QurbanController@index', [[AuthMiddleware::class, ['admin', 'panitia']]]);
$routes->get('/qurban/create', 'QurbanController@create', [[AuthMiddleware::class, ['admin', 'panitia']]]);
$routes->post('/qurban/store', 'QurbanController@store', [[AuthMiddleware::class, ['admin', 'panitia']]]);
$routes->get('/qurban/{id}/edit', 'QurbanController@edit', [[AuthMiddleware::class, ['admin', 'panitia']]]);
$routes->post('/qurban/{id}/update', 'QurbanController@update', [[AuthMiddleware::class, ['admin', 'panitia']]]);
$routes->get('/qurban/{id}/delete', 'QurbanController@delete', [[AuthMiddleware::class, ['admin', 'panitia']]]);
//disribusi
$routes->get('/distribusi', 'DistribusiController@index', [[AuthMiddleware::class, ['admin', 'panitia']]]);
$routes->get('/distribusi/create', 'DistribusiController@create', [[AuthMiddleware::class, ['admin', 'panitia']]]);
$routes->post('/distribusi/store', 'DistribusiController@store', [[AuthMiddleware::class, ['admin', 'panitia']]]);
$routes->get('/distribusi/{id}/edit', 'DistribusiController@edit', [[AuthMiddleware::class, ['admin', 'panitia']]]);
$routes->post('/distribusi/{id}/update', 'DistribusiController@update', [[AuthMiddleware::class, ['admin', 'panitia']]]);
$routes->get('/distribusi/{id}/delete', 'DistribusiController@delete', [[AuthMiddleware::class, ['admin', 'panitia']]]);
$routes->post('/distribusi/hitung-otomatis', 'DistribusiController@hitungOtomatis', [[AuthMiddleware::class, ['admin', 'panitia']]]);

// ADMIN-PANITIA - SCAN
$routes->get('/scan', 'ScanController@index', [[AuthMiddleware::class, ['admin', 'panitia']]]);

// WARGA - PROFILE & KARTU
$routes->get('/profile', 'ProfileController@index');
$routes->get('/kartu', 'ProfileController@kartu');
$routes->get('/kartu/download', 'ProfileController@download');

$routes->run();