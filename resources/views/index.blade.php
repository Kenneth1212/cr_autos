@extends('plantilla')
@section('cuerpo')

<div class="container-fluid carousel carousel-slider center">
  <div class="slider">
    <ul class="slides">
      <li>
        <img src="{{ asset('img/portada.jpg') }}">
        <!-- random image -->
      </li>
      <li>
        <img src="{{ asset('img/i1.jpg') }}">
        <!-- random image -->
        <div class="caption right-align">
          <h3>Ven por tu auto!</h3>
          <h5 class="light grey-text text-lighten-3">Aquí está lo que estás buscando</h5>
        </div>
      </li>
      <li>
        <img src="{{ asset('img/i2.jpg') }}"> <!-- random image -->
        <div class="caption left-align">
          <h3 class="">CR Autos mejores opciones</h3>
          <h5 class="light grey-text text-lighten-3">Encuentra lo que buscabas</h5>
        </div>
      </li>
      <li>
        <img src="{{ asset('img/i3.jpg') }}">

        <div class="caption right-align">
          <!-- random image -->
          <h3>Contáctate al instante</h3>
          <h5 class="light grey-text text-lighten-3 ">Rápido y fácil</h5>
        </div>
      </li>
      <li>
        <img src="{{ asset('img/i4.jpg') }}">

        <div class="caption center-align">
          <!-- random image -->
          <h3>Seguridad y confianza</h3>
          <h5 class="light grey-text text-lighten-3">100% se fiabilidad</h5>
        </div>
      </li>
    </ul>
  </div>

</div>

<div class="container-fluid cyan darken-4 white-text">

  <div class="container section center-align ">
    <div class="col s12 "><span class="flow-text">¡Lo más nuevo!</span>
    </div>
  </div>
</div>
<div class="container-fluid cartas ">
  <div class="container">
    <div class="row">

      <div class="col s12 m4">
        <div class="card-panel hoverable">
          <img src="{{ asset('img/card5.jpg') }}" class="" style="width: 100%">
          <p class="center-align">Chevrolet</p>
          <p class="center-align">Camionetas eficientes, duraderas, que combina
            resistencia y confiabilidad con una tecnología innovadora.</p>
          <button href="#" class="btn waves-effect waves-light" style="width: 100%;">
            <i class="material-icons center">visibility</i>
          </button>
        </div>
      </div>

      <div class="col s12 m4">
        <div class="card-panel hoverable">
          <img src="{{ asset('img/card3.jpg') }}" class="responsive-img" style="width: 100%">
          <p class="center-align">Toyota RVA4</p>
          <p class="center-align">Dejate sorprender por la quinta generación de uno de los
            SUV más queridos por los toyoteros que tiene la mejor tecnologia.</p>
          <button href="#" class="btn waves-effect waves-light" style="width: 100%;">
            <i class="material-icons center">visibility</i>
          </button>
        </div>
      </div>

      <div class="col s12 m4">
        <div class="card-panel hoverable">
          <img src="{{ asset('img/card6.jpg') }}" class="responsive-img" style="width: 100%">
          <p class="center-align">Volkswagen</p>
          <p class="center-align">Este modelo se caracteriza por su racionalidad,
            con versiones que cubren la mayoría de las necesidades de los usuarios.</p>
          <button href="#" class="btn waves-effect waves-light" style="width: 100%;">
            <i class="material-icons center">visibility</i>
          </button>
        </div>
      </div>

    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="parallax-container">
    <div class="parallax"><img src="{{ asset('img/i4.jpg') }}"></div>
  </div>
</div>
<div class="container-fluid grey lighten-3 contenido  white">
  <div class="row white" style="margin-bottom: 0px; ">
    <div class="col s6 m6 pl-5 white">
      <div class="descripcion" id="subrayado">
        <h2>CRAutos</h2>
        <p>En CrAutos tu eres lo mas importante asi que estamos atentos a tus necesidades y
          te ayudaremos a encontrar el carro perfecto para ti, sólo comprando en CrAutos
          tu compra es segura. Todos nuestros vehículos cuentan con garantía, contamos con
          excelentes precios para que puedas tener un carro de una forma fácil.</p>
      </div>
    </div>

    <div class="col s6 m6">
      <div class="row">
        <div class="col s6 m6">
          <img src="img/carousel3.png" alt="" class="materialboxed responsive-img">
        </div>
        <div class="col s6 m6" id="tit_uno">
          <br>
          <h5 id="infoUno">Audi</h5>
          <p style="text-align: right;">Marca de coches premium, especializada en automóviles de lujo.
            Pertenece al Grupo Volkswagen, uno de los grupos automovilísticos más grandes del mundo.</p>
          <br>
        </div>

        <div class="col s6 m6" id="tit_dos">
          <br>
          <h5 id="infoDos">Seat Arona</h5>
          <p style="text-align: left;">Es el primer crossover del segmento B de SEAT.
            Se trata de una versión crossover del SEAT Ibiza, con el que comparte plataforma MQB A0.</p>
          <br>
        </div>
        <div class="col s6 m6 imagenes">
          <img src="img/carousel1.png" alt="" class="materialboxed responsive-img">
        </div>
      </div>
    </div>
  </div>
</div>

<div class="container-fluid center informacion">
  <p>Nuestro equipo realizan revisiones detalladas de cada aspecto de los autos,
    lo más importante es que cada auto vendido este en optimas condiciones.
  </p>
</div>
<div class="container-fluid">
  <div class="parallax-container">
    <div class="parallax"><img src="{{ asset('img/i3.jpg') }}"></div>
  </div>
</div>
 
<script>
  var options ={indicators:false,
    duration:100};
    document.addEventListener('DOMContentLoaded', function () {
      var elems = document.querySelectorAll('.slider');
      var instances = M.Slider.init(elems, options, {
      }); 
    });

  $(document).ready(function(){
    $('.parallax').parallax();
  });
</script>

@endsection