<script src="{{ asset('js/filtro.js') }}"></script>
<div id="modal1" class="modal" style="  margin-top: -30px; 
max-height: 100%;
width: 80% !important;" style="background-color: white !important ">
    <a class="btn white-text  red centered modal-close waves-effect waves-green btn-flat right">
        <i class="material-icons  center">close</i></a>
    <div class="container-fluid">
        <form action="{{ route('filtro') }}" method="POST"
            style="background-color:white; padding: 10px 40px 40px 40px;">
            @csrf
            <div class="row" style="margin-left: 20px !important;">
                <h3 style="text-align: center; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
                    <strong>BUSCAR AUTO<i style="font-size: 45px !important; padding: 10px;"
                            class="material-icons prefix">directions_car</i></strong>
                </h3>
                <hr />

                <div class="row input-field col s12 m6">
                    <div class="container-fluid">
                        <i class="material-icons prefix">list</i>
                        <label style="
                padding-right: 26px !important;
                color: #000 !important;
              ">Marca</label>
                        <select id="marca" name="marca" style="width: 50%; padding-left: 10px !important;">
                            <option value="" selected>Seleccione una marca</option>
                        </select>
                    </div>
                </div>

                <div class="row input-field col s12 m6">
                    <div class="container-fluid">
                        <i class="material-icons prefix">palette</i>
                        <label style="
                padding-right: 20px !important;
                color: #000 !important;
              ">Color Exterior</label>
                        <select id="colorExterior" name="colorExterior"
                            style="width: 50%; padding-left: 10px !important;">
                            <option value="" selected>Seleccione su opción</option>
                        </select>
                    </div>
                </div>

                <div class="row input-field col s12 m6">
                    <div class="container-fluid">
                        <i class="material-icons prefix">airport_shuttle</i>
                        <label style="
                padding-right: 32px !important;
                color: #000 !important;
              ">Estilo</label>
                        <select id="estilo" name="estilo" style="width: 50%; padding-left: 10px !important;">
                            <option value="" selected>Seleccione su opción</option>
                        </select>
                    </div>
                </div>

                <div class="input-field col s12 m6">
                    <div class="container-fluid">
                        <i class="material-icons prefix">palette</i>
                        <label style="
                padding-right: 20px !important;
                color: #000 !important;
              ">Color Interior</label>
                        <select id="colorInterior" name="colorInterior"
                            style="width: 50%; padding-left: 10px !important;">
                            <option value="" selected>Seleccione su opción</option>
                        </select>
                    </div>
                </div>

                <div class="row input-field col s12 m6">
                    <div class="container-fluid">
                        <i class="material-icons prefix">list</i>
                        <label style="
                padding-right: 20px !important;
                color: #000 !important;
              ">Modelo</label>
                        <select id="modelo" name="modelo" style="width: 50%; padding-left: 10px !important;">
                            <option value="" selected>Seleccione su modelo</option>
                        </select>
                    </div>
                </div>

                <div class="row input-field col s12 m6">
                    <i class="material-icons prefix">build</i>
                    <label for="cilindraje" id="labelcilindraje" style="color: #000 !important;">Cilindraje</label>
                    <input type="number" min="1" max="10000000" id="cilindraje" name="cilindraje" />
                </div>

                <div class="row input-field col s12 m6">
                    <div class="container-fluid">
                        <i class="material-icons prefix">payment</i>
                        <label style="color: #000 !important;">Precio</label>
                    </div>
                    <div class="container" style="margin-right: 40px;">
                        <div class="container" id="slider"></div>
                        <div class="row">
                            <div class="col s9 m9">
                                <p id="s1"><strong></strong>100000</p>
                            </div>
                            <input type="hidden" name="rango_precio" id="rango_precio" value="">
                            <div class="col s3 m3">
                                <p id="s2"><strong></strong>100000000</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row input-field col s12 m6">
                    <div class="container-fluid">
                        <i class="material-icons prefix">date_range</i>
                        <label style="color: #000 !important;">Año</label>
                    </div>
                    <div class="container" style=" margin-right: 10px !important;">
                        <div class="container" id="sliderDos"></div>
                        <div class="row">
                            <div class="col s9 m9">
                                <p style="padding-left: 25px;" id="sa1"><strong></strong>1960</p>
                            </div>
                            <input type="hidden" name="rango_ano" id="rango_ano" value="">
                            <div class="col s3 m3">
                                <p id="sa2"><strong></strong>2020</p>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <div class="row">

                <div class="col s12 m6" style="margin-top: 5px;">
                    <div class="col s4 m4">
                        <i class="material-icons">rowing</i>
                        <label style="color: #000 !important;">Transmisión</label>
                    </div>
                    <div class="row container-fluid col s8 m8">
                        <div class="container col s6 m6">
                            <label>
                                <input type="radio" class="with-gap" name="transmision" id="automatico"
                                    value="automatico" />
                                <span style="color: #000 !important;">Automática</span>
                            </label>
                        </div>
                        <div class="container col s6 m6">
                            <label>
                                <input type="radio" class="with-gap" name="transmision" id="manual" value="manual" />
                                <span style="color: #000 !important;">Manual</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6">
                    <div class="col s4 m4">
                        <i class="material-icons">local_gas_station</i>
                        <label style="color: #000 !important;">Combustible</label>
                    </div>
                    <div class="row container-fluid col s8 m8">
                        <div class="container col s4 m4">
                            <label>
                                <input type="radio" class="with-gap" name="combustible" id="hibrido" value="hibrido" />
                                <span style="color: #000 !important;">Híbrido</span>
                            </label>
                        </div>
                        <div class="container col s5 m5">
                            <label>
                                <input type="radio" class="with-gap" name="combustible" id="gasolina"
                                    value="gasolina" />
                                <span style="color: #000 !important;">Gasolina</span>
                            </label>
                        </div>
                        <div class="container col s4 m4">
                            <label>
                                <input type="radio" class="with-gap" name="combustible" id="diesel" value="diesel" />
                                <span style="color: #000 !important;">Diesel</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6">
                    <hr>
                    <div class="col s4 m4">
                        <i class="material-icons">sensor_door</i>
                        <label style="color: #000 !important;">Puertas</label>
                    </div>
                    <div class="row container-fluid col s8 m8">
                        <div class="container col s6 m6">
                            <label>
                                <input type="radio" class="with-gap" name="puertas" id="2-3" value="2-3" />
                                <span style="color: #000 !important;">2 a 3</span>
                            </label>
                        </div>
                        <div class="container col s6 m6">
                            <label>
                                <input type="radio" class="with-gap" name="puertas" id="4-10" value="4-10" />
                                <span style="color: #000 !important;">4 o más</span>
                            </label>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6">
                    <hr>
                    <div class="col s4 m4">
                        <i class="material-icons">view_module</i>
                        <label style="color: #000 !important;">Ordenar</label>
                    </div>
                    <div class="row container-fluid col s8 m8">
                        <div class="container col s2 m6">
                            <label>
                                <input type="radio" class="with-gap" name="ordenar" id="ano" value="ano" />
                                <span style="color: #000 !important;">Año</span>
                            </label>
                        </div>
                        <div class="container col s6 m6">
                            <label>
                                <input type="radio" class="with-gap" name="ordenar" id="precio" value="precio" />
                                <span style="color: #000 !important;">Precio</span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <br />
            <button class="btn waves-effect waves-light right" style="background-color: #000; margin-bottom: 20px"
                type="submit">
                BUSCAR <i class="material-icons right">search</i>
            </button>

            <button class="btn waves-effect waves-light left cyan" style="background-color: #000; margin-bottom: 20px"
                type="button" id="limpiar">
                LIMPIAR <i class="material-icons right">autorenew</i>
            </button>
        </form>
    </div>

