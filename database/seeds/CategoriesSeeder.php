<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Category::create(['categoryName' => 'Habitación']);
      Category::create(['categoryName' => 'Cocina']);
      Category::create(['categoryName' => 'Lavabo']);
      Category::create(['categoryName' => 'Outdoor']);
      Category::create(['categoryName' => 'Navidad']);
    }
}
