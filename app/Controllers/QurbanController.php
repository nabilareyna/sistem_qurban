<?php

namespace App\Controllers;

use App\Models\Qurban;
use App\Models\Hewan;
use App\Models\User;
use App\Services\Auth;
use App\Cores\Views;
use App\Cores\Validate;
use App\Cores\Flash;

class QurbanController
{
    public function index()
    {
        $model = new Qurban();
        $data = $model->withHewanAndUser(); // JOIN untuk tampilkan nama hewan dan user

        echo Views::render('qurban.index', [
            'qurbans' => $data,
            'user' => Auth::user(),
            'role' => Auth::user()->role
        ]);
    }

    public function create()
    {
        $users = (new User())->where('role', '=', 'berqurban')->get();
        $hewans = (new Hewan())->all();

        echo Views::render('qurban.create', [
            'users' => $users,
            'hewans' => $hewans,
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
            'hewan_id' => 'required',
            'jumlah' => 'required'
        ]);

        if ($validate->fails()) {
            foreach ($validate->errors() as $field => $messages) {
                foreach ($messages as $msg) {
                    Flash::set("error_$field", $msg);
                }
            }

            Flash::setOld($data);
            header('Location: /qurban/create');
            exit;
        }

        $model = new Qurban();
        $model->create([
            'user_id' => $data['user_id'],
            'hewan_id' => $data['hewan_id'],
            'jumlah' => $data['jumlah'] ?? 1,
            'status_bayar' => $data['status_bayar'] ?? 'belum'
        ]);

        Flash::success('global', 'Peserta qurban berhasil ditambahkan');
        header('Location: /qurban');
        exit;
    }
}
