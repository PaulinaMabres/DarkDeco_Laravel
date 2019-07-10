<?php

use Illuminate\Database\Seeder;
use App\PreguntaSecreta;
class PreguntasSecretas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PreguntaSecreta::create([ 'pregunta' => 'Nombre de tu escuela primaria',]);
        PreguntaSecreta::create([ 'pregunta' => 'Nombre de tu superhéroe favorito',]);
        PreguntaSecreta::create([ 'pregunta' => 'Año de nacimiento de tu madre',]);
    }
}
