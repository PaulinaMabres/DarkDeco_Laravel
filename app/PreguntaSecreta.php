<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecretQuestion extends Model
{
  public $table = "SecretQuestions";
  // public $primaryKey = "id";
  // public $timeStamps = false;
  public $guarded = [];
}
