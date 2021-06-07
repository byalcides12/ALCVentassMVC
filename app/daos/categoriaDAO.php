<?php

namespace App\Daos;

use Libs\Dao;
use stdClass;

class CategoriaDAO extends Dao
{
    public function __construct()
    {
        $this->loadConnection();
    }
    public function getAll(bool $estado)
    {
        $sql = "SELECT codcategoria, nombre, descripcion FROM categoria WHERE estado = ?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $estado, \PDO::PARAM_BOOL);
        $stmt->execute();
        $result = $stmt->fetchAll(\PDO::FETCH_OBJ);
        return $result;
    }

    public function get(int $id)
    {
        if ($id > 0) {

            $sql = "SELECT codcategoria, nombre, descripcion FROM categoria WHERE codcategoria=?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(1, $id, \PDO::PARAM_INT);
            $stmt->execute();
            $result = $stmt->fetchAll(\PDO::FETCH_OBJ);
        }else{
            $result = new stdClass;
            $result->codcategoria = 0;
            $result->nombre = '';
            $result->descripcion = '';
            $result->estado = false;
        }

        return $result;
    }
    public function create($obj)
    {
        $sql = "INSERT INTO categoria(nombre, descripcion, estado) VALUES (?,?,?)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $obj->nombre, \PDO::PARAM_INT);
        $stmt->bindParam(2, $obj->descripcion, \PDO::PARAM_STR);
        $stmt->bindParam(3, $obj->estado, \PDO::PARAM_BOOL);

        return $stmt->execute();
    }

    public function update($obj)
    {
        $sql = "UPDATE categoria SET nombre=?, descripcion=?, estado=? WHERE codcategoria=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $obj->nombre, \PDO::PARAM_INT);
        $stmt->bindParam(2, $obj->descripcion, \PDO::PARAM_STR);
        $stmt->bindParam(3, $obj->estado, \PDO::PARAM_BOOL);
        $stmt->bindParam(4, $obj->codcategoria, \PDO::PARAM_INT);

        return $stmt->execute();
    }

    public function delete(int $id)
    {
        $sql = "DELETE FROM categoria WHERE codcategoria=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function baja(int $id)
    {
        $sql = "UPDATE categoria SET estado='false' WHERE codcategoria=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }
}