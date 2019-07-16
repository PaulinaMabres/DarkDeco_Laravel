<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Product;
use App\Brand;
use App\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
  $path = storage_path('app/public/product'); // Carpeta product creada en app/storage/public

  // Estas son las categorías posibles de imagenes que encontré en http://apigen.juzna.cz/doc/fzaninotto/Faker/class-Faker.Provider.Image.html
  // 'abstract', 'animals', 'business', 'cats', 'city', 'food', 'nightlife', 'fashion', 'people', 'nature', 'sports', 'technics', 'transport'
  $imagenes = ["SofaNewKasoli.jpg","Iluminacion.jpg","objetos-disenio.jpg","blanqueria.jpg","ZE0FnIvCFsXsr0Df7Q05X4K7esttre9BgGJCDg6J.jpeg"];
  $categories = ["city","nightlife","nature","fashion","food"];
  $maxCategory = Category::max('id');
  $maxBrand = Brand::max('id');

  return [
    'productName' => $faker->sentence(3),
    'brand_id' => $faker->numberBetween(1, $maxBrand),
    'image' => $faker->image($path, 480, 600, $categories[$faker->numberBetween(1, $maxCategory)-1], false), //documentación de faker. El false es para que traiga el archivo sin  path
    // 'image' => $imagenes[$faker->numberBetween(1, $maxCategory)-1],
    'price' => $faker->randomFloat(2, 300, 4000),
    'description' => $faker->sentence(20),
    'stock' => $faker->numberBetween(0, 100),
    'category_id' => $faker->numberBetween(1, $maxCategory),
    'important' => $faker->boolean,
  ];
});
