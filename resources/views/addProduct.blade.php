@extends('default');

@section('head')
  <link rel="stylesheet" href="/css/products.css">
  <script src="/js/addEditProduct.js"> </script>

  {{-- Scripts para cargar la foto --}}
  {{-- https://bootsnipp.com/snippets/eNbOa --}}
  {{-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> --}}
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
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

      <div class="product-card card mb-3" style="max-width: 1000px; margin: auto; margin-top: 20px;">
        <div class="row no-gutters">

          {{-- FOTO --}}
          <div class="product-card-img col-md-4 col-sm-12 card-img">
            {{-- <label>Foto</label> --}}
            <div class="product-foto">
              <img width="150px" id='img-upload' src=""/>
            </div>
            <div class="input-foto input-group mb-3">
              <input type="file" class="custom-file-input" id="imgInp" aria-describedby="inputGroupFileAddon01" name="image" value="{{old("image")}}" required>
              <label id="labelImg" class="custom-file-label" for="inputGroupFile01">Seleccionar imagen</label>
            </div>
          </div>

          {{-- INFO DEL PRODUCTO --}}
          <div class="product-card-info col-md-8 col-sm-12">
            <div class="product-card-header card-header">
              <h1>Agregar producto</h1>
            </div>
            <div class="product-card-body card-body">

              {{-- Nombre --}}
              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1">Nombre</span>
                </div>
                <input id="productName" type="text" class="form-control" name="productName" placeholder="" aria-label="Nombre" aria-describedby="basic-addon1" value="{{old("productName")}}" required>
                {{-- <small>{{$errors->first('productName')}}</small> --}}
              </div>

              {{-- Descripción --}}
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-label-descripcion input-group-text">Descripción</span>
                </div>
                <textarea id="description" class="input-text-descripcion form-control" aria-label="With textarea" name="description" value="{{old("description")}}" required></textarea>
              </div>

              <div class="input-group mb-3" style="margin-top: 10px;">
                {{-- Marca --}}
                <div class="input-group-prepend">
                  <label class="input-group-text" for="inputGroupSelectBrand">Marca</label>
                </div>
                <select name="brand_id" class="custom-select" id="inputGroupSelectBrand">
                  @foreach ($brands as $brand)
                    <option
                    @if($brand->id==old("brand_id"))
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
                    @if($category->id==old("category_id"))
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
                <input id="price" type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="price" value="{{old("price")}}" required>
                {{-- Stock --}}
                <div class="input-stock input-group-prepend">
                  <span class="input-group-text">Stock</span>
                </div>
                <input id="stock" type="number" class="form-control" aria-label="Amount (to the nearest dollar)" name="stock" value="{{old("stock")}}">
              </div>

            </div>

            <div class="product-card-footer card-footer">
              <div class="">
                {{-- Cancelar - Vuelve a la página anterior --}}
                <input class="btn btn-secondary" onclick="window.location.href='javascript:history.back(-1);'" type="" name="cancelar" value="Cancelar">
                <input class="btn btn-secondary" type="submit" name="" value="Guardar">
              </div>
            </div>
          </div>
        </div>
      </div>

    </form>
  </section>

@endsection
