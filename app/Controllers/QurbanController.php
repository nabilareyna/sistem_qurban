<?php

namespace App\Controllers;

use App\Cores\Views;
use App\Models\Qurban;
use App\Models\User;
use App\Cores\Validate;
use App\Cores\Flash;
use App\Services\Auth;

class QurbanController
{
    public function index()
    {
        $qurban = new Qurban();
        $qurbans = $qurban->withUser(); // inner join ke users

        echo Views::render('qurban.index', [
            'qurbans' => $qurbans,
            'user' => Auth::user(),
            'role' => Auth::user()->role
        ]);
    }

    public function create()
    {
        $user = new User();
        $users = $user->all();

        echo Views::render('qurban.create', [
            'users' => $users,
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
            'jenis_hewan' => 'required',
            'jumlah' => 'required'
        ]);

        if ($validate->fails()) {
            foreach ($validate->errors() as $field => $messages) {
                foreach ($messages as $msg) {
                    Flash::set("error_$field", $msg);
                }
            }
            header('Location: /qurban/create');
            exit;
        }

        $biaya_per_ekor = $data['jenis_hewan'] === 'sapi' ? 3000000 : 2750000;
        $total_biaya = $biaya_per_ekor * $data['jumlah'];

        $qurban = new Qurban();
        $qurban->create([
            'user_id' => $data['user_id'],
            'jenis_hewan' => $data['jenis_hewan'],
            'jumlah' => $data['jumlah'],
            'biaya' => $total_biaya,
            'status_bayar' => $data['status_bayar'] ?? 'belum'
        ]);

        header('Location: /qurban');
        exit;
    }

    public function edit($id)
    {
        $qurban = new Qurban();
        $found = $qurban->where('id', '=', $id)->first();

        $user = new User();
        $users = $user->all();

        echo Views::render('qurban.edit', [
            'qurban' => $found,
            'users' => $users,
            'user' => Auth::user(),
            'role' => Auth::user()->role
        ]);
    }

    public function update($id)
    {
        $data = $_POST;
        $qurban = new Qurban();

        $biaya_per_ekor = $data['jenis_hewan'] === 'sapi' ? 3000000 : 2750000;
        $total_biaya = $biaya_per_ekor * $data['jumlah'];

        $qurban->where('id', '=', $id)->update([
            'user_id' => $data['user_id'],
            'jenis_hewan' => $data['jenis_hewan'],
            'jumlah' => $data['jumlah'],
            'biaya' => $total_biaya,
            'status_bayar' => $data['status_bayar']
        ]);

        header('Location: /qurban');
        exit;
    }

    public function delete($id)
    {
        $qurban = new Qurban();
        $qurban->delete($id); // ✅ langsung pakai delete($id)

        header('Location: /qurban');
        exit;
    }

}
