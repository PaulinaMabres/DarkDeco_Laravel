<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
  public $table = "carts";
  // public $primaryKey = "id";
  // public $timeStamps = false;
  public $guarded = [];
}
