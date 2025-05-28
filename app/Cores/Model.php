<?php
namespace App\Cores;
use App\Cores\Connection;
class Model extends Connection
{
    protected $table;
    protected $primaryKey;
    protected $fillable = [];
    protected $attributes = [];
    protected $stmt;

    public function all()
    {
        $sql = "SELECT * FROM {$this->table}";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function find($id)
    {
        $sql = "SELECT * FROM {$this->table} WHERE {$this->primaryKey} = :id LIMIT 1";
        $stmt = $this->connect->prepare($sql);

        $stmt->bindParam(':id', $id);
        $stmt->execute();

        return $stmt->fetch();
    }

    public function create($data = [])
    {
        $attributes = [];
        foreach ($data as $key => $value) {
            if (in_array($key, $this->fillable)) {
                $attributes[$key] = $value;
            }
        }

        $columns = array_keys($attributes);
        $values = array_values($attributes);

        $placeholder = array_fill(0, count($columns), '?');

        $sql = "INSERT INTO {$this->table} (" . implode(', ', $columns) . ") VALUES (" . implode(', ', $placeholder) . ")";

        $stmt = $this->connect->prepare($sql);

        return $stmt->execute($values);
    }

    public function update($id, $data = [])
    {
        //buat placeholders
        $columns = [];
        foreach ($data as $key => $value) {
            $columns[] = "{$key} = :{$key}";
        } // ['name = :name','email = :email', 'password = :password'];

        $sql = "UPDATE {$this->table} SET " . implode(', ', $columns) . " WHERE {$this->primaryKey} = :id";

        $stmt = $this->connect->prepare($sql);

        $stmt->bindParam(':id', $id);

        foreach ($data as $key => &$value) {
            $stmt->bindParam(":{$key}", $value);
        }

        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM {$this->table} WHERE {$this->primaryKey} = :id";
        $stmt = $this->connect->prepare($sql);

        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }

    public function where($column, $compare, $value)
    {
        $param = ':' . $column;

        $sql = "SELECT * FROM {$this->table} WHERE {$column} {$compare} $param";
        $this->stmt = $this->connect->prepare($sql);
        $this->stmt->bindParam($param, $value);

        return $this;
    }


    public function get()
    {
        if (!$this->stmt) {
            throw new \Exception("Query not prepared. Use where() method first.");
        }

        $this->stmt->execute();
        return $this->stmt->fetchAll();
    }

    public function first()
    {
        if (!$this->stmt) {
            throw new \Exception("Query not prepared. Use where() method first.");
        }

        $this->stmt->execute();
        return $this->stmt->fetch();
    }
}