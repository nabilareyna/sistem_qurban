<?php

namespace App\Controllers;

use App\Cores\Views;
use App\Models\Distribusi;
use App\Models\User;
use App\Services\Auth;
use App\Cores\Validate;
use App\Cores\Flash;

class DistribusiController
{
    public function index()
    {
        $model = new Distribusi();
        $data = $model->withUser(); // gabung user

        $TOTAL_KAMBING = 100000; // gram
        $TOTAL_SAPI = 100000;    // gram
        $TOTAL_DAGING = $TOTAL_KAMBING + $TOTAL_SAPI;

        // Hitung total yang sudah dibagikan
        $total_terdistribusi = array_reduce($data, fn($carry, $d) => $carry + $d->jumlah_daging, 0);

        $sisa_daging = $TOTAL_DAGING - $total_terdistribusi;

        
        echo Views::render('distribusi.index', [
            'distribusi' => $data,
            'total' => $TOTAL_DAGING,
            'terdistribusi' => $total_terdistribusi,
            'sisa' => $sisa_daging,
            'user' => Auth::user(),
            'role' => Auth::user()->role
        ]);
    }

    public function create()
    {
        $user = new User();
        $users = $user->all();

        echo Views::render('distribusi.create', [
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
            'jumlah_daging' => 'required'
        ]);

        if ($validate->fails()) {
            foreach ($validate->errors() as $field => $messages) {
                foreach ($messages as $msg) {
                    Flash::set("error_$field", $msg);
                }
            }
            header('Location: /admin/distribusi/create');
            exit;
        }

        $model = new Distribusi();
        $model->create([
            'user_id' => $data['user_id'],
            'jumlah_daging' => $data['jumlah_daging'],
            'status_ambil' => $data['status_ambil'] ?? 'belum'
        ]);

        header('Location: /admin/distribusi');
        exit;
    }

    public function edit($id)
    {
        $model = new Distribusi();
        $found = $model->where('id', '=', $id)->first();

        $users = (new User())->all();

        echo Views::render('distribusi.edit', [
            'data' => $found,
            'users' => $users,
            'user' => Auth::user(),
            'role' => Auth::user()->role
        ]);
    }

    public function update($id)
    {
        $data = $_POST;
        $model = new Distribusi();

        $model->where('id', '=', $id)->update([
            'user_id' => $data['user_id'],
            'jumlah_daging' => $data['jumlah_daging'],
            'status_ambil' => $data['status_ambil']
        ]);

        header('Location: /admin/distribusi');
        exit;
    }

    public function delete($id)
    {
        $model = new Distribusi();
        $model->delete($id);

        header('Location: /admin/distribusi');
        exit;
    }
}
