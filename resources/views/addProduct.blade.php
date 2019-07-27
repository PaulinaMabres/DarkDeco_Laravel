@extends('default');

@section('head')
  <link rel="stylesheet" href="/css/products.css">
  <script src="/js/addEditProduct.js"> </script>

  {{-- Scripts para cargar la foto --}}
  {{-- https://bootsnipp.com/snippets/eNbOa --}}
  {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
  {{-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> --}}
  <!-- Include the above in your HEAD tag ---------->
@endsection

@section('contenidoBody')

  <section>

    <form class="addEditProduct" action="/addProduct" method="post" enctype="multipart/form-data">
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
          $productNameAux = '';
          $brand_idAux = 0;
          $category_idAux = 0;
          $imageAux = '';
          $priceAux = 0;
          $descriptionAux = '';
          $stockAux = 0;
        @endphp
      @endif

      @include('partials.productCard')

    </form>
  </section>

@endsection
