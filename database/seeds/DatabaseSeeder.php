<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
  /**
  * Seed the application's database.
  *
  * @return void
  */
  public function run()
  {
    // $this->call(UsersTableSeeder::class);
    // $this->call(ColorSeeder::class);
    // $this->call(CategorySeeder::class);
    factory(\App\Product::class, 20)->create(); //Crea los prodcutos definidos en el factory.
  }
}
