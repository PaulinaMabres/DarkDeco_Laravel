<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
  /**
  * Run the database seeds.
  *
  * @return void
  */
  public function run()
  {
    Category::create([
      'categoria' => 'muebles',
    ]);
    Category::create([
      'categoria' => 'iluminacion',
    ]);
    Category::create([
      'categoria' => 'decoracion',
    ]);
    Category::create([
      'categoria' => 'textiles',
    ]);
  }
}
