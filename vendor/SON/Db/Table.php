<?php

namespace SON\Db;

abstract class Table
{
    /**
     * @var \PDO
     */
    protected $db;

    protected $table;

    public function __construct(\PDO $db)
    {
        $this->db = $db;
    }

    public function fetchAll($where = null)
    {
        $query = "select * from {$this->table}";
        if (!is_null($where)){
            $query .= ' '. $where;
        }
        return $this->db->query($query);
    }

    public function find($id)
    {
        $stmt = $this->db->prepare("select * from {$this->table} where id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function delete($id)
    {
        $stmt = $this->db->prepare("delete from {$this->table} where id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
}