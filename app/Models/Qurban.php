<?php

namespace App\Models;

use App\Cores\Model;

class Qurban extends Model
{
    protected $table = 'qurbans';
    protected $primaryKey = 'id';

    protected $fillable = ['user_id', 'hewan_id', 'jumlah'];

    public function withHewanAndUser()
    {
        $sql = "SELECT qurbans.*, 
                       users.name AS user_name, users.nik, 
                       hewans.jenis AS hewan_jenis, hewans.harga AS hewan_harga
                FROM qurbans
                JOIN users ON qurbans.user_id = users.id
                JOIN hewans ON qurbans.hewan_id = hewans.id";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function totalDaging()
    {
        $beratSapi = 100000;    // 100 kg
        $beratKambing = 100000; // 100 kg

        $sql = "SELECT jenis, COUNT(*) AS jumlah FROM hewans GROUP BY jenis";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll();

        $total = 0;
        foreach ($rows as $row) {
            if ($row->jenis === 'sapi') {
                $total += $row->jumlah * $beratSapi;
            } elseif ($row->jenis === 'kambing') {
                $total += $row->jumlah * $beratKambing;
            }
        }

        return $total;
    }
}
