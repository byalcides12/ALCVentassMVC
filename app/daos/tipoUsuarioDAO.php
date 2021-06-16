<?php

namespace App\Daos;

use App\Models\TipoUsuarioModel;
use App\Models\TipousuarioModel as ModelsTipousuarioModel;
use Libs\Dao;
use stdClass;

class TipoUsuarioDao extends Dao
{
    public function __construct()
    {
        $this->loadEloquent();
    }
    public function getAll(bool $estado)
    {
        $result = TipoUsuarioModel::where('Estado', $estado)->orderBy('IdUs', 'DESC')->get();
        return $result;
    }

    public function get(int $id)
    {
        $model = TipoUsuarioModel::find($id);

        if (is_null($model)) {
            $model = new stdClass();
            $model->IdUs = 0;
            $model->Nombre = '';
            $model->Cargo = '';
            $model->Estado = 0;
        }
        return $model;
    }

    public function create($obj)
    {
        $model = new TipoUsuarioModel();
        $model->IdUs = $obj->IdUs;
        $model->Nombre = $obj->Nombre;
        $model->Cargo = $obj->Cargo;
        $model->Estado = $obj->Estado;
        return $model->save();
    }
    public function update($obj)
    {
        $model = TipoUsuarioModel::find($obj->IdUs);
        $model->Nombre = $obj->Nombre;
        $model->Cargo = $obj->Cargo;
        $model->Estado = $obj->Estado;
        return $model->save();
    }
    public function delete(int $id)
    {
        $model = TipoUsuarioModel::find($id);
        return $model->delete();
    }
    public function baja(int $id)
    {
        $sql = "UPDATE tipousuario set estado='false' WHERE idus=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }
}
