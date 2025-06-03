<?php

namespace App\Models;

use App\Cores\Model;

class Distribusi extends Model
{
    protected $table = 'distribusi';
    protected $primaryKey = 'id';
    protected $fillable = ['user_id', 'jumlah_daging', 'status_ambil', 'token']; // Tambah token

    public function totalTerdistribusi()
    {
        $sql = "SELECT SUM(jumlah_daging) AS total FROM distribusi";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        return $result->total ?? 0;
    }

    public function withUser()
    {
        $sql = "SELECT d.id, d.user_id, d.jumlah_daging, d.status_ambil, d.token,
                       u.name, u.nik, u.role 
                FROM distribusi d 
                JOIN users u ON d.user_id = u.id";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function withUserByToken($token)
    {
        $sql = "SELECT d.*, u.name, u.nik, u.role 
            FROM distribusi d 
            JOIN users u ON d.user_id = u.id
            WHERE d.token = :token
            LIMIT 1";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(':token', $token);
        $stmt->execute();
        return $stmt->fetch();
    }
    
    public function withUserAndRoleById($id)
    {
        $sql = "SELECT d.*, u.name, u.nik, u.role 
                FROM distribusi d
                JOIN users u ON d.user_id = u.id
                WHERE d.id = :id
                LIMIT 1";
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

}
