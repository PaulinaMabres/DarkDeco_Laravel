<?php

use Illuminate\Database\Seeder;
use App\City;

class CitiesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      City::create([
        'name' => 'Buenos Aires',
        'postCode' => '1234'
      ]);
      City::create([
        'name' => 'Quilmes',
        'postCode' => '4568'
      ]);
      City::create([
        'name' => 'Bernal',
        'postCode' => '3456'
      ]);
      City::create([
        'name' => 'Adrogué',
        'postCode' => '8645'
      ]);
      City::create([
        'name' => 'Pilar',
        'postCode' => '9321'
      ]);
      City::create([
        'name' => 'San Isidro',
        'postCode' => '9188'
      ]);
      City::create([
        'name' => 'Avellaneda',
        'postCode' => '9021'
      ]);
      City::create([
        'name' => 'Tigre',
        'postCode' => '1568'
      ]);
      City::create([
        'name' => 'Vicente López',
        'postCode' => '4568'
      ]);
      City::create([
        'name' => 'San Fernando',
        'postCode' => '9654'
      ]);
      City::create([
        'name' => 'Lomas de Zamora',
        'postCode' => '3654'
      ]);
      City::create([
        'name' => 'Escobar',
        'postCode' => '7521'
      ]);
    }
}
