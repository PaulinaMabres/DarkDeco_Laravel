@extends('default');

@section('head')
  {{-- <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/faq.css"> --}}
  <script src="/js/product.js"> </script>
@endsection

@section('contenidoBody')
  <section style="">
    <div class="card mb-3" style="max-width: 1000px; margin: auto; margin-top: 20px;">
    {{-- <div class="card mb-3" style=""> --}}
      <div class="row no-gutters">
        <div class="col-md-4">
          <img src="/storage/product/{{$product->image}}" class="card-img" alt="...">
        </div>
        <div class="col-md-8">
          <div class="card-header">
            <h1>Detalle del producto</h1>
          </div>
          <div class="card-body">
            <h3 class="card-title">{{$product->productName}}</h3>
            <p class="card-text">{{$product->description}}</p>
            <p class="card-text">Marca: {{$brand->brandName}}</p>
            <p class="card-text">Categoría: {{$category->categoryName}}</p>
            <p class="card-text">Precio: $ {{$product->price}}</p>
          </div>
          <div class="card-footer">
            <h4><a href="#">Agregar al Carrito</a></h4>
            @if (Auth::user())
              {{-- <form class="" action="/addtocart" method="post">
                @csrf
                <input type="number" name="quantity" value="" placeholder="Cantidad">
                <input type="hidden" name="id" value="{{$product->id}}">
                <p></p>
                <button type="submit">Agregar al carrito</button>
              </form>
              <img src="/storage/product/{{$product->image}}" alt=""> --}}

              @if (Auth::user()->admin)
                <h4>
                  <a class="editProduct" href="/editProduct/{{$product->id}}">Editar producto</a>
                </h4>
                <h4>
                  {{-- <a class="deleteProduct" href="#">Borrar producto</a> --}}
                  <a class="deleteProduct" href="/deleteProduct/{{$product->id}}">Borrar producto</a>
                </h4>
                {{-- <form class="" action="/deleteProduct" method="post">
                  @csrf
                  <input type="hidden" name="id" value="{{$product->id}}">
                  <input type="submit" name="" value="Borrar Producto">
                </form> --}}
              @endif
            @endif
            <h4><a href="javascript:history.back(-1);">Volver</a></h4>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection
