@extends('default');

@section('head')
  <link rel="stylesheet" href="/css/faq.css">
@endsection

<!-- Contenido de FAQ -->
@section('contenidoBody')

  <div class="container-fluid ayudinHeight d-flex align-items-center"> <?php // IDEA: (Lucas) agrego una clase de min height para arreglar una cosa ?>

    <div class="accordion row" id="accordionExample">

      {{-- // Recorro el array generando tarjetas con las preguntas y respuestas --}}
      @for ($i=0; $i < count($preguntasFrecuentes); $i++)
        {{-- Pregunta --}}
        <div class="card col-12">
          <div class="card-header" id="heading{{$i}}"class="mb-0" data-toggle="collapse" data-target="#collapse{{$i}}" aria-expanded="false" aria-controls="collapse{{$i}}">
            <!-- <i class="estrella fas fa-star"></i> -->
            <i class="icono-preguntas fas fa-home"></i>
            {{$preguntasFrecuentes[$i]["pregunta"]}}
          </div>
          {{-- Respuesta --}}
          <div id="collapse{{$i}}" class="collapse hide" aria-labelledby="heading{{$i}}" data-parent="#accordionExample">
            <div class="card-body">
              {{$preguntasFrecuentes[$i]["respuesta"]}}
            </div>
          </div>
        </div>

      @endfor

    </div>
  </div>

@endsection
