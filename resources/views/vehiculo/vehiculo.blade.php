@extends('plantilla')
@section('cuerpo')

@if ($carro->vendedorId!=(Cookie::get('usuario')!=null?json_decode(Cookie::get('usuario'),true)['id']:-1))
@include('vehiculo.btn')
@endif

<div class="container-fluid white">
    <div class="container section">
        <div class="p-2">
            <button class="btn-floating btn-large cyan" id="back"><i class="material-icons">arrow_back</i></button>
        </div>
        <div class="row ">
    
    
            <div class="col s12 m6 ">
    
                <div class="card ">
                    <div class="card-action ">
                        <span class="card-title "><strong>Vehículo</strong></span>
                        <img src="{{ $carro!=null?($carro->imgPrincipal!=null?asset('storage').'/carroperfil/'.$carro->imgPrincipal:asset('img/carro.png')):asset('img/carro.png') }}"
                            width="100%" height="100%" class="">
                    </div>
                     
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card teal darken-1 white-text">
                    <div class="card-content">
                        <table class="highlight" style="font-size: 20px">
                            <tbody class="right-align ">
                                <tr>
                                    <td><i class="material-icons">directions_cars</i>Marca: {{ $carro['marcaId'] }}</td>
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
                    <div class="card-action teal darken-2 white-text">
                        <span class="card-title"><strong>Vendedor:</strong></span>
                        <table class="card-panel teal darken-1">
                            <tr>
                                <th>Nombre:</th>
                                <td>{{ $usuario['nombre'] }}</td>
                            </tr>
                            <tr>
                                <th>Teléfono:</th>
                                <td>{{ $usuario['telefono'] }}</td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col s12 mp-5">
                <hr>
                <br>
            </div>
            <div class="row centered">
               
                <div class="col s12 col m6" style=" height: 660px; overflow-y: scroll;">
                    <blockquote class="text-black flow-text">GALERÍA</blockquote>
                    <div class=" text-center" style=margin-top:20px;">
                        @if ($galeria!=null)
                        <div class="text-center demo-gallery mt-10">
                            <ul id="lightgallery" class="list-unstyled row">
    
                                @foreach ($galeria as $g)
    
                                <li class="col-xs-6 col-sm-12 col-md-6 col-lg-6"
                                    data-responsive="https://sachinchoolur.github.io/lightgallery.js/static/img/13-1600.jpg"
                                    data-src="{{ asset('storage').'/galeria/'.$g['url'] }}"
                                    data-sub-html="<h4>UCR</h4><p>CRAutos</p>">
                                    <a href="" class="">
                                        <img class="" src="{{ asset('storage').'/galeria/'.$g['url'] }}">
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </div>
                </div>
                <div class="col s12 col m6  pl-5" style="">
    
                    <blockquote class="flow-text text-black">INFORMACIÓN</blockquote>
                    <div class="center-align">
    
                        <table class="striped card-panel">
    
                            <tr>
                                <th>Cilindraje </th>
                                <td>{{ $carro['cilindraje'] }}</td>
                            </tr>
                            <tr>
                                <th>Cantidad Puertas</th>
                                <td>{{ $carro['cantidadPuertas'] }}</td>
                            </tr>
                            <tr>
                                <th>Recibe</th>
                                <td>{{ $carro['recibe']==0?'No':'Sí' }}</td>
                            </tr>
                            <tr>
                                <th>Negociable</th>
                                <td>{{ $carro['negociable']==0?'No':'Sí' }}</td>
                            </tr>
                            <tr>
                                <th>Fecha Ingreso</th>
                                <td>{{ $carro['fechaIngreso'] }}</td>
                            </tr>
                            <tr>
                                <th>Vendido</th>
                                <td>{{ $carro['vendido']==0?'No':'Sí' }}</td>
                            </tr>
                            <tr>
                                <th>Estilo</th>
                                <td>{{ $carro['estiloId'] }}1</td>
                            </tr>
                            <tr>
                                <th>Transmisión</th>
                                <td>{{ $carro['transmisionId'] }}</td>
                            </tr>
                            <tr>
                                <th>Color Exterior</th>
                                <td>{{ $carro['colorExteriorId'] }}</td>
                            </tr>
                            <tr>
                                <th>Color Interior</th>
                                <td>{{ $carro['colorInteriorId'] }}</td>
                            </tr>
                            <tr>
                                <th>Combustible</th>
                                <td>{{ $carro['combustibleId'] }}</td>
                            </tr>
    
                        </table>
                    </div>
                </div>
            </div>
    
    
        </div>
    
        <script>
            $('#back').click(function (e) { 
                e.preventDefault();
                window.history.back();
            });
            $(document).ready(function(){
              $('.carousel').carousel();
            });
    
    
            document.addEventListener('DOMContentLoaded', ()=>{
    
            const imgLightBox = document.querySelectorAll('.materialboxed');
            M.Materialbox.init(imgLightBox, {
                inDuration: 500,
                outDuration: 500
            });
            });
        </script>
</div>


    @endsection