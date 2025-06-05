<?php

namespace App\Controllers;

use App\Cores\Views;
use App\Models\Keuangan;
use App\Services\Auth;
use App\Cores\Validate;
use App\Cores\Flash;

class KeuanganController
{
    public function index()
    {
        $model = new Keuangan();
        $data = $model->all();

        $total_masuk = 0;
        $total_keluar = 0;

        foreach ($data as $d) {
            if ($d->tipe === 'masuk') $total_masuk += $d->jumlah;
            if ($d->tipe === 'keluar') $total_keluar += $d->jumlah;
        }

        echo Views::render('keuangan.index', [
            'keuangan' => $data,
            'masuk' => $total_masuk,
            'keluar' => $total_keluar,
            'saldo' => $total_masuk - $total_keluar,
            'user' => Auth::user(),
            'role' => Auth::user()->role
        ]);
    }

    public function create()
    {
        echo Views::render('keuangan.create', [
            'user' => Auth::user(),
            'role' => Auth::user()->role
        ]);
    }

    public function store()
    {
        $data = $_POST;

        $validate = new Validate();
        $validate->validate($data, [
            'tipe' => 'required',
            'kategori' => 'required',
            'jumlah' => 'required',
        ]);

        if ($validate->fails()) {
            foreach ($validate->errors() as $field => $messages) {
                foreach ($messages as $msg) {
                    Flash::set("error_$field", $msg);
                }
            }
            header('Location: /admin/keuangan/create');
            exit;
        }

        $model = new Keuangan();
        $model->create([
            'tipe' => $data['tipe'],
            'kategori' => $data['kategori'],
            'jumlah' => $data['jumlah'],
            'catatan' => $data['catatan'] ?? null,
            'created_at' => $data['created_at'] . ' ' . date('H:i:s')
        ]);

        header('Location: /admin/keuangan');
        exit;
    }

    public function edit($id)
    {
        $model = new Keuangan();
        $found = $model->where('id', '=', $id)->first();

        echo Views::render('keuangan.edit', [
            'data' => $found,
            'user' => Auth::user(),
            'role' => Auth::user()->role
        ]);
    }

    public function update($id)
    {
        $data = $_POST;
        $model = new Keuangan();

        $model->where('id', '=', $id)->update([
            'tipe' => $data['tipe'],
            'kategori' => $data['kategori'],
            'jumlah' => $data['jumlah'],
            'catatan' => $data['catatan']
        ]);

        header('Location: /admin/keuangan');
        exit;
    }

    public function delete($id)
    {
        $model = new Keuangan();
        $model->delete($id);

        header('Location: /admin/keuangan');
        exit;
    }
}
