
{{-- Alta y modificación de productos --}}

@extends('default');

@section('head')
  <link rel="stylesheet" href="/css/products.css">
  <script src="/js/addEditProduct.js"> </script>
  <script src="/js/imgPreview.js"> </script>
  <script src="/js/modal.js"> </script>
@endsection

@section('contenidoBody')

  <section class='body-container container-fluid'>

    @include('partials.modal')

    @php
    if ($action == 'create') {
      $route = "/addProduct";
      $cardTitle = 'Agregar producto';
    }else {
      $route = '/editProduct/'.$product->id;
      $cardTitle = 'Modificar producto';
    }
    @endphp

    <form class="addEditProduct" action="{{$route}}" method ="post" enctype="multipart/form-data">
      @csrf {{-- ES OBLIGATORIO PARA FORMS METHOD POST --}}
      {{-- {{csrf_field()}} --}}

      {{-- Si hay errores que vienen del controlador en addEditProduct.js muestra mensaje --}}
      <ul>
        @foreach ($errors->all() as $error)
          <li class="error">
            {{$error}}
          </li>
        @endforeach
      </ul>

      @php
        if (old("productName")) {
          $productName_card = old("productName");
          $brand_id_card = old("brand_id");
          $category_id_card = old("category_id");
          $image_card = old("image");
          $price_card = old("price");
          $description_card = old("description");
          $stock_card = old("stock");
        } elseif ($action == 'create') {
          $productName_card = '';
          $brand_id_card = 0;
          $category_id_card = 0;
          $image_card = '';
          $price_card = 0;
          $description_card = '';
          $stock_card = 0;
        } else {
          $productName_card = $product->productName;
          $brand_id_card = $product->brand_id;
          $category_id_card = $product->category_id;
          $image_card = $product->image;
          $price_card = $product->price;
          $description_card = $product->description;
          $stock_card = $product->stock;
        }
      @endphp

      <div class="product-card card mb-3" style="max-width: 1000px; margin: auto; margin-top: 20px;">
        <div class="row no-gutters">

          {{-- FOTO --}}
          <div class="product-card-img col-md-4 col-sm-12 card-img">
            {{-- <label>Foto</label> --}}
            <div class="product-foto">
              @if ($image_card == '')
                <img width="150px" id='img-upload' src="" value="">
              @else
                <img width="150px" id='img-upload' src="/storage/product/{{$image_card}}" value="">
              @endif
            </div>
            <div class="input-foto input-group mb-3">
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="inputGroupFileAddon01">Imagen</span>
                </div>
                <div class="custom-file">
                  <input type="file" class="custom-file-input" id="imgInp" aria-describedby="inputGroupFileAddon01" name="image" value="{{$image_card}}">
                  <label class="custom-file-label" for="inputGroupFile01" id="imglabel">Seleccionar</label>
                </div>
              </div>
            </div>
          </div>

          {{-- INFO DEL PRODUCTO --}}
          <div class="product-card-info col-md-8 col-sm-12">
            <div class="product-card-header card-header">
              <h1>{{$cardTitle}}</h1>
            </div>
            <div class="product-card-body card-body">

              {{-- Nombre --}}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Nombre</span>
                </div>
                <input id="productName" type="text" class="form-control" name="productName" placeholder="" aria-label="Nombre" aria-describedby="basic-addon1" value="{{$productName_card}}" required>
                {{-- <small>{{$errors->first('productName')}}</small> --}}
              </div>

              {{-- Descripción --}}
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-label-descripcion input-group-text">Descripción</span>
                </div>
                <textarea id="description" class="input-text-descripcion form-control" aria-label="With textarea" name="description" value="" required>{{$description_card}}</textarea>
              </div>

              <div class="input-group mb-3" style="margin-top: 10px;">
                {{-- Marca --}}
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelectBrand">Marca</label>
                </div>
                <select name="brand_id" class="custom-select" id="inputGroupSelectBrand">
                  @foreach ($brands as $brand)
                    <option
                    @if($brand->id==$brand_id_card)
                      {{'selected = \"selected\"'}}
                    @endif
                    value=" {{$brand->id}}">
                    {{$brand->brandName}}</option>
                  @endforeach
                </select>

                {{-- Categoría --}}
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelectCategory">Categoría</label>
                </div>
                <select name="category_id" class="custom-select" id="inputGroupSelectCategory">
                  @foreach ($categories as $category)
                    <option
                    @if($category->id==$category_id_card)
                      {{'selected = \"selected\"'}}
                    @endif
                    value=" {{$category->id}}">
                    {{$category->categoryName}}</option>
                  @endforeach
                </select>
              </div>

              <div class="input-group row-mb-3">
                {{-- Precio --}}
                <div class="input-precio input-group-prepend">
                  <span class="input-group-text">Precio $</span>
                </div>
                <input id="price" type="text"  min="1" max="5" class="form-control" aria-label="Amount (to the nearest dollar)" name="price" value="{{$price_card}}" required>

                {{-- Stock --}}
                <div class="input-stock input-group-prepend">
                  <span class="input-group-text">Stock</span>
                </div>
                <input id="stock" type="number"  min="0" class="form-control" aria-label="Amount (to the nearest dollar)" name="stock" value="{{$stock_card}}">
              </div>

            </div>

            <div class="product-card-footer card-footer">
              <div class="">
                {{-- Cancelar - Vuelve a la página anterior --}}
                <button type="button" name="button" class="btn btn-secondary" onclick="window.location.href='javascript:history.back(-1);'">Cancelar</button>
                <button type="submit" name="button" class="btn btn-secondary">Guardar</button>
              </div>
            </div>
          </div>
        </div>
      </div>

    </form>

  </section>

@endsection
