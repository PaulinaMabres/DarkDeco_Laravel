@extends('default');

@section('head')
  {{-- <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/faq.css"> --}}
@endsection

@section('contenidoBody')

  <h1>Lista de productos</h1>

  <section>
    <article>
      <p>Nombre: {{$producto->nombre}}</p>
      <p>Precio: {{$producto->precio}}</p>
      <p>Descripcion: {{$producto->descripcion}}</p>
      <img src="/storage/product/{{$producto->foto}}" alt="">

      {{-- <form class="" action="/addtocart" method="post">
        @csrf
        <input type="number" name="quantity" value="" placeholder="Cantidad">
        <input type="hidden" name="id" value="{{$product->id}}">
        <p></p>
        <button type="submit">Agregar al carrito</button>
      </form>
      <img src="/storage/product/{{$product->image}}" alt=""> --}}

    </article>
  </section>

@endsection
