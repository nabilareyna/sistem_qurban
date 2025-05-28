<?php 
namespace App\Models;

use App\Cores\Model;
class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'username', 'password', 'nik', 'alamat', 'no_hp'];
}