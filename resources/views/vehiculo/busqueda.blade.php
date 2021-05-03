@extends('plantilla')

@section('cuerpo')
<div class="container-fluid cyan darken-4 white-text ">

  <div class="container section center-align ">
    <div class="col s12 "><span class="flow-text">¡Encuentra lo que buscas!</span>
      <button href="#modal1" class="btn waves-effect waves-light modal-trigger flow-text right  light-blue  " >Buscar<i class="material-icons left">search</i></button></div>
  </div>
</div>

<div class="container-fluid white ">
  <div class="container ">
    <input type="hidden" name="" id="config" value="{{ $config==null?'':json_encode($config) }}">
    <div class="row p-5">
        <table id="table_cars" class=" centered ">
            <thead>
                <tr>
                    <th>Vehículos</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($filtro as $carro)
                @if ($carro['vendido']==0)
                <tr style="" class=" ">
                    <td>
                      <div class="row" style="border-bottom: 5px solid #006064   ;">
                        <div class="col s12 m6">
                          <div class="p-3">
                            <div class="card-image">
                              <a href="{{ route('vehiculo.show',$carro['id']) }}">
                                <img
                                  src="{{ $carro!=null?($carro['imgPrincipal']!=null?asset('storage').'/carroperfil/'.$carro['imgPrincipal']:asset('img/carro.png')):asset('img/carro.png') }}"
                                  height="300px" class="">
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
        init();
    });
    
    function init(){
        if($('#config').val()!=''){
            carro = JSON.parse($('#config').val());
            console.log(carro);
            
                $('#marca').val(carro.marca).trigger('change.select2');
                $('#estilo').val(carro.estilo).trigger('change.select2');
                $('#colorExterior').val(carro.color_exterior).trigger('change.select2');
                $('#colorInterior').val(carro.color_interior).trigger('change.select2'); 
                
                $('#cilindraje').val(carro.cilindraje=='10000000'?'':carro.cilindraje); 
                $('#labelcilindraje').addClass('active'); 

                $('#'+carro.transmision).prop("checked", true);
                $('#'+carro.combustible).prop("checked", true);
                $('#'+carro.puerta1+"-"+carro.puerta2).prop("checked", true);
                $('#'+carro.order).prop("checked", true);
               

                var slider = document.getElementById("slider");
                slider.noUiSlider.set([carro.precio_inicio,carro.precio_final]);  

                $('#s1').text((slider.noUiSlider.get()[0]).substring(0, slider.noUiSlider.get()[0].length-3));
                $('#s2').text((slider.noUiSlider.get()[1]).substring(0, slider.noUiSlider.get()[1].length-3));

                $("#rango_precio").val(JSON.stringify({
                p1 : (slider.noUiSlider.get()[0]).substring(0, slider.noUiSlider.get()[0].length-3),
                p2 : (slider.noUiSlider.get()[1]).substring(0, slider.noUiSlider.get()[1].length-3)
                }));     
                
                var sliderDos = document.getElementById("sliderDos");
                sliderDos.noUiSlider.set([carro.ano_inicio,carro.ano_final]);  

                $('#sa1').text((sliderDos.noUiSlider.get()[0]).substring(0, 4));
                $('#sa2').text((sliderDos.noUiSlider.get()[1]).substring(0, 4));

                  $("#rango_ano").val(JSON.stringify({
                   ai1 : (sliderDos.noUiSlider.get()[0]).substring(0, 4),
                   af2 : (sliderDos.noUiSlider.get()[1]).substring(0, 4)
                }));

            if (carro.marca!=null) {
                $.ajax({
                type: "get",
                url: "http://localhost:8000/modelos/"+carro.marca.substring(0,carro.marca.indexOf("/")),
                data: "data",
                dataType: "JSON",
                success: function (response) {
                  $("#modelo").empty();
                  var newOption = new Option('Seleccione su modelo','', true, true);
                   $('#modelo').append(newOption).trigger('change');
                  modelos = [];
                  for (let index = 0; index < response.length; index++) {
                    const element = response[index];
                    modelos.push(
                    {
                        "id": element.nombre,
                        "text": element.nombre
                    });
                  }
                $('#modelo').select2({
                  data: modelos
                });
                $('#modelo').val(carro.modelo).trigger('change.select2');
               
                }
              });
            }  //AJAX    
        }
    }
</script>
@endsection