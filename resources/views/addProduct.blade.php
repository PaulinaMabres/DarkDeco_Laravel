@extends('default');

@section('head')
  <link rel="stylesheet" href="/css/products.css">
  <script src="/js/abmProduct.js"> </script>

  {{-- Scripts para cargar la foto --}}
  {{-- https://bootsnipp.com/snippets/eNbOa --}}
  {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <!-- Include the above in your HEAD tag ---------->
@endsection

@section('contenidoBody')

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

      <div class="product-card card mb-3" style="max-width: 1000px; margin: auto; margin-top: 20px;">
        <div class="row no-gutters">

          {{-- FOTO --}}
          <div class="product-card-img col-md-4 card-img">
            {{-- <label>Foto</label> --}}
            <div class="product-foto">
              <img width="150px" id='img-upload'/>
            </div>
            <div class="input-foto input-group mb-3">
              <input type="file" class="custom-file-input" id="imgInp" aria-describedby="inputGroupFileAddon01" name="image" value="{{old("image")}}" required>
              <label class="custom-file-label" for="inputGroupFile01">Seleccionar imagen</label>
            </div>
          </div>

          {{-- INFO DEL PRODUCTO --}}
          <div class="product-card-info col-md-8">
            <div class="product-card-header card-header">
              <h1>Agregar producto</h1>
            </div>
            <div class="product-card-body card-body">

              {{-- Nombre --}}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1" style="width:80px;">Nombre</span>
                </div>
                <input id="productName" type="text" class="form-control" name="productName" placeholder="" aria-label="Nombre" aria-describedby="basic-addon1" value="{{old("productName")}}" required>
                {{-- <small>{{$errors->first('productName')}}</small> --}}
              </div>

              {{-- Descripción --}}
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;">Descripción</span>
                </div>
                <textarea class="form-control" aria-label="With textarea" name="description" value="{{old("description")}}" required></textarea>
              </div>

              {{-- Marca --}}
              <div class="input-group mb-3" style="margin-top: 10px;">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01" style="width:80px;">Marca</label>
                </div>
                <select name="brand_id" class="custom-select" id="inputGroupSelect01">
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

              {{-- Categoría --}}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelect01" style="width:80px;">Categoría</label>
                </div>
                <select name="category_id" class="custom-select" id="inputGroupSelect01">
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

              {{-- Precio --}}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;">Precio $</span>
                </div>
                <input id="price" type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="price" value="{{old("price")}}" required>
                <div class="input-group-append">
                  <span class="input-group-text">.00</span>
                </div>
              </div>

              {{-- Stock --}}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;">Stock</span>
                </div>
                <input id="stock" type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="stock" value="{{old("stock")}}">
              </div>

            </div>

            <div class="product-card-footer card-footer">
              <div class="">
                {{-- Cancelar - Vuelve a la página anterior --}}
                <a href="javascript:history.back(-1);">
                  <button class="btn btn-secondary" type="button" class=""> <span class="h6">Cancelar</span></button>
                </a>
                <input class="btn btn-secondary" type="submit" name="" value="Guradar">
              </div>
            </div>
          </div>
        </div>
      </div>

    </form>
  </section>

@endsection
