@extends('default');

@section('head')
  <link rel="stylesheet" href="/css/products.css">
  <script src="/js/deleteProduct.js"> </script>
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
            <form>
              @if (Auth::user())
                {{-- <a href="#">Agregar al Carrito</a> - --}}
                <input class="btn btn-secondary" onclick="window.location.href='#'" type="" name="" value="Agregar al Carrito">
                @if (Auth::user()->admin)
                  {{-- Editar Producto --}}
                  <input id="#editProduct" class="btn btn-secondary" onclick="window.location.href='/editProduct/{{$product->id}}'" type="" name="" value="Editar producto">
                  {{-- Borrar Producto --}}
                  <input id="#deleteProduct" class="btn btn-secondary"
                  onclick="if (window.confirm('Está seguro de borrar el producto?')) {window.location.href='/deleteProduct/{{$product->id}}'}"
                  type="" name="deleteProduct" value="Borrar producto">
                   {{-- <a class="deleteProduct" href="/deleteProduct/{{$product->id}}">Borrar producto</a> - --}}
                @endif
              @endif
              <input class="btn btn-secondary" onclick="window.location.href='javascript:history.back(-1);'" type="" name="volver" value="Volver">
              {{-- <a href="javascript:history.back(-1);">Volver</a> --}}
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
