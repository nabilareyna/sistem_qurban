<?php

namespace App\Models;

use App\Cores\Model;

class Keuangan extends Model
{
    protected $table = 'keuangan';
    protected $fillable = ['tipe', 'kategori', 'jumlah', 'catatan', 'created_at'];
}
