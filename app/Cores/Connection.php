<?php

namespace App\Cores;

class Connection
{
    protected $host = '127.0.0.1';
    protected $db = 'sistem_informasi_qurban';
    protected $username = 'root';
    protected $password = 'admin';
    protected $connect;

    public function __construct()
    {
        try {
            $rule = "mysql:host={$this->host};dbname={$this->db};charset=utf8mb4";
            $pdo = new \PDO($rule, $this->username, $this->password, [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
                \PDO::ATTR_EMULATE_PREPARES   => false,
            ]);

        } catch (\PDOException $e) {
            throw new \Exception("Connection Error: {$e->getMessage()}");
        }
        $this->connect = $pdo;
    }
    
}