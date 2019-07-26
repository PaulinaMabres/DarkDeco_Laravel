@extends('default');

@section('head')
  <link rel="stylesheet" href="/css/products.css">
@endsection

@section('contenidoBody')
  <section>
    <div class="product-card card mb-3" style="max-width: 1000px; margin: auto; margin-top: 20px;">
    {{-- <div class="card mb-3" style=""> --}}
      <div class="row no-gutters">
        <div class="product-card-img col-md-4 card-img">
          <img src="/storage/product/{{$product->image}}" class="card-img" alt="...">
        </div>
        <div class="product-card-info col-md-8">
          <div class="product-card-header card-header">
            <h1>Detalle del producto</h1>
          </div>
          <div class="product-card-body card-body">
            <h3 class="product-card-title card-title">{{$product->productName}}</h3>
            <p class="card-text">{{$product->description}}</p>
            <p class="card-text">Marca: {{$brand->brandName}}</p>
            <p class="card-text">Categoría: {{$category->categoryName}}</p>
            <p class="card-text">Precio: $ {{$product->price}}</p>
          </div>
          <div class="product-card-footer card-footer">
            <h4>
              @if (Auth::user())
                <a href="#">Agregar al Carrito</a> -
                @if (Auth::user()->admin)
                   <a class="editProduct" href="/editProduct/{{$product->id}}">Editar producto</a> -
                   <a class="deleteProduct" href="/deleteProduct/{{$product->id}}">Borrar producto</a> - 
                @endif
              @endif
              <a href="javascript:history.back(-1);">Volver</a>
            </h4>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
