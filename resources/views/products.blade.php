@extends('default');

@section('head')
  {{-- <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/faq.css"> --}}
@endsection

@section('contenidoBody')

  <h1>Lista de productos</h1>

  <section>
    @foreach ($productos as $producto)
      <article>
        <p>Nombre: {{$producto->nombre}}</p>
        <p>Precio: {{$producto->precio}}</p>
        <p>Descripcion: {{$producto->descripcion}}</p>
        <img src="/storage/product/{{$producto->foto}}" alt="">
        <p><a href="/product/{{$producto->id}}">Ver más</a></p>
        {{-- <p><a href="#">Comprar</a></p> --}}
      </article>
    @endforeach
  </section>

@endsection
