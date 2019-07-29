@extends('default');

@section('head')
  <link rel="stylesheet" href="/css/products.css">
  <script src="/js/addEditProduct.js"> </script>
@endsection

@section('contenidoBody')

  <section>

    <form class="addEditProduct" action="/editProduct/{{$product->id}}" method ="post" enctype="multipart/form-data">
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
          $productName_card = old("productName");
          $brand_id_card = old("brand_id");
          $category_id_card = old("category_id");
          $image_card = old("image");
          $priceo_card = old("price");
          $description_card = old("description");
          $stock_card = old("stock");
        @endphp
      @else
        @php
          $productName_card = $product->productName;
          $brand_id_card = $product->brand_id;
          $category_id_card = $product->category_id;
          $image_card = $product->image;
          $price_card = $product->price;
          $description_card = $product->description;
          $stock_card = $product->stock;
        @endphp
      @endif

      @php
        $cardTitle = 'Modificar producto';
      @endphp

      @include('partials.productCard')

    </form>

  </section>

@endsection
