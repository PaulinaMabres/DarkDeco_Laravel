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
        <label for="name">Nombre:</label>
        <input id="name" type="text" name="name" value="{{old("name")}}">
        <small>{{$errors->first('name')}}</small>
      </div>

      <div class="color">
        <label for="color">Color:</label>
        <select name="color_id">
          @foreach ($colors as $color)
            <option
            @if($color->id==old("color_id"))
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
            @if($category->id==old("categoria_id"))
              {{'selected = \"selected\"'}}
            @endif
            value=" {{$category->id}}">
            {{$category->categoria}}</option>
          @endforeach
        </select>
      </div>

      <div class="">
        <img width="150px" src="/storage/product/{{old("foto")}}" alt="">
        <label for="foto">Foto</label>
        <input id="foto" type="file" name="foto" value="{{old("foto")}}">
      </div>

      <div class="">
        <label for="precio">Precio</label>
        <input id="precio" type="number" name="precio" value="{{old("precio")}}">
      </div>

      <div class="">
        <label for="descripcion">Descripcion</label>
        <input type="text" name="descripcion" value="{{old("descripcion")}}">
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
