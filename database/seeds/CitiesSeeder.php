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
    // https://infra.datos.gob.ar/catalog/modernizacion/dataset/7/distribution/7.27/download/localidades-censales.json    
    {
      City::create([
        'cityName' => 'Buenos Aires',
        'postCode' => '1234'
      ]);
      City::create([
        'cityName' => 'Quilmes',
        'postCode' => '4568'
      ]);
      City::create([
        'cityName' => 'Bernal',
        'postCode' => '3456'
      ]);
      City::create([
        'cityName' => 'Adrogué',
        'postCode' => '8645'
      ]);
      City::create([
        'cityName' => 'Pilar',
        'postCode' => '9321'
      ]);
      City::create([
        'cityName' => 'San Isidro',
        'postCode' => '9188'
      ]);
      City::create([
        'cityName' => 'Avellaneda',
        'postCode' => '9021'
      ]);
      City::create([
        'cityName' => 'Tigre',
        'postCode' => '1568'
      ]);
      City::create([
        'cityName' => 'Vicente López',
        'postCode' => '4568'
      ]);
      City::create([
        'cityName' => 'San Fernando',
        'postCode' => '9654'
      ]);
      City::create([
        'cityName' => 'Lomas de Zamora',
        'postCode' => '3654'
      ]);
      City::create([
        'cityName' => 'Escobar',
        'postCode' => '7521'
      ]);
    }
}
