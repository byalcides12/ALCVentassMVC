<?php

namespace App\Daos;
use App\Models\ProveedorModel;
use Libs\Dao;
use stdClass;

class ProveedorDao extends Dao
{
    public function __construct()
    {
        $this->loadEloquent();
    }
    public function getAll(bool $estado)
    {
        $result = ProveedorModel::where('Estado', $estado)->orderBy('IdProveedor', 'DESC')->get();
        return $result;
    }

    public function get(int $id)
    {
        $model = ProveedorModel::find($id);

        if (is_null($model)) {
            $model = new stdClass();
            $model->IdProveedor = 0;
            $model->Nombre = '';
            $model->Direccion = '';
            $model->Telefono = '';
            $model->Estado = 0;
        }
        return $model;
    }

    public function create($obj)
    {
        $model = new ProveedorModel();
        $model->IdProveedor = $obj->IdProveedor;
        $model->Nombre = $obj->Nombre;
        $model->Direccion = $obj->Direccion;
        $model->Telefono = $obj->Telefono;
        $model->Estado = $obj->Estado;
        return $model->save();
    }
    public function update($obj)
    {
        $model = ProveedorModel::find($obj->IdProveedor);
        $model->Nombre = $obj->Nombre;
        $model->Direccion = $obj->Direccion;
        $model->Telefono = $obj->Telefono;
        $model->Estado = $obj->Estado;
        return $model->save();
    }
    public function delete(int $id)
    {
        $model = ProveedorModel::find($id);
        return $model->delete();
    }
    public function baja(int $id)
    {
        $sql = "UPDATE proveedores set estado='false' WHERE idproveedor=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }
}
