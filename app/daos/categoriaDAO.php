<?php

namespace App\Daos;

use libs\Dao;

class CategoriaDAO extends Dao
{
    public function __construct()
    {
        $this->loadConnection();
    }
    public function getAll()
    {

        $sql = "SELECT idcateg, nombre, descripcion FROM categorias";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function get(int $id)
    {
        $result = null;
        
        if ($id > 0) {

            $sql = "SELECT idcateg, nombre, descripcion FROM categorias WHERE idcateg=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $id, \PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_OBJ);
        }

        return $result;
    }
}