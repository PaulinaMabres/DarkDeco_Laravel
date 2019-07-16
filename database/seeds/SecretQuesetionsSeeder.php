<?php

use Illuminate\Database\Seeder;
use App\SecretQuestion;

class SecretQuestionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      SecretQuestion::create([ 'question' => 'Nombre de tu escuela primaria']);
      SecretQuestion::create([ 'question' => 'Nombre de tu superhéroe favorito']);
      SecretQuestion::create([ 'question' => 'Año de nacimiento de tu madre']);
    }
}
