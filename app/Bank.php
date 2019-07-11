<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
  public $table = "banks";
  // public $primaryKey = "id";
  // public $timeStamps = false;
  public $guarded = [];
}
