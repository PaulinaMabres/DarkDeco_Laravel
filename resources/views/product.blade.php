@extends('default');

@section('head')
  <link rel="stylesheet" href="/css/products.css">
  <script src="/js/deleteProduct.js"> </script>
  <script src="/js/modal.js"> </script>
@endsection

@section('contenidoBody')
  <section class='body-container container-fluid'>

    @include('partials.modal')

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
                <div class="" style="display:inline-block; height:30px">
                  <form class="" action="/addToCart" method="get">
                    @csrf
                    <input type="number" min="1" max="5" name="quantity" value="1">{{$errors->first('quantity') }}
                    <input type="hidden" name="id" value="{{$product->id}}">
                    <button type="submit" name="add-to-cart" class="btn btn-secondary" onclick="window.location.href='#'"
                    >Agregar al Carrito</button>
                  </form>
                </div>

                @if (Auth::user()->admin)

                  {{-- Editar Producto --}}
                  <button type="button" name="edit-product" id="editProduct" class="btn btn-secondary" onclick="window.location.href='/editProduct/{{$product->id}}'">Modificar producto</button>

                  {{-- Borrar Producto --}}
                  <button type="button" name="delete-product" id="deleteProduct" class="btn btn-secondary" value="{{$product->id}}">Borrar producto</button>

                  {{-- <button type="button" name="delete-product" id="deleteProduct" class="btn btn-secondary" value="{{$product->id}}"
                  onclick="$('.message-card').show();$('.message-card-container').show();">Borrar producto</button> --}}
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
