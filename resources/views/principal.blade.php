@extends('plantilla')

@section('metatoken')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection

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
          <h3>¡Ven por tu auto!</h3>
          <h5 class="light grey-text text-lighten-3">Aquí está lo que estás buscando</h5>
        </div>
      </li>
      <li>
        <img src="{{ asset('img/i2.jpg') }}"> <!-- random image -->
        <div class="caption left-align">
          <h3 class="">¡CR Autos! Las mejores opciones</h3>
          <h5 class="light grey-text text-lighten-3">Encuentra lo que buscas</h5>
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
          <h5 class="light grey-text text-lighten-3">100% de fiabilidad</h5>
        </div>
      </li>
    </ul>
  </div>

</div>

<div class="container-fluid cyan darken-4 white-text ">

  <div class="container section center-align ">
    <div class="col s12 "><span class="flow-text">¡Encuentra lo que buscas!</span>
      <button href="#modal1" class="btn waves-effect waves-light modal-trigger flow-text right  light-blue  " >Buscar<i class="material-icons left">search</i></button></div>
  </div>
</div>

<div class="container-fluid white" >
  <div class="container ">
    <div class="row p-5">
      <table id="table_cars" class=" centered ">
        <thead>
          <tr>
            <th>Vehículos</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($lista as $carro)
          @if ($carro['vendido']==0)
          <tr style="" class="  ">
            <td>
              <div class="row" style="border-bottom: 5px solid #006064   ;">
                <div class="col s12 m6">
                  <div class="p-3">
                    <div class="card-image">
                      <a href="{{ route('vehiculo.show',$carro['id']) }}">
                        <img
                          src="{{ $carro!=null?($carro['imgPrincipal']!=null?asset('storage').'/carroperfil/'.$carro['imgPrincipal']:asset('img/carro.png')):asset('img/carro.png') }}"
                          height="330px" class="">
                      </a>
                    </div>
                  </div>
                </div>
                <div class="col s12 m6">
                  <div class="p-3">
                    <div class="card-content">
                      <table class="highlight" style="font-size: 25px">
                        <tbody class="right-align ">
                          <tr>
                            <td><i class="material-icons ">directions_cars</i>Marca: {{ $carro['marcaId'] }}</td>
                          </tr>
                          <tr>
                            <td><i class="material-icons">star_rate</i> Modelo: {{ $carro['modeloId'] }}</td>
                          </tr>
                          <tr>
                            <td><i class="material-icons">calendar_today</i> Año: {{ $carro['ano'] }}</td>
                          </tr>
  
                          <tr>
                            <td><i class="material-icons">credit_card</i> Precio: {{ $carro['precio'] }}</td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="card-action p-5">
                      <a class=" btn-large waves-effect waves-light light-blue accent-3"
                        href="{{ route('vehiculo.show',$carro['id']) }}" type="submit">
                        Ver<i class="material-icons left">visibility</i></a>
                    </div>
                  </div>
                </div>
              </div>
            </td>
          </tr>
          
          @endif
          @endforeach
  
        </tbody>
      </table>
    </div>
  </div>
</div>

@include('vehiculo.modalfiltro')


<script>
  $(document).ready(function () {
    
    //$('select').formSelect();
       $('.slider').slider();

       $('#btn-float').floatingActionButton();
  });   
</script>
@endsection