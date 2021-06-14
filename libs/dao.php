<?php
namespace Libs;

use Libs\Connection;

class Dao
{
    protected $dao;
    protected $db;

    public function loadConnection()
    {
        $this->pdo = Connection::getInstance()->getConnection();
    }

    public function loadEloquent()
    {
        $this->db = new Database();
    }
}