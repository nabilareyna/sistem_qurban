<?php

namespace App\Models;

use App\Cores\Model;

class Qurban extends Model
{
    protected $table = 'qurbans';
    protected $fillable = ['user_id', 'jenis_hewan', 'jumlah', 'biaya', 'status_bayar'];

    public function withUser()
    {
        $sql = "SELECT q.*, u.name, u.nik FROM qurbans q JOIN users u ON q.user_id = u.id";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
}
