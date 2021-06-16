<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Libs\Connection;

class TipousUarioModel extends Model
{
    protected $table = "tipousuario";
    protected $primaryKey = "IdUs";
    public $timestamps = false;
    protected $fillable = ['Nombre', 'Cargo', 'Estado'];
}
