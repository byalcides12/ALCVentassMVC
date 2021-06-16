<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Libs\Connection;

class TipoUsuarioModel extends Model
{
    protected $table = "tipo_usuario";
    protected $primaryKey = "IdUs";
    public $timestamps = false;
    protected $fillable = ['Nombre', 'Cargo', 'Estado'];
}
