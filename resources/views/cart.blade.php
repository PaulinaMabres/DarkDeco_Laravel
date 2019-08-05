@extends('default');

@section('head')
  <link rel="stylesheet" href="/css/faq.css">
@endsection

<!-- Contenido de carrito -->
@section('contenidoBody')
  <h1>Carrito</h1>
  <section>
    <article class="">
      <ul>
        @forelse ($carts as $item)
          <li>Nombre: {{$item->name}} | Cantidad: {{$item->quantity}} | Precio: {{$item->price}} | sub-total: {{$item->price * $item->quantity}} <a href="/delete/{{$item->id}}">Eliminar</a></li>
             @empty
               <p>Su carrito está vacío.</p>
             @endforelse
      </ul>
    </article>
      <p>Total:{{$total}}</p>
  </section>
    <form class="" action="/cartClose" method="post">
      @csrf
      <button type="submit" readonly="readonly" name="button">Concretar compra</button>
    </form>
@endsection
