@extends('default');

@section('head')
  <link rel="stylesheet" href="/css/products.css">
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
  <script type="text/javascript" src="js/minCart.js"></script>
@endsection

@section('contenidoBody')

  <section class="body-container">

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
              <img src="/storage/product/{{$product->image}}" class="card-img-top" alt="Foto del producto">
              <div class="card-body">
                <h3 class="card-title">{{$product->productName}}</h3>
                {{-- <p class="card-text">{{$product->description}}</p> --}}
                <p class="card-price">{{'$ '.$product->price}}</p>
              </div>
              <div class="card-footer product-card-footer">
                <div class="">
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
                  @endif

                  {{-- Ver detalle --}}
                  <button type="button" name="show-product" class="btn btn-secondary" onclick="window.location.href='/product/{{$product->id}}'">Ver detalle</button>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>

      <div class="products-footer card-footer row">
        <div class="products-links">
          {{$products->links()}}
          {{-- {{$products->links("pagination::bootstrap-4")}} --}}
        </div>
        @if (Auth::user() && Auth::user()->admin)
          <div class="products-btn btn-secondary">
            <button type="button" name="edit-product" id="#editProduct" class="btn-agregar-producto btn btn-secondary" onclick="window.location.href='/addProduct'">Agregar producto</button>
          </div>
        @endif
      </div>
    </div>


  </section>

@endsection
