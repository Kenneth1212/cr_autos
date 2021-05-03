@extends('plantilla')
@section('cuerpo')
<div class="container-fluid white">
  <div class="container ">

    <div class="row p-2" >
      <blockquote class="flow-text">Mis favoritos</blockquote>
      <table id="table_cars" class=" centered ">
        <thead>
          <tr>
            <th>Vehículos</th>
          </tr>
        </thead>
        <tbody>
  
          @foreach ($lista as $carro)
          @if ($carro['vendido']==0)
          <tr style="250px !important">
            <td>
              <div class="row" style="border-bottom: 5px solid #006064   ;">
                <div class="col s12 m6">
  
                  <div class="">
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
                  <div class="">
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
  @endsection