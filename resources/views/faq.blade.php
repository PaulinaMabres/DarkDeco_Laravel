@extends('default');

@section('head')
  <link rel="stylesheet" href="css/master.css">
  <link rel="stylesheet" href="css/faq.css">
@endsection

<!-- Contenido del Home -->
@section('contenidoBody')
  <!-- Contenido de FAQ -->
  <div class="container-fluid ayudinHeight d-flex align-items-center"> <?php // IDEA: (Lucas) agrego una clase de min height para arreglar una cosa ?>

    {{-- @include('partials/arrayFAQs'); --}}
    {{-- @php
      include('partials/arrayFAQs');
    @endphp --}}
    {{-- {{dd($preguntasFrecuentes)}} --}}

    @php
    // Array de preguntas y respuestas frecuentes
    $preguntasFrecuentes[] = [
      "pregunta" => "¿Cómo realizo la compra de mis muebles en Dark Déco?",
      "respuesta" => "Podes ver los modelos que trabajamos de forma continua en este Sitio. Una vez elegidos los modelos que quieras adquirir, podes comprar directamente desde el carrito de compras online, o ponerte en contacto con nosotros vía Mail, formulario de consulta o teléfono para realizar todas las consultas que necesites y luego poder generar la compra."
    ];
    $preguntasFrecuentes[] = [
      "pregunta" => "¿Puedo ver los muebles antes de comprarlos?",
      "respuesta" => "Sí, por supuesto. Podes solicitar una cita poniéndote en contacto con nosotros para coordinar una visita y acercarte a conocer nuestros productos."
    ];
    $preguntasFrecuentes[] = [
      "pregunta" => "¿Se pueden realizar modificaciones en los muebles que tienen publicados?¿Realizan muebles a medida?",
      "respuesta" => "Sí. Podes elegir las medidas de los muebles, así como también los lustres, terminaciones, combinaciones de telas y colores. Contamos con un equipo de diseñadoras, que te van a asesorar y acompañar en todo el proceso de diseño, para que los muebles queden tal como te los imaginas. Podes enviarnos imágenes de referencia, contarnos tus ideas, así como también fotos de los ambientes para brindarte un asesoramiento personalizado y ajustado a tu necesidad."
    ];
    $preguntasFrecuentes[] = [
      "pregunta" => "¿Cuál es el costo de envío?",
      "respuesta" => "El costo de envío dependerá de la zona de entrega. El mismo se cotizará via telefónica con el cliente una vez que se haya concretado la venta."
    ];
    $preguntasFrecuentes[] = [
      "pregunta" => "¿Cómo puedo abonar mi compra?",
      "respuesta" => "Podes abonar en efectivo, transferencia bancaria, depósito bancario o aprovechando todas las opciones y cuotas sin interés que brinda la plataforma de pagos online Mercado Pago a través de tu tarjeta de crédito. "
    ];
    $preguntasFrecuentes[] = [
      "pregunta" => "¿Cómo se realizan los envíos?",
      "respuesta" => "Realizamos envíos a todo el país por Oca o de forma personalizada al domicilio del cliente. Además, podés retirar tus compras en nuestro Showroom."
    ];
    $preguntasFrecuentes[] = [
      "pregunta" => "¿Cuánto tarda en llegar el pedido?",
      "respuesta" => "El tiempo de entrega dependerá del tipo de producto comprado. Para los productos de bazar y decoración la demora  se encuentra entre 3 y 7 días hábiles luego de acreditado el pago.En cuanto a la compra de objetos  muebles la demora se emcuentra entre los 10 y los 15 días hábiles  luego de acreditado el pago."
    ];
    $preguntasFrecuentes[] = [
      "pregunta" => "¿Cuál es el plazo para realizar un cambio?",
      "respuesta" => "Puedes solicitar un cambio hasta 10 días luego de realizada la compra."
    ];
    $preguntasFrecuentes[] = [
      "pregunta" => "¿Qué debo hacer si el producto no llega en buen estado?",
      "respuesta" => "Ponte en contacto con nosotros a alp_deco@mail.com y coordinaremos juntos para solucionar el problema."
    ];
    @endphp

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
