@extends('default');

@section('head')
  <link rel="stylesheet" href="/css/faq.css">
@endsection

<!-- Contenido de carrito -->
@section('contenidoBody')
  <h1>Mis carritos</h1>
   <section>

       <ul>
         @forelse ($carts as $cart)
           Numero de carrito: {{$cart[0]->cart_num}}
           @foreach ($cart as $item)
             <li>{{$item->productName}}, {{$item->price}}</li>
           @endforeach
         @empty
           <p>No tiene historial de carritos</p>
         @endforelse
       </ul>

   </section>
@endsection
