@extends('default');

@section('head')
  <link rel="stylesheet" href="/css/cart.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection

<!-- Contenido de carrito -->
@section('contenidoBody')
  <section class="container">
    <article class="">

      <div class="row">
        <div class="col-md-6">
          <h1 class="text-success "><strong>Detalles del Carrito</strong></h1>
        </div>
        <div class="col-md-6 ">
          <a href="/history"class="btn btn-custom pull-right">Ver historial</a>
        </div>
      </div>

    </article>
    <article class="">

      @forelse ($carts as $item)
      <div class="row p-3 effects">
        <div class="col-md-3">
          <img src="/storage/product/{{$item->image}}" class="img-responsive">
        </div>
        <div class="col-md-3">
          <h4>{{$item->productName}}</h4>
          <h5>${{$item->price}}</h5>
          <h6>Cantidad : 0{{$item->quantity}}</h6>
          <h6>Subtotal: ${{$item->price * $item->quantity}}</h6>
        </div>
        <div class="col-md-5">
          <h3 class="text-primary">Descripción: <span class="text-secondary">{{$item->description}}</span></h3>
        </div>

        {{-- Borrar --}}
        <div class="col-md-1">
          <a href="/delete/{{$item->id}}"><i class="fa fa-trash-o"></i></a>
        </div>
      </div>
      @empty
        <p class="col-md-12"> Su carrito está vacío.</p>
      @endforelse
        {{-- @forelse ($carts as $item)
          <li>Nombre: {{$item->name}} | Cantidad: {{$item->quantity}} | Precio: {{$item->price}} | sub-total: {{$item->price * $item->quantity}} <a href="/delete/{{$item->id}}">Eliminar</a></li>
        @empty
          <p>Su carrito está vacío.</p>
        @endforelse --}}
    </article>
    <hr>
    <article class="">

      <h4 class="col-md-12">Total:{{$total}}</h4>

    @if ($total != 0)
      <form class="" action="/cartClose" method="post">
        @csrf
        <button type="submit" class="btn btn-warning"><h4>Concretar compra</h4></button>
      </form>
    @endif

    </article>
  </section>
@endsection
