<?php

use Illuminate\Database\Seeder;
use App\Bank;

class BanksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Bank::create(['name' => 'Santander']);
      Bank::create(['name' => 'Galicia']);
      Bank::create(['name' => 'HSBC']);
    }
}
