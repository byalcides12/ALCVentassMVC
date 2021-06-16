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
}
