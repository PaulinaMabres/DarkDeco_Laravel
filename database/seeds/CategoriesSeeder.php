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
      Category::create(['categoria' => 'Habitación']);
      Category::create(['categoria' => 'Cocina']);
      Category::create(['categoria' => 'Lavabo']);
      Category::create(['categoria' => 'Outdoor']);
    }
}
