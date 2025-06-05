<?php

namespace App\Controllers;

use App\Cores\{Views, Validate, Flash};
use App\Services\Auth;
use App\Models\User;

class AuthController
{
    public function login()
    {
        echo Views::render('auth.login');
    }

    public function logout()
    {
        Auth::logout();
        header('Location: /login');
        exit;
    }

    public function loginStore()
    {
        $data = $_POST;

        $validator = new Validate();
        $validator->validate($data, [
            'username' => 'required',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    Flash::set("error_{$field}", $message);
                    Flash::setOld($data);
                }
            }

            header('Location: /login');
            exit;
        }

        $user = new User();
        $data_user = $user->where('username', '=', $data['username'])->first();

        if ($data_user && Auth::verifyPassword($data['password'], $data_user->password)) {
            Auth::login($data_user);
            header('Location: /dashboard');
            exit;
        } else {
            Flash::set('login_error', 'Username atau password salah');
            header('Location: /login');
            exit;
        }
    }

    public function register()
    {
        echo Views::render('auth.register');
    }

    public function registerStore()
    {
        $data = $_POST;

        $validator = new Validate();
        $validator->validate($data, [
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            foreach ($validator->errors() as $field => $messages) {
                foreach ($messages as $message) {
                    Flash::set("error_{$field}", $message);
                }
            }

            header('Location: /register');
            exit;
        }

        $user = new User();

        // Cek apakah username sudah ada
        $existing = $user->where('username', '=', $data['username'])->first();
        if ($existing) {
            Flash::set('error_username', 'Username sudah terdaftar');
            header('Location: /register');
            exit;
        }

        $saved = $user->create([
            'name' => $data['name'],
            'username' => $data['username'],
            'password' => Auth::bcrypt($data['password']),
            'nik' => $data['nik'] ?? '',
            'alamat' => $data['alamat'] ?? '',
            'no_hp' => $data['no_hp'] ?? '',
        ]);

        if ($saved) {
            Flash::set('success', 'Registrasi berhasil, silakan login');
            header('Location: /login');
            exit;
        }

        Flash::set('error_register', 'Gagal mendaftar');
        header('Location: /register');
        exit;
    }
}
