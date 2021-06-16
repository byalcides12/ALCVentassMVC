<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Libs\Connection;

class ProveedorModel extends Model
{
    protected $table = "Proveedores";
    protected $primaryKey = "IdProveedor";
    public $timestamps = false;
    protected $fillable = ['Nombre', 'Direccion', 'Telefono', 'Estado'];

    // public function productos()
    // {
    //     return $this->belongsTo(ProductoModel::class, 'IdProveedor');
    // }
}
