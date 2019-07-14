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
    </article>
  </section>

  @if (Auth::user())
    {{-- <form class="" action="/addtocart" method="post">
      @csrf
      <input type="number" name="quantity" value="" placeholder="Cantidad">
      <input type="hidden" name="id" value="{{$product->id}}">
      <p></p>
      <button type="submit">Agregar al carrito</button>
    </form>
    <img src="/storage/product/{{$product->image}}" alt=""> --}}

    @if (Auth::user()->admin)
      <h3>
        <a href="/editProduct/{{$product->id}}">Editar producto</a>
      </h3>
      <h3>
        <a href="/deleteProduct/{{$product->id}}">Borrar producto</a>
      </h3>
      {{-- <form class="" action="/deleteProduct" method="post">
        @csrf
        <input type="hidden" name="id" value="{{$product->id}}">
        <input type="submit" name="" value="Borrar Producto">
      </form> --}}

    @endif
  @endif

@endsection
