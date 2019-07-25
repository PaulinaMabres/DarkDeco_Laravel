@extends('default');

@section('head')
  <link rel="stylesheet" href="/css/products.css">
  <script src="/js/abmProduct.js"> </script>
@endsection

@section('contenidoBody')

  <h1>Editar producto</h1>

  <section>

    <ul>
      @foreach ($errors->all() as $error)
        <li>
          {{$error}}
        </li>
      @endforeach
    </ul>

    <form class="" action="/editProduct/{{$product->id}}" method="post" enctype="multipart/form-data">
      @csrf {{-- ES OBLIGATORIO PARA FORMS METHOD POST --}}
      {{-- {{csrf_field()}} --}}

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

      <div class="">
        <label for="productName">Nombre:</label>
        <input id="productName" type="text" name="productName" value="{{$productNameAux}}">
        <small>{{$errors->first('productName')}}</small>
      </div>

      <div class="brand">
        <label for="brand">Marca:</label>
        <select name="brand_id">
          @foreach ($brands as $brand)
            <option
            @if($brand->id==$brand_idAux)
              {{'selected = \"selected\"'}}
            @endif
            value=" {{$brand->id}}">
            {{$brand->brandName}}</option>
          @endforeach
        </select>
      </div>

      <div class="category">
        <label for="category">Categoría:</label>
        <select name="category_id">
          @foreach ($categories as $category)
            <option
            @if($category->id==$category_idAux)
              {{'selected = \"selected\"'}}
            @endif
            value=" {{$category->id}}">
            {{$category->categoryName}}</option>
          @endforeach
        </select>
      </div>

      <div class="">
        <img width="150px" src="/storage/product/{{$imageAux}}" alt="">
        <label for="image">Foto</label>
        <input id="image" type="file" name="image" value="{{$imageAux}}">
      </div>

      <div class="">
        <label for="price">Precio</label>
        <input id="price" type="number" name="price" value="{{$priceAux}}">
      </div>

      <div class="">
        <label for="description">Descripcion</label>
        <input type="text" name="description" value="{{$descriptionAux}}">
      </div>

      <div class="">
        <label for="stock">Stock</label>
        <input id="stock" type="number" name="stock" value="{{$stockAux}}">
      </div>

      <div class="">
        {{-- Cancelar - Vuelve a la página anterior --}}
        <a href="javascript:history.back(-1);">
          <button type="button" class=""> <span class="h6">Cancelar</span></button>
        </a>
        <input type="submit" name="" value="Guradar">
      </div>
    </form>

  </section>

@endsection
