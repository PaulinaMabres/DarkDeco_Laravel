<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
  $path = storage_path('app/public/product'); // Carpeta product creada en storage/app/public

  // Estas son las categorías posibles de imagenes que encontré en http://apigen.juzna.cz/doc/fzaninotto/Faker/class-Faker.Provider.Image.html
  // 'abstract', 'animals', 'business', 'cats', 'city', 'food', 'nightlife', 'fashion', 'people', 'nature', 'sports', 'technics', 'transport'
  // $categorias = ["furniture","lamps","decoration","textiles"];
  $categorias = ["city","nightlife","nature","fashion"];
  $categoria = $faker->numberBetween(1, 4);

  return [
    'nombre' => $faker->sentence(3),
    'Color_id' => $faker->numberBetween(1, 9),
    'foto' => $faker->image($path, 480, 600, $categorias[$categoria-1], false), //documentación de faker.
    'precio' => $faker->randomFloat(2, 300, 4000),
    'descripcion' => $faker->sentence(20),
    'stock' => $faker->numberBetween(0, 100),
    'categoria_id' => $categoria
  ];
});
