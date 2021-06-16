<?php

namespace App\Daos;

use App\Models\ProductoModel;
use Libs\Dao;
use stdClass;

class ProductoDao extends Dao
{
    public function __construct()
    {
        $this->loadEloquent();
    }
    public function getAll(bool $estado)
    {
        $result = ProductoModel:: with('proveedores', 'marcas', 'categorias')-> where('Estado', $estado)->orderBy('IdProducto', 'DESC')->get();
        return $result;
    }

    public function get(int $id)
    {
        $model = ProductoModel::find($id);

        if (is_null($model)) {
            $model = new stdClass();
            $model->IdProducto = 0;
            $model->IdMarca = 0;
            $model->IdCategoria = 0;
            $model->IdProveedor = 0;
            $model->Nombre = '';
            $model->Descripcion = '';
            $model->Estado = 0;
        }
        return $model;
    }

    public function create($obj)
    {
        $model = new ProductoModel();
        $model->IdProducto = $obj->IdProducto;
        $model->IdMarca = $obj->IdMarca;
        $model->IdCategoria = $obj->IdCategoria;
        $model->IdProveedor = $obj->IdProveedor;
        $model->Nombre = $obj->Nombre;
        $model->Descripcion = $obj->Descripcion;
        $model->Estado = $obj->Estado;
        return $model->save();
    }
    public function update($obj)
    {
        $model = ProductoModel::find($obj->IdProducto);
        $model->IdMarca = $obj->IdMarca;
        $model->IdCategoria = $obj->IdCategoria;
        $model->IdProveedor = $obj->IdProveedor;
        $model->Nombre = $obj->Nombre;
        $model->Descripcion = $obj->Descripcion;
        $model->Estado = $obj->Estado;
        return $model->save();
    }
    public function delete(int $id)
    {
        $model = ProductoModel::find($id);
        return $model->delete();
    }
    public function baja(int $id)
    {
        $sql = "UPDATE productos set estado='false' WHERE idproducto=?";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(1, $id, \PDO::PARAM_INT);
        return $stmt->execute();
    }
}
