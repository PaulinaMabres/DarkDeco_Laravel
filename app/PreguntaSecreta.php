<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PreguntaSecreta extends Model
{
  public $table = "preguntas_secretas";
  // public $primaryKey = "id";
  // public $timeStamps = false;
  public $guarded = [];
}
