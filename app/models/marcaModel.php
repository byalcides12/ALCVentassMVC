<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Libs\Connection;

class MarcaModel extends Model
{
    protected $table = "marcas";
    protected $primaryKey = "IdMarca";
    public $timestamps = false;
    protected $fillable = ['Nombre', 'Descripcion', 'Estado'];

    // public function productos()
    // {
    //     return $this->belongsTo(ProductoModel::class, 'IdMarca');
    // }
}
