@extends('default');

@section('head')
  {{-- <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/faq.css"> --}}
@endsection

@section('contenidoBody')

  <h1>Lista de productos</h1>
  @if ($categoria)
    <h2>{{$categoria}}</h2>
  @endif
  <h3>
    <a href="/products">Todos</a> -
    <a href="/products/1">Habitación</a> -
    <a href="/products/2">Cocina</a> -
    <a href="/products/3">Lavabo</a> -
    <a href="/products/4">Outdoor </a>
  </h3>
  @if (Auth::user())
    @if (Auth::user()->admin)
      <h3>
        <a href="/addProduct">Agregar producto</a>
      </h3>
    @endif
  @endif

  <section>
    @foreach ($products as $product)
      <article>
        <h4>
          <p>Nombre: {{$product->nombre}}</p>
        </h4>
        <p>Precio: {{$product->precio}}</p>
        <p>Descripcion: {{$product->descripcion}}</p>
        <img width="150px" src="/storage/product/{{$product->foto}}" alt="">
        <p><a href="/product/{{$product->id}}">Ver más</a></p>
        {{-- <p><a href="#">Comprar</a></p> --}}
      </article>
    @endforeach
    {{$products->links()}}
  </section>

@endsection
