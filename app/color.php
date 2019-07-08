<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
  public $table = "colors";
  // public $primaryKey = "id";
  // public $timeStamps = false;
  public $guarded = [];
}
