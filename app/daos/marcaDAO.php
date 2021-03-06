<?php

namespace App\Daos;

use App\Models\MarcaModel;
use Libs\Dao;
use stdClass;

class MarcaDao extends Dao
{
    public function __construct()
    {
        $this->loadEloquent();
    }
    public function getAll(bool $estado)
    {
        $result = MarcaModel::where('Estado', $estado)->orderBy('IdMarca', 'DESC')->get();
        return $result;
    }

    public function get(int $id)
    {
        $model = MarcaModel::find($id);

        if (is_null($model)) {
            $model = new stdClass();
            $model->IdMarca = 0;
            $model->Nombre = '';
            $model->Descripcion = '';
            $model->Estado = 0;
        }
        return $model;
    }

    public function create($obj)
    {
        $model = new MarcaModel();
        $model->IdMarca = $obj->IdMarca;
        $model->Nombre = $obj->Nombre;
        $model->Descripcion = $obj->Descripcion;
        $model->Estado = $obj->Estado;
        return $model->save();
    }
    public function update($obj)
    {
        $model = MarcaModel::find($obj->IdMarca);
        $model->Nombre = $obj->Nombre;
        $model->Descripcion = $obj->Descripcion;
        $model->Estado = $obj->Estado;
        return $model->save();
    }
    public function delete(int $id)
    {
        $model = MarcaModel::find($id);
        return $model->delete();
    }
    public function baja(int $id)
    {
        $sql = "UPDATE marcas set estado='false' WHERE idmarca=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }
}
