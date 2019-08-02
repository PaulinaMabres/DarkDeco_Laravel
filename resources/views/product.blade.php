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
            <p class="card-text">Stock: {{$product->stock}}</p>
          </div>


          <div class="product-card-footer card-footer">
            <div class="formProduct">
              @if (Auth::user())

                {{-- Agregar al carrito --}}
                <button type="button" name="add-to-cart" class="btn btn-secondary" onclick="window.location.href='#'">Agregar al Carrito</button>

                @if (Auth::user()->admin)

                  {{-- Editar Producto --}}
                  <button type="button" name="edit-product" id="#editProduct" class="btn btn-secondary" onclick="window.location.href='/editProduct/{{$product->id}}'">Modificar producto</button>

                  {{-- Borrar Producto --}}
                  <button type="button" name="delete-product" id="#deleteProduct" class="btn btn-secondary"
                  onclick="if (window.confirm('Está seguro de borrar el producto?')) {window.location.href='/deleteProduct/{{$product->id}}'}">Borrar producto</button>
                   {{-- <a class="deleteProduct" href="/deleteProduct/{{$product->id}}">Borrar producto</a> - --}}
                @endif
              @endif

              <button type="button" name="back" class="btn btn-secondary" onclick="window.location.href='javascript:history.back(-1);'">Volver</button>
              {{-- <a href="javascript:history.back(-1);">Volver</a> --}}
            </div>

          </div>
        </div>
      </div>
    </div>

  </section>
@endsection
