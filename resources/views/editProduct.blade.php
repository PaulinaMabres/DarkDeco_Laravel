@extends('default');

@section('head')
  <link rel="stylesheet" href="/css/products.css">
  <script src="/js/addEditProduct.js"> </script>
@endsection

@section('contenidoBody')

  <section>

    <form class="" action="/editProduct/{{$product->id}}" method="post" enctype="multipart/form-data">
      @csrf {{-- ES OBLIGATORIO PARA FORMS METHOD POST --}}
      {{-- {{csrf_field()}} --}}

      <ul>
        @foreach ($errors->all() as $error)
          <li>
            {{$error}}
          </li>
        @endforeach
      </ul>

      {{-- Traigo los valores para los inputs --}}
      @if (old("productName"))
        @php
          $productNameAux = old("productName");
          $brand_idAux = old("brand_id");
          $category_idAux = old("category_id");
          $imageAux = old("image");
          $priceoAux = old("price");
          $descriptionAux = old("description");
          $stockAux = old("stock");
        @endphp
      @else
        @php
          $productNameAux = $product->productName;
          $brand_idAux = $product->brand_id;
          $category_idAux = $product->category_id;
          $imageAux = $product->image;
          $priceAux = $product->price;
          $descriptionAux = $product->description;
          $stockAux = $product->stock;
        @endphp
      @endif

      @include('partials.productCard')

    </form>

  </section>

@endsection
