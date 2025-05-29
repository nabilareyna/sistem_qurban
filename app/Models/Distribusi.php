<?php

namespace App\Models;

use App\Cores\Model;

class Distribusi extends Model
{
    protected $table = 'distribusi';
    protected $fillable = ['user_id', 'jumlah_daging', 'status_ambil'];

    public function withUser()
    {
        $sql = "SELECT d.*, u.name, u.nik FROM distribusi d JOIN users u ON d.user_id = u.id";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
