<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Libs\Connection;

class ProductoModel extends Model
{
    protected $table = "productos";
    protected $primaryKey = "IdProducto";
    public $timestamps = false;
    protected $fillable = ['IdCategoria', 'IdMarca', 'IdProveedor', 'Nombre', 'Descripcion', 'Estado'];

    public function categorias()
    {
        return $this->belongsTo(CategoriaModel::class, 'IdCategoria', 'IdCategoria');   
    }
    public function marcas()
    {
        return $this->belongsTo(MarcaModel::class, 'IdMarca', 'IdMarca');
    }
    public function proveedores()
    {
        return $this->belongsTo(ProveedorModel::class, 'IdProveedor', 'IdProveedor');
    }
}


