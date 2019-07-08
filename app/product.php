<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
  public $table = "products";
  // public $primaryKey = "id";
  // public $timeStamps = false;
  public $guarded = [];
}
