<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RespuestaSecreta extends Model
{
    protected $table = 'respuesta_secretas';
    protected $primaryKey = 'id';
    // protected $id = 
    // protected $user_id = 
    // protected $preguntas_secretas_id = 
    // protected $respuesta = 
    public $guarded = [];
}
