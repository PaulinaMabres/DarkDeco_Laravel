@extends('default');

@section('head')
  {{-- <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/faq.css"> --}}
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
      @if (old("name"))
        @php
          $nombreAux = old("name");
          $color_idAux = old("color_id");
          $categoria_idAux = old("categoria_id");
          $fotoAux = old("foto");
          $precioAux = old("precio");
          $descripcionAux = old("descripcion");
          $stockAux = old("stock");
        @endphp
      @else
        @php
          $nombreAux = $product->nombre;
          $color_idAux = $product->color_id;
          $categoria_idAux = $product->categoria_id;
          $fotoAux = $product->foto;
          $precioAux = $product->precio;
          $descripcionAux = $product->descripcion;
          $stockAux = $product->stock;
        @endphp
      @endif

      <div class="">
        <label for="name">Nombre:</label>
        <input id="name" type="text" name="name" value="{{$nombreAux}}">
        <small>{{$errors->first('name')}}</small>
      </div>

      <div class="color">
        <label for="color">Color:</label>
        <select name="color_id">
          @foreach ($colors as $color)
            <option
            @if($color->id==$color_idAux)
              {{'selected = \"selected\"'}}
            @endif
            value=" {{$color->id}}">
            {{$color->color}}</option>
          @endforeach
        </select>
      </div>

      <div class="category">
        <label for="category">Categoría:</label>
        <select name="categoria_id">
          @foreach ($categories as $category)
            <option
            @if($category->id==$categoria_idAux)
              {{'selected = \"selected\"'}}
            @endif
            value=" {{$category->id}}">
            {{$category->categoria}}</option>
          @endforeach
        </select>
      </div>

      <div class="">
        <img src="product/{{old("foto")}}" alt="">
        <label for="foto">Foto</label>
        <input id="foto" type="file" name="foto" value="{{$fotoAux}}">
      </div>

      <div class="">
        <label for="precio">Precio</label>
        <input id="precio" type="number" name="precio" value="{{$precioAux}}">
      </div>

      <div class="">
        <label for="descripcion">Descripcion</label>
        <input type="text" name="descripcion" value="{{$descripcionAux}}">
      </div>

      <div class="">
        <label for="stock">Stock</label>
        <input id="stock" type="number" name="stock" value="{{$stockAux}}">
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
