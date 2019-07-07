<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
  $path = storage_path('app/public/product'); // Carpeta product creada en storage/app/public

  return [
    'nombre' => $faker->sentence(3),
    'Color_id' => $faker->numberBetween(0, 10),
    'foto' => $faker->image($path, 480, 600,'food', false), //documentación de faker.
    'precio' => $faker->randomFloat(2, 300, 4000),
    'descripcion' => $faker->sentence(20),
    'stock' => $faker->numberBetween(0, 100),
    'categoria_id' => $faker->numberBetween(0, 10),

    // TODO: Generar 10 Colores y 10 categorias
  ];
});
