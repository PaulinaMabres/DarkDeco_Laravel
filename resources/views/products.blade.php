@extends('default');

@section('head')
  <link rel="stylesheet" href="/css/products.css">
@endsection

@section('contenidoBody')

  <div class="card">
    <div class="products-header">
      <ol class="products-title breadcrumb">
        <h1>Lista de productos
          @if ($categoryName)
            {{' / '.$categoryName}}
          @endif
        </h1>
      </ol>

      <ol class="products-filter breadcrumb">
        <h3>
          Categorías:
          @if ($categoryName != '')
             - <a href="/products">Todos</a>
          @endif

          @foreach ($categories as $category)
            @if ($category['categoryName'] != $categoryName)
              - <a href="/products/{{$category['id']}}">{{$category['categoryName']}}</a>
            @endif
          @endforeach
        </h3>
      </ol>
    </div>

    <div class="products-body">
      <div class="card-columns">
      @foreach ($products as $product)
        <div class="card">
          <img src="/storage/product/{{$product->image}}" class="card-img-top" alt="...">
          <div class="card-body">
            <h3 class="card-title">{{$product->productName}}</h3>
            {{-- <p class="card-text">{{$product->description}}</p> --}}
            <p class="card-price">{{'$ '.$product->price}}</p>
          </div>
          <div class="card-footer product-card-footer">
            <div class="">
              {{-- Agregar al carrito --}}
              <button type="button" name="add-to-cart" class="btn btn-secondary" onclick="window.location.href='/product/{{$product->id}}'">Ver más</button>

              {{-- <h3><a href="/product/{{$product->id}}">Ver más</a></h3> --}}
              @if (Auth::user())
                {{-- Agregar al carrito --}}
                <button type="button" name="add-to-cart" class="btn btn-secondary" onclick="window.location.href='#'">Agregar al Carrito</button>
                {{-- <h3><a href="#">Agregar al Carrito</a></h3> --}}
              @endif
            </div>
          </div>
        </div>
      @endforeach
      </div>
    </div>

    <div class="products-footer card-footer row">
      <div class="products-links col-7">
        {{$products->links()}}
      </div>
      <div class="products-btn col-4">
        @if (Auth::user() && Auth::user()->admin)
          <input class="btn-agregar-producto btn btn-secondary" onclick="window.location.href='/addProduct'" type="" name="" value="Agregar producto">
        @endif
      </div>
    </div>
  </div>

@endsection
