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
      Bank::create(['bankName' => 'Santander']);
      Bank::create(['bankName' => 'Galicia']);
      Bank::create(['bankName' => 'HSBC']);
    }
}
