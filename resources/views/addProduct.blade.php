@extends('default');

@section('head')
  <link rel="stylesheet" href="/css/products.css">
  <script src="/js/addEditProduct.js"> </script>

  {{-- Scripts para cargar la foto --}}
  {{-- https://bootsnipp.com/snippets/eNbOa --}}
  {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id ="bootstrap-css"> --}}
  {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}
  <!-- Include the above in your HEAD tag ---------->
@endsection

@section('contenidoBody')

  <section>

    <form class="addEditProduct" action="/addProduct" method ="post" enctype="multipart/form-data">
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
          $price_card = old("price");
          $description_card = old("description");
          $stock_card = old("stock");
        @endphp
      @else
        @php
          $productName_card = '';
          $brand_id_card = 0;
          $category_id_card = 0;
          $image_card = '';
          $price_card = 0;
          $description_card = '';
          $stock_card = 0;
        @endphp
      @endif

      @php
        $cardTitle = 'Agregar producto';
      @endphp

      @include('partials.productCard')

    </form>
  </section>

@endsection
