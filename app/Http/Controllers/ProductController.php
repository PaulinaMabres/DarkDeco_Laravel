<?php

namespace App\Http\Controllers;

use App\product;
use Illuminate\Http\Request;
use App\Category;
use App\Brand;

class ProductController extends Controller
{
  // Reglas y mensajes para la validación para alta y modificación de productos
  protected $reglas = [
    "productName" => "required|string|min:2",
    "price" => "required|numeric|gte:0",
    "stock" => "required|integer|gte:0",
    "image" => "image"
  ];
  protected $mensajes = [
    "string" => "El campo :attribute  debe ser de texto.",
    // "productName.string" => "El campo Nombre debe ser de texto.",
    "required" => "El campo :attribute debe completarse",
    "gte" => "El campo :attribute debe ser un número positivo",
    "integer" => "El campo :attribute debe ser un numero entero.",
    "image" => "Error al cargar la foto"
  ];
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index($category_id = null)
  {
    if($category_id){
      $products = Product::where('category_id', $category_id)->paginate(4);
      $category = Category::find($category_id)->category;
      // dd($category);
    } else {
      $products = Product::paginate(4); //Traemos todos los productos.
      $category = '';
    }
    return view('products', compact('products', 'category'));
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    $brands = Brand::all();
    $categories = Category::all();
    // dd($brands, $categories);
    return view('addProduct', compact('brands', 'categories'));
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(Request $request)
  {
    // dd($request);
    // //Primero valido los datos. //
    $this->validate($request, $this->reglas, $this->mensajes);

    //Crear un nuevo objeto producto.
    $newProduct = new Product();

    $file = '';
    if ($request->file('image')) {
      $path = $request->file('image')->store('/product');
      $file = basename($path);
      // dd($path, $file);
    }

    //  Le voy a cargar los datos que vienen por post (request)
    $newProduct->productName = $request["productName"];
    $newProduct->brand_id = $request["brand_id"];
    $newProduct->image = $file;
    $newProduct->price = $request["price"];
    $newProduct->description = $request["description"];
    $newProduct->stock = $request["stock"];
    $newProduct->category_id = $request["category_id"];
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
    $brands = Brand::all();
    $categories = Category::all();
    $product = Product::find($id);
    // dd($product);
    return view('editProduct', compact('brands', 'categories', 'product'));
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
    $this->validate($request, $this->reglas, $this->mensajes);

    // Busco el producto para actualizar.
    $product = Product::find($id);

    $file = '';
    if ($request->file('image')) {
      $path = $request->file('image')->store('/product');
      $file = basename($path);
      //dd($path, $file);
    } else {
      $file = $product->image;
    }

    //  Le voy a cargar los datos que vienen por post (request)
    $product->productName = $request["productName"];
    $product->brand_id = $request["brand_id"];
    $product->image = $file;
    $product->price = $request["price"];
    $product->description = $request["description"];
    $product->stock = $request["stock"];
    $product->category_id = $request["category_id"];
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
  public function destroy($id)
  {
    $product = Product::find($id);
    $product->delete();

    return redirect('products');
  }
}
