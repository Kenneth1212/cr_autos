@extends('plantilla')
@section('cuerpo')
<div class="container-fluid white">

  <div class="container section ">
    <div class="p-2">
      <button class="btn-floating btn-large cyan" id="back"><i class="material-icons">arrow_back</i></button>
    </div>
    <script>
      $('#back').click(function (e) { 
        e.preventDefault();
        window.history.back();
    });
    
    </script>
    <div id="test-swipe-1" class="col s12">
      <div class="">
        <form action="{{ $ruta=='vehiculo.store'?route($ruta):route($ruta,$carro->id) }}" method="POST"
          enctype="multipart/form-data">

          <input type="hidden" name="" value="{{ $carro!=null?json_encode($carro):'' }}" id="carro">
          @csrf
          @switch($ruta)
          @case('vehiculo.update')
          @method('PUT')
          @break
          @default

          @endswitch

          <div class="row " style="padding:20px">
            <h4 class=""><i class="material-icons">{{ $icon }}</i>
              {{ $titulo }}</h4>
            <hr class="blue-text">
            <input type="hidden" value="{{ $carro!=null?$carro->imgPrincipal:''}}" name="img_original">

            <input type="hidden" value="{{ json_decode(Cookie::get('usuario'),true)['id'] }}" name="id">
            <input type="hidden" value="{{ $carro!=null?$carro->id:-1 }}" name="id_carro">
            <div class="row valign-wrapper ">
              <div class="col s12 m8">
                <div class="file-field input-field">
                  <div class="btn">
                    <span>Foto carro</span>
                    <input type="file" accept="image/jpeg,image/png" name="perfil">
                  </div>
                  <div class="file-path-wrapper">
                    <input class="file-path validate" type="text" placeholder="Sube uno o más archivos">
                  </div>
                </div>
              </div>

              <div class="col s12 m4 ">
                <img
                  src="{{ $carro!=null?($carro->imgPrincipal!=null?asset('storage').'/carroperfil/'.$carro->imgPrincipal:asset('img/carro.png')):asset('img/carro.png') }}"
                  class=" right" height="200px" alt="">
              </div>
            </div>
            <div class="input-field col s6 m6">
              <i class="material-icons prefix">leak_remove</i>
              <label for="cilindraje">Cilindraje</label>
              <input type="text" required name="cilindraje" value="{{ $carro==null?'':$carro->cilindraje }}"
                id="cilindraje" class="validate" required>
            </div>

            <div class="input-field col s6 m6">
              <i class="material-icons prefix">money</i>
              <label for="precio">Precio</label>
              <input type="text" required value="{{ $carro==null?'':$carro->precio }}" name="precio" id="precio"
                class="validate" required>
            </div>

            <div class="row input-field col s12 m6">
              <div class="col s5">
                <i class="material-icons prefix ">local_car_wash</i>
                <label style="padding-right: 20px !important; color: #000 !important;">Marca</label>
              </div>
              <div class="col s7">
                <select id="marca" required name="marca" style="width: 75%; padding-left: 10px !important;">
                  <option value="" disabled selected>Seleccione una marca</option>
                </select>
              </div>
            </div>

            <div class="row input-field col s12 m6">
              <div class="col s5">
                <i class="material-icons prefix">airport_shuttle</i>
                <label style="padding-right: 20px !important; color: #000 !important;">Modelo</label>
              </div>
              <div class="col s7">
                <select id="modelo" required name="modelo" style="width: 75%; padding-left: 10px !important;">
                  <option value="" disabled selected>Seleccione el modelo</option>
                </select>
              </div>
            </div>



            <div class="row input-field col s12 m6">
              <div class="col s5">
                <i class="material-icons prefix">style</i>
                <label style="padding-right: 20px !important; color: #000 !important;">Estilo</label>
              </div>
              <div class="col s7">
                <select id="estilo" required name="estilo" style="width: 75%; padding-left: 10px !important;">
                  <option value="" disabled selected>Seleccione el estilo</option>
                </select>
              </div>
            </div>

            <div class="row input-field col s12 m6">
              <div class="col s5">
                <i class="material-icons prefix ">local_car_wash</i>
                <label style="padding-right: 20px !important; color: #000 !important;">Transmisión</label>
              </div>
              <div class="col s7">
                <select id="transmision" required name="transmision" style="width: 75%; padding-left: 10px !important;">
                  <option value="" disabled selected>Seleccione una transmisión</option>
                </select>
              </div>
            </div>


            <div class="row input-field col s12 m6">
              <div class="col s5">
                <i class="material-icons prefix">format_paint</i>
                <label style="padding-right: 20px !important; color: #000 !important;">Color Exterior</label>
              </div>
              <div class="col s7">
                <select id="colorExterior" required name="colorExterior"
                  style="width: 75%; padding-left: 10px !important;">
                  <option value="" disabled selected>Seleccione el color</option>
                </select>
              </div>
            </div>

            <div class="row input-field col s12 m6">
              <div class="col s5">
                <i class="material-icons prefix">color_lens</i>
                <label style="padding-right: 20px !important; color: #000 !important;">Color Interior</label>
              </div>
              <div class="col s7">
                <select id="colorInterior" required name="colorInterior"
                  style="width: 75%; padding-left: 10px !important;">
                  <option value="" disabled selected>Seleccione el color</option>
                </select>
              </div>
            </div>

            <div class="row input-field col s12 m6">
              <div class="col s5">
                <i class="material-icons prefix ">local_car_wash</i>
                <label style="padding-right: 20px !important; color: #000 !important;">Combustible</label>
              </div>
              <div class="col s7">
                <select id="combustible" required name="combustible" style="width: 75%; padding-left: 10px !important;">
                  <option value="" disabled selected>Seleccione el combustible</option>
                </select>
              </div>
            </div>

            <div class="row input-field col s12 m6">
              <div class="col s5">
                <i class="material-icons prefix">date_range</i>
                <label style="padding-right: 20px !important; color: #000 !important;">Año</label>
              </div>
              <div class="col s7">
                <select id="ano" name="ano" required style="width: 75%; padding-left: 10px !important;">
                  <option value="" disabled selected>Seleccione el año</option>
                </select>
              </div>
            </div>

            <div class="row input-field col s12 m6">
              <div class="container-fluid">
                <i class="material-icons prefix">monetization_on</i>
                <label style="padding-right: 20px !important; color: #000 !important;">Precio es negociable</label>
                <select class="combo" id="negociable" name="negociable"
                  style=" font-size:17px; width:150px; height:35px;">

                  <option value="1">Si</option>
                  <option value="0">No</option>
                </select>
              </div>
            </div>

            <div class="row input-field col s12 m6">
              <div class="container-fluid">
                <i class="material-icons prefix">sensor_door</i>
                <label style="padding-right: 20px !important; color: #000 !important;">Número de puertas</label>
                <select class="combo" id="puertas" name="puertas" style="width: 50%; padding-left: 10px !important;">

                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                </select>
              </div>
            </div>

            <div class="row input-field col s12 m6">
              <div class="container-fluid">
                <i class="material-icons prefix">commute</i>
                <label style="padding-right: 20px !important; color: #000 !important;">¿Se recibe vehículo?</label>
                <select class="combo" id="recibe" name="recibe" style="width: 50%; padding-left: 10px !important;">

                  <option value="1">Si</option>
                  <option value="0">No</option>
                </select>
              </div>
            </div>

            <div class="row input-field col s12 m6">
              <div class="container-fluid">
                <i class="material-icons prefix">drive_eta</i>
                <label style="padding-right: 20px !important; color: #000 !important;">Estado vehículo</label>
                <select class="combo" id="estado" name="estado" style="width: 50%; padding-left: 10px !important;">
                  <option value="0">Disponible</option>
                </select>
              </div>
            </div>

          </div> <!-- FIN ROW -->
          <div class="row  valign-wrapper">
            <div class="col s6">
              <div class="file-field input-field">
                <div class="btn">
                  <span>GALERÍA</span>
                  <input type="file" multiple accept="image/jpeg,image/png" name="file[]" multiple>
                </div>
                <div class="file-path-wrapper">
                  <input class="file-path validate" type="text" placeholder="Sube uno o más archivos">
                </div>
              </div>
            </div>
            <div class="col s6 ">
              <div class="row ">
                <button class="btn waves-effect waves-light right green" style="margin-left: 20px" type="submit">
                  {{ $boton }} <i class="material-icons right">save</i></button>

                <a class="ml-2 btn waves-effect waves-light right cyan" href="{{ route('vehiculo.create') }}">Nuevo <i
                    class="material-icons right">add</i></a>
              </div>

            </div>
          </div>

      </div> <!-- FIN SECTION -->

    </div> <!-- FIN VEHICULO -->

    <div id="test-swipe-2" class="col s12">
      <div class="section">


        <div class="row section" id="panel_galeria" style="width:100%; height:700px; overflow: scroll;">
          @if ($galeria!=null)
          @foreach ($galeria as $g)

          <div class="col s6 m6 l3">
            <div class="card">
              <div class="card-image">
                <img src="{{ asset('storage').'/galeria/'.$g['url'] }}" alt="">
                <a class="remove btn-floating halfway-fab waves-effect waves-light red " id="delete"
                  idcarro="{{ $g['vehiculoId'] }}" url="{{ $g['url'] }}" idimg="{{ $g['id'] }}"><i
                    class="material-icons">delete</i></a>
              </div>
            </div>
          </div>
          @endforeach
          @endif

        </div> <!-- FIN ROW -->



        </form>
      </div> <!-- FIN SECTION -->
    </div> <!-- FIN GALERIA -->

  </div>
