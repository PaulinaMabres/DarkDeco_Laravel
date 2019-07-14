<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use App\Category;
use App\Color;

class ProductController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index($category_id = null)
  {
    if($category_id){
      $products = Product::where('categoria_id', $category_id)->paginate(4);
      $categoria = Category::find($category_id)->categoria;
      // dd($categoria);
    } else {
      $products = Product::paginate(4); //Traemos todos los productos.
      $categoria = '';
    }
    return view('products', compact('products', 'categoria'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $colors = Color::all();
    $categories = Category::all();
    return view('addProduct', compact('colors', 'categories'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    // //Primero valido los datos. //
    $reglas = [
      "name" => "required|string|min:2",
      "precio" => "required|numeric|gte:0",
      "stock" => "required|integer|gte:0",
      "foto" => "image"
    ];

    $mensajes = [
      "string" => "El campo :attribute  debe ser de texto.",
      // "name.string" => "El campo Nombre debe ser de texto.",
      "required" => "El campo :attribute debe completarse",
      "gte" => "El campo :attribute debe ser un número positivo",
      "integer" => "El campo :attribute debe ser un numero entero.",
    ];

    $this->validate($request, $reglas, $mensajes);

    //Crear un nuevo objeto producto.
    $newProduct = new Product();

    $file = '';
    if ($request->foto) {
      $path = $request->file('foto')->store('/product');
      $file = basename($path);
      //dd($path, $file);
    }

    //  Le voy a cargar los datos que vienen por post (request)
    $newProduct->nombre = $request["name"];
    $newProduct->color_id = $request["color_id"];
    $newProduct->foto = $file;
    $newProduct->precio = $request["precio"];
    $newProduct->descripcion = $request["descripcion"];
    $newProduct->stock = $request["stock"];
    $newProduct->categoria_id = $request["categoria_id"];
    // dd($request, $newProduct);

    //  Guardo el objeto en la base de datos.
    $newProduct->save();

    return redirect('products');
  }

  /**
  * Display the specified resource.
  *
  * @param  \App\product  $product
  * @return \Illuminate\Http\Response
  */
  public function show($id)
  {
    $product = Product::find($id);
    return view('product', compact('product')); //Pasamos el dato a la vista.
  }

  /**
  * Show the form for editing the specified resource.
  *
  * @param  \App\product  $product
  * @return \Illuminate\Http\Response
  */
  public function edit($id)
  {
    $colors = Color::all();
    $categories = Category::all();
    $product = Product::find($id);
    // dd($product);
    return view('editProduct', compact('colors', 'categories', 'product'));
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  \App\product  $product
  * @return \Illuminate\Http\Response
  */
  public function update(Request $request, $id)
  {
    // //Primero valido los datos. //
    $reglas = [
      "name" => "required|string|min:2",
      "precio" => "required|numeric|gte:0",
      "stock" => "required|integer|gte:0",
      "foto" => "image"
    ];

    $mensajes = [
      "string" => "El campo :attribute  debe ser de texto.",
      // "name.string" => "El campo Nombre debe ser de texto.",
      "required" => "El campo :attribute debe completarse",
      "gte" => "El campo :attribute debe ser un número positivo",
      "integer" => "El campo :attribute debe ser un numero entero.",
    ];

    $this->validate($request, $reglas, $mensajes);

    // Busco el producto para actualizar.
    $product = Product::find($id);

    $file = '';
    if ($request->foto) {
      $path = $request->file('foto')->store('/product');
      $file = basename($path);
      //dd($path, $file);
    }

    //  Le voy a cargar los datos que vienen por post (request)
    $product->nombre = $request["name"];
    $product->color_id = $request["color_id"];
    $product->foto = $file;
    $product->precio = $request["precio"];
    $product->descripcion = $request["descripcion"];
    $product->stock = $request["stock"];
    $product->categoria_id = $request["categoria_id"];
    // dd($request, $product);

    //  Guardo el objeto en la base de datos.
    $product->update();

    return redirect('products');
  }

  /**
  * Remove the specified resource from storage.
  *
  * @param  \App\product  $product
  * @return \Illuminate\Http\Response
  */
  public function destroy(product $product)
  {
    //
  }
}
