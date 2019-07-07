<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
        'categoria' => 'sillas',
        ]);
        Category::create([
        'categoria' => 'mesas',
        ]);
        Category::create([
        'categoria' => 'camas',
        ]);
        Category::create([
        'categoria' => 'escritorios',
        ]);
        Category::create([
        'categoria' => 'bibliotecas',
        ]);
        Category::create([
        'categoria' => 'armarios',
        ]);
        Category::create([
        'categoria' => 'sofas',
        ]);
        Category::create([
        'categoria' => 'iluminacion',
        ]);
        Category::create([
        'categoria' => 'banquetas',
        ]);
        Category::create([
        'categoria' => 'alfombras',
        ]);
        Category::create([
        'categoria' => 'cortinas',
        ]);
        Category::create([
        'categoria' => 'decoracion',
        ]);
    }
}
