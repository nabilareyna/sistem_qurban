<?php

namespace App\Models;
use App\Cores\Model;

class Hewan extends Model
{
    protected $table = 'hewans';
    protected $primaryKey = 'id';
    protected $fillable = ['jenis', 'harga'];
}
