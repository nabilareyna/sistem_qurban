<?php
namespace App\Controllers;

use App\Cores\Views;
use App\Models\User;
use App\Services\Auth;

class AdminController
{
    public function showUsers()
    {
        $user = new User();
        $all = $user->all(); // pastikan kamu punya method all() di model

        echo Views::render('admin.users', [
            'users' => $all,
            'role' => Auth::user()->role,
            'user' => Auth::user()
        ]);
    }

    public function deleteUser($id)
    {
        $user = new User();
        $hapus = $user->delete($id);

        if ($hapus) {
            header('Location: /admin/users');
            exit;
        }

        echo "Gagal dihapus";
        exit;
    }

    public function editUser($id)
    {
        $user = new User();
        $found = $user->where('id', '=', $id)->first();

        echo Views::render('admin.edit-user', [
            'edit' => $found,
            'user' => Auth::user(),
            'role' => Auth::user()->role
        ]);
    }

    public function updateUser($id)
    {
        $data = $_POST;
        $user = new User();

        $simpan = $user->update($id, [
            'username' => $data['username'],
            'name' => $data['name'],
            'role' => $data['role']
        ]);

        if (!empty($data['password'])) {
            $updateData['password'] = Auth::bcrypt($data['password']);
        }

        if ($simpan) {
            header('Location: /admin/users');
            exit;
        }

        echo "Gagal disimpan";
        exit;
    }

}
