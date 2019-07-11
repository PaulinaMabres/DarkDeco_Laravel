<?php

use Illuminate\Database\Seeder;
use App\Color;

class ColorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Color::create(['color' => 'Blanco']);
      Color::create(['color' => 'Negro']);
      Color::create(['color' => 'Gris']);
      Color::create(['color' => 'Azul']);
      Color::create(['color' => 'Verde']);
      Color::create(['color' => 'Rojo']);
      Color::create(['color' => 'Amarillo']);
      Color::create(['color' => 'Violeta']);
      Color::create(['color' => 'Marrón']);
    }
}
