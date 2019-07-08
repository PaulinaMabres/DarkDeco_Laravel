<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  public $table = "categories";
  // public $primaryKey = "id";
  // public $timeStamps = false;
  public $guarded = [];
}