</div>

@foreach ($marcas as $m)
<input type="hidden" value='{{ json_encode($m) }}' class="marca" name="marca[]">
@endforeach

@foreach ($estilos as $m)
<input type="hidden" value='{{ json_encode($m) }}' class="estilo" name="estilo[]">
@endforeach

@foreach ($colorExteriores as $m)
<input type="hidden" value='{{ json_encode($m) }}' class="colorExterior" name="colorExterior[]">
@endforeach

@foreach ($colorInteriores as $m)
<input type="hidden" value='{{ json_encode($m) }}' class="colorInterior" name="colorInterior[]">
@endforeach





<script>
    var slider = document.getElementById("slider");

  slider.onmouseover = function (event) {
    hilo = setInterval(() => {
      $('#s1').text((slider.noUiSlider.get()[0]).substring(0, slider.noUiSlider.get()[0].length-3));
      $('#s2').text((slider.noUiSlider.get()[1]).substring(0, slider.noUiSlider.get()[1].length-3));

      $("#rango_precio").val(JSON.stringify({
        p1 : (slider.noUiSlider.get()[0]).substring(0, slider.noUiSlider.get()[0].length-3),
        p2 : (slider.noUiSlider.get()[1]).substring(0, slider.noUiSlider.get()[1].length-3)
      }));

    }, 20);
  };

  slider.onmouseout = function (event) {
    clearInterval(hilo);
  };

  noUiSlider.create(slider, {
    start: [100000, 100000000],
    step: 100000,
    connect: true,
    range: {
      min: 100000,
      max: 100000000,
    },
  });
  // -----------------------------

  var sliderDos = document.getElementById("sliderDos");

  sliderDos.onmouseover = function (event) {
    hilo = setInterval(() => {
      $('#sa1').text((sliderDos.noUiSlider.get()[0]).substring(0, 4));
      $('#sa2').text((sliderDos.noUiSlider.get()[1]).substring(0, 4));

      $("#rango_ano").val(JSON.stringify({
        ai1 : (sliderDos.noUiSlider.get()[0]).substring(0, 4),
        af2 : (sliderDos.noUiSlider.get()[1]).substring(0, 4)
      }));

    }, 20); 
    
  };

  sliderDos.onmouseout = function (event) {
    clearInterval(hilo);
  };

  noUiSlider.create(sliderDos, {
    start: [1960, new Date().getFullYear()],
    step: 1,
    connect: true,
    range: {
      min: 1960,
      max: new Date().getFullYear(),
    },
  });

  $('#marca').change(function (e) { 
              e.preventDefault();
            if ($(this).val()!='') {
                $.ajax({
                type: "get",
                url: "http://localhost:8000/modelos/"+$(this).val().substring(0,$(this).val().indexOf("/")),
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
                  data: modelos,
                    dropdownParent: $("#modal1")
                });
                }
              });
            }else{
                $("#modelo").empty();
                var newOption = new Option('Seleccione su modelo','', true, true);
                $('#modelo').append(newOption).trigger('change'); 
            }  
            });

            $('#limpiar').click(function (e) { 
                e.preventDefault();
                $('#marca').val("").trigger('change.select2');
                $('#modelo').val("").trigger('change.select2');
                $('#estilo').val("").trigger('change.select2');
                $('#colorExterior').val("").trigger('change.select2');
                $('#colorInterior').val("").trigger('change.select2'); 
                $('#cilindraje').val(""); 

                var slider = document.getElementById("slider");
                slider.noUiSlider.set([100000,100000000]);  

                $('#s1').text((slider.noUiSlider.get()[0]).substring(0, slider.noUiSlider.get()[0].length-3));
                $('#s2').text((slider.noUiSlider.get()[1]).substring(0, slider.noUiSlider.get()[1].length-3));

                $("#rango_precio").val(JSON.stringify({
                p1 : (slider.noUiSlider.get()[0]).substring(0, slider.noUiSlider.get()[0].length-3),
                p2 : (slider.noUiSlider.get()[1]).substring(0, slider.noUiSlider.get()[1].length-3)
                }));     
                
                var sliderDos = document.getElementById("sliderDos");
                sliderDos.noUiSlider.set([1940,2020]);  

                $('#sa1').text((sliderDos.noUiSlider.get()[0]).substring(0, 4));
                $('#sa2').text((sliderDos.noUiSlider.get()[1]).substring(0, 4));

                  $("#rango_ano").val(JSON.stringify({
                   ai1 : (sliderDos.noUiSlider.get()[0]).substring(0, 4),
                   af2 : (sliderDos.noUiSlider.get()[1]).substring(0, 4)
                }));

                document.querySelectorAll('[name=transmision]').forEach((x) => x.checked = false);
                document.querySelectorAll('[name=ordenar]').forEach((x) => x.checked = false);
                document.querySelectorAll('[name=puertas]').forEach((x) => x.checked = false);
                document.querySelectorAll('[name=combustible]').forEach((x) => x.checked = false);
            });
</script>