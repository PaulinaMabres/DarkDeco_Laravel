<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  public $table = "cities";
  // public $primaryKey = "id";
  // public $timeStamps = false;
  public $guarded = [];
}
