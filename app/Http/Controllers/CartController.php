<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Vemos que el usuario este logueado
        $carts = Cart::where('status',0)
        ->where('user_id', Auth::user()->id)
        ->get(); //y traemos todo su carrito

        $carts = Cart::all()->where('status', 0)
        ->where('user_id', Auth::user()->id);

        // IDEA: Sacando el total de cada carrito
        $total = 0;
        foreach ($carts as $item) {
          $total = $total +($item->quantity * $item->price);
          }
        return view('cart', compact('carts', 'total'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validamos que el numero ingresado sea >0
        $rule = [
          'quantity' =>"integer|min:1"
        ];
        $message = [
          'min' =>'La cantidad debe ser mayor a :min.',
          'integer' => 'El valor debe ser numérico.'
        ];
        $this->validate($request, $rule, $message);

        $product = Product::find($request->id);

        //Hasta acá el producto ya está cargado en el chart y hay que ver si realmente está
        $exist = Cart::where('product_id', $request->id)->where('user_id')->where('status', 0)->first();
        if ($exist){
          $exist->quantity += $request->quantity;
          $exist->save();
          return redirect('/products');
        }
        //entonces; cada "$cart" o Cart es un item/articulo del carrito:
        $cart = new Cart;
        $cart->product_id = $product->id;
        $cart->productName = $product->productName;
        $cart->price = $product->price;
        $cart->quantity = $request->quantity;
        $cart->user_id = Auth::user()->id;
        $cart->date = date("Y-m-d");
        $cart->status = 0;
        $cart->image = $product ->image;
        $cart->description = $product->description;

        $cart->save();

        return redirect('/products');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) // TODO: ca me tienen que dar el ID del item del carrito a eliminar
    {
        $item = Cart::where('id',$id)
        ->where('user_id', Auth::user()->id)
        ->where('status',0)->get();

        $item[0]->delete();

        return redirect('/myCart');
    }

    public function cartClose()
    {
      $items = Cart::where('user_id', Auth::user()->id)
      ->where('status', 0)->get();

      $lastCart = Cart::max('cart_num'); //trae el ultimo cerrado

      foreach ($items as $item) {
        $item->cart_num = $lastCart+1;
        $item->status = 1;
        $item->save();
      }
      return redirect ('/products');
    }

    public function history()
    {
      $carts = Cart::where('user_id', Auth::user()->id)
      ->where('status', 1)->get()->groupBy('cart_num');

      return view('history', compact('carts'));
    }

}
