@extends('default');

@section('head')
  {{-- <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/faq.css"> --}}
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

      <div class="card mb-3" style="max-width: 1000px; margin: auto; margin-top: 20px;">
        {{-- <div class="card mb-3" style=""> --}}
        <div class="row no-gutters">
          <div class="col-md-4">
            <div class="input-group mb-3">
              <div class="input-group-prepend">
                {{-- <label for="image">Foto</label> --}}
                <span class="input-group-text" id="basic-addon1" style="width:80px;">Foto</span>
                <input id="image" type="file" class="form-control" name="image" value="{{old("image")}}">
              </div>
            </div>
            <img width="150px" src="/storage/product/{{old("image")}}" alt="">
          </div>

          <div class="col-md-8">
            <div class="card-header">
              <h1>Agregar producto</h1>
            </div>
            <div class="card-body">

              {{-- <div class="">
                <label for="productName">Nombre:</label>
                <input id="productName" type="text" name="productName" value="{{old("productName")}}">
                <small>{{$errors->first('productName')}}</small>
              </div> --}}

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" id="basic-addon1" style="width:80px;">Nombre</span>
                </div>
                <input id="productName" type="text" class="form-control" name="productName" placeholder="" aria-label="Nombre" aria-describedby="basic-addon1" value="{{old("productName")}}">
                {{-- <input id="productName" type="text" name="productName" value="{{old("productName")}}"> --}}
              </div>

              {{-- <div class="">
                <label for="description">Descripcion</label>
                <input type="text" name="description" value="{{old("description")}}">
              </div> --}}

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;">Descripción</span>
                </div>
                <textarea class="form-control" aria-label="With textarea" name="description" value="{{old("description")}}"></textarea>
              </div>

              {{-- <div class="brand">
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
              </div> --}}

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

              {{-- <div class="category">
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
              </div> --}}

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

              {{-- <div class="">
                <label for="price">Precio</label>
                <input id="price" type="number" name="price" value="{{old("price")}}">
              </div> --}}

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;">Precio $</span>
                </div>
                <input id="price" type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="price" value="{{old("price")}}">
                <div class="input-group-append">
                  <span class="input-group-text">.00</span>
                </div>
              </div>

              {{-- <div class="">
                <label for="stock">Stock</label>
                <input id="stock" type="number" name="stock" value="{{old("stock")}}">
              </div> --}}

              <div class="input-group mb-3">
                <div class="input-group-prepend">
                  <span class="input-group-text" style="width:80px;">Stock</span>
                </div>
                <input id="stock" type="text" class="form-control" aria-label="Amount (to the nearest dollar)" name="stock" value="{{old("stock")}}">
                {{-- <div class="input-group-append">
                  <span id="price" class="input-group-text" name="price" value="{{old("price")}}">0</span>
                </div> --}}
              </div>

            </div>
            <div class="card-footer">
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
