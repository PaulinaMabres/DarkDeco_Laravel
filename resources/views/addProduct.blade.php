@extends('default');

@section('head')
  {{-- <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/faq.css"> --}}
@endsection

@section('contenidoBody')

  <h1>Agregar producto</h1>

  <section>

    <ul>
      @foreach ($errors->all() as $error)
        <li>
          {{$error}}
        </li>
      @endforeach
    </ul>

    <form class="" action="/addProduct" method="post" enctype="multipart/form-data">
      @csrf {{-- ES OBLIGATORIO PARA FORMS METHOD POST --}}
      {{-- {{csrf_field()}} --}}

      <div class="">
        <label for="productName">Nombre:</label>
        <input id="productName" type="text" name="productName" value="{{old("productName")}}">
        <small>{{$errors->first('productName')}}</small>
      </div>

      <div class="brand">
        <label for="brand">Marca:</label>
        <select name="brand_id">
          @foreach ($brands as $brand)
            <option
            @if($brand->id==old("brand_id"))
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
            @if($category->id==old("category_id"))
              {{'selected = \"selected\"'}}
            @endif
            value=" {{$category->id}}">
            {{$category->categoryName}}</option>
          @endforeach
        </select>
      </div>

      <div class="">
        <img width="150px" src="/storage/product/{{old("image")}}" alt="">
        <label for="image">Foto</label>
        <input id="image" type="file" name="image" value="{{old("image")}}">
      </div>

      <div class="">
        <label for="price">Precio</label>
        <input id="price" type="number" name="price" value="{{old("price")}}">
      </div>

      <div class="">
        <label for="description">Descripcion</label>
        <input type="text" name="description" value="{{old("description")}}">
      </div>

      <div class="">
        <label for="stock">Stock</label>
        <input id="stock" type="number" name="stock" value="{{old("stock")}}">
      </div>

      <div class="">
        <a href="/products">
          <button type="button" class=""> <span class="h6">Cancelar</span></button>
        </a>
        <input type="submit" name="" value="Guradar">
      </div>
    </form>

  </section>

@endsection
