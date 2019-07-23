@extends('default');

@section('head')
  {{-- <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/faq.css"> --}}
@endsection

@section('contenidoBody')

  <h1>Lista de productos</h1>
  @if ($category)
    <h2>{{$category}}</h2>
  @endif

  <h3>
    <a href="/products">Todos</a> -
    <a href="/products/1">Habitación</a> -
    <a href="/products/2">Cocina</a> -
    <a href="/products/3">Lavabo</a> -
    <a href="/products/4">Outdoor</a> -
    <a href="/products/5">Navidad </a>
  </h3>

  {{-- Buscador --}}
  <form class="buscador" action="/searchProducts" method="get">
    <div class="filtro">
      <input type="text" name="filtro" value="" placeholder="Buscar productos">
      <button type="submit" class="btn btn-dark borde text-uppercase"> <span class="h6">Buscar</span></button>
    </div>
  </form>

  @if (Auth::user() && Auth::user()->admin)
    <h3>
      <a href="/addProduct">Agregar producto</a>
    </h3>
  @endif

  <section>
    <div class="card-columns">
    @foreach ($products as $product)
      <div class="card">
        <img src="/storage/product/{{$product->image}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h3 class="card-title">{{$product->productName}}</h3>
          <p class="card-text">{{$product->description}}</p>
          <p class="card-price">{{$product->price}}</p>
        </div>
        <div class="card-footer">
          <h3><a href="/product/{{$product->id}}">Ver más</a></h3>
          <h3><a href="#">Agregar al Carrito</a></h3>
        </div>
      </div>
    @endforeach
    </div>

    {{$products->links()}}
  </section>

@endsection
