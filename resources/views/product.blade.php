@extends('default');

@section('head')
  {{-- <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/faq.css"> --}}
@endsection

@section('contenidoBody')

  <h1>Detalle del producto</h1>

  <section>
    <article>
      <h4>
        <p>Nombre: {{$product->nombre}}</p>
      </h4>
      <p>Precio: {{$product->precio}}</p>
      <p>Descripcion: {{$product->descripcion}}</p>
      <img width="150px" src="/storage/product/{{$product->foto}}" alt="">

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
