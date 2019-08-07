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

  // Buscador
  public function search(request $request){
    $products = Product::where('productName', 'LIKE', '%'.$request["filtro"].'%')->paginate(6);
    $categoryName = 'Resultado de la búsqueda';
    $categories = Category::all();
    return view('products', compact('products', 'categoryName', 'categories'));
  }

  // Destacados
  // public function featured(){
  //   $featured = Product::where('important', '=', '1')->paginate(6);
  //   // dd($featured);
  //
  //   $json = array();
  //   $total_records = mysql_num_rows($featured);
  //
  //   if($total_records > 0){
  //     while ($row = mysql_fetch_array($featured, MYSQL_ASSOC)){
  //       $json[] = $row;
  //     }
  //   }
  //
  //   // echo json_encode($json);
  //
  //   return response()->json($json);
  // }

  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index($category_id = null)
  {
    if($category_id){
      // Productos filtrados por categoría, paginados.
      $products = Product::where('category_id', $category_id)->paginate(6);
      $categoryName = Category::find($category_id)->categoryName;
    } else {
      //Todos los productos paginados.
      $products = Product::paginate(6);
      $categoryName = '';
    }
    $categories = Category::all();
    return view('products', compact('products', 'categoryName', 'categories'));
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
    $action = 'create'; // Para decirle a la vista que es alta
    // dd($brands, $categories);
    return view('addEditProduct', compact('brands', 'categories', 'action'));
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
    $brand = Brand::find($product->brand_id);
    $category = Category::find($product->category_id);
    $error = 'OK';
    return view('product', compact('product', 'brand', 'category', 'error')); //Pasamos el dato a la vista.
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
    $action = 'edit';
    // dd($product);
    return view('addEditProduct', compact('brands', 'categories', 'product', 'action'));
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

    try{
      $product->delete();
    } catch (\Exception $e) {
      $product = Product::find($id);
      $brand = Brand::find($product->brand_id);
      $category = Category::find($product->category_id);
      $error = 'No se puede borrar el producto';
      return view('product', compact('product', 'brand', 'category', 'error')); //Pasamos el dato a la vista.
      // dd($product);
    }

    return redirect('products');
  }
}
