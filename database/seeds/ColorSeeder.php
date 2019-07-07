<?php

use Illuminate\Database\Seeder;
use App\Pokemon;

class PokemonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Color::create([
            'Color' => 'Blanco',
        ]);
        Color::create([
            'Color' => 'Negro',
        ]);
        Color::create([
            'Color' => 'Gris',
        ]);
        Color::create([
            'Color' => 'Azul',
        ]);
        Color::create([
            'Color' => 'Verde',
        ]);
        Color::create([
            'Color' => 'Rojo',
        ]);
        Color::create([
            'Color' => 'Amarillo',
        ]);
        Color::create([
            'Color' => 'Violeta',
        ]);
        Color::create([
            'Color' => 'Marrón',
        ]);
    }
}
