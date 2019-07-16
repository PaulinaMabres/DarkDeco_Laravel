<?php

use Illuminate\Database\Seeder;
use App\Brand;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Brand::create(['brandName' => 'Fontenla']);
      Brand::create(['brandName' => 'Eames']);
      Brand::create(['brandName' => 'Ikea']);
      Brand::create(['brandName' => 'Bo Concept']);
      Brand::create(['brandName' => 'Corfam']);
    }
}
