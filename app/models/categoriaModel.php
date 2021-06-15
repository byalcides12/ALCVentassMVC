<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Libs\Connection;

class CategoriaModel extends Model
{
    protected $table = "categorias";
    protected $primaryKey = "IdCategoria";
    public $timestamps = false;
    protected $fillable = ['Nombre', 'Descripcion', 'Estado'];
}