</div>

@foreach ($marcas as $m)
<input type="hidden" value='{{ json_encode($m) }}' class="marca" name="marca[]">
@endforeach

{{-- @foreach ($modelos as $m)
<input type="hidden" value='{{ json_encode($m) }}' class="modelo" name="modelo[]">
@endforeach --}}

@foreach ($estilos as $m)
<input type="hidden" value='{{ json_encode($m) }}' class="estilo" name="estilo[]">
@endforeach

@foreach ($transmisiones as $m)
<input type="hidden" value='{{ json_encode($m) }}' class="transmision" name="transmision[]">
@endforeach

@foreach ($colorExteriores as $m)
<input type="hidden" value='{{ json_encode($m) }}' class="colorExterior" name="colorExterior[]">
@endforeach

@foreach ($colorInteriores as $m)
<input type="hidden" value='{{ json_encode($m) }}' class="colorInterior" name="colorInterior[]">
@endforeach

@foreach ($combustibles as $m)
<input type="hidden" value='{{ json_encode($m) }}' class="combustible" name="combustible[]">
@endforeach

<script src="{{ asset('js/busquedas.js') }}"></script>

<script>
  // Or with jQuery
          $(document).ready(function(){
            if ($('#carro').val()!='') {
                carro = JSON.parse($('#carro').val());
                $('#marca').val(carro.marcaId).trigger('change.select2');
                $('#estilo').val(carro.estiloId).trigger('change.select2');
                $('#transmision').val(carro.transmisionId).trigger('change.select2');
                $('#colorExterior').val(carro.colorExteriorId).trigger('change.select2');
                $('#colorInterior').val(carro.colorInteriorId).trigger('change.select2');
                $('#combustible').val(carro.combustibleId).trigger('change.select2');
                $('#ano').val(carro.ano).trigger('change.select2');
                
                $('#negociable').val(carro.negociable);
                $('#vendido').val(carro.vendido);
                $('#puertas').val(carro.cantidadPuertas);
                $('#recibe').val(carro.recibe);
                //$('#modelo').val(carro.modeloId).trigger('change.select2');
                
                $.ajax({
                type: "get",
                url: "http://localhost:8000/modelos/"+carro.marcaId,
                data: "data",
                dataType: "JSON",
                success: function (response) {
                  $("#modelo").empty();
                  console.log(response);
                  lista = [];
                  for (let index = 0; index < response.length; index++) {
                    const element = response[index];
                    lista.push(
                    {
                        "id": element.id,
                        "text": element.nombre
                    });
                  }
                  $('#modelo').select2({
                  data: lista
                });

                $('#modelo').val(carro.modeloId).trigger('change.select2');
                }
                });//ajax
              console.log('PASO POR IF');    
            }else{
                $("#modelo").empty();
                var newOption = new Option('Seleccione su modelo','', true, true);
                $('#modelo').append(newOption).trigger('change');
            }
           });

              $(document).on('click', '.remove', function () {
                idcarro = $(this).attr('idcarro');
                idimg = $(this).attr('idimg');
                url = $(this).attr('url');

                    $.ajax({
                      type: "GET",
                      url: "/eliminarimg/"+idcarro+"/"+idimg+"/"+url,
                     
                      dataType: "JSON",
                      success: function (response) {
                        console.log(response);
                        document.getElementById("panel_galeria").innerHTML="";
                        for (let index = 0; index < response.length; index++) {
                          const img = response[index];
                          $("#panel_galeria").append(
                          `
                          <div class="col s6 m6 l3">
                          <div class="card">
                            <div class="card-image">
                              <img src="{{ asset('storage').'/galeria/'}}${img.url}" alt="">
                              <a class="remove btn-floating halfway-fab waves-effect waves-light red " id="delete"
                                idcarro="${img.vehiculoId}"  url="${img.url}" idimg="${img.id}"><i class="material-icons">delete</i></a>
                            </div>
                          </div>
                          </div>
                          `);                          
                        }
                      }
                    });

                });

            $(document).ready(function(){
              $('.combo').formSelect();
              //$('ul.tabs').tabs();
            });

            $('#marca').change(function (e) { 
              e.preventDefault();
              $.ajax({
                type: "get",
                url: "http://localhost:8000/modelos/"+$(this).val(),
                data: "data",
                dataType: "JSON",
                success: function (response) {
                  
                  $("#modelo").empty();
                  modelos = [];
                  for (let index = 0; index < response.length; index++) {
                    const element = response[index];
                    modelos.push(
                    {
                        "id": element.id,
                        "text": element.nombre
                    });
                  }
                $('#modelo').select2({
                  data: modelos
                });
                console.log(modelos);
                }
              });
            });

            
</script>
@endsection