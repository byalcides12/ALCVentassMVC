<?php
namespace libs;

use Libs\Connection;

class Dao
{
    protected $dao;

    public function loadConnection()
    {
        $this->pdo = Connection::getInstance()->getConnection();
    }
}