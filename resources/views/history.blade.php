@extends('default');

@section('head')
  <link rel="stylesheet" href="/css/history.css">
@endsection

<!-- Contenido de carrito -->
@section('contenidoBody')

  <section class="container">
    <h1 class=" btn-primary btn-lg btn-block text-left">Mis compras </h1>
    <section class="partido">


      @forelse ($carts as $cart)

        <article class="col-md-6 cuadro">
          <div class="titulo col-md-12">
            <h3>Compra realizada el: {{$cart[0]->date}}</h3>
          </div>
          <div class="titulo col-md-12 text-muted">
            Compra numero: {{$cart[0]->cart_num}}
          </div>
          @foreach ($cart as $item)
            <div class="col-md-12 ">
              <p class="text-info">Nombre: {{$item->productName}}</p>
              <p class="text-info">Precio: {{$item->price}}</p>
            </div>
          @endforeach

        </article>
      @empty
        <p>No tiene historial de carritos</p>
      @endforelse
    </section>

  </section>
@endsection
