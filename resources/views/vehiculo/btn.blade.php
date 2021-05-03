<div class="right-sidebar">
  <ul class="collection right-align">
    @if (Cookie::get('usuario')!== null)
    <button class="boton tooltipped btn-large " id="fav" data-position="top" data-tooltip="Favorito"
      veh_id="{{ $carro['id'] }}" ven_id="{{ json_decode(Cookie::get('usuario'),true)['id'] }}" value="1" id="id1">
      <i class="large material-icons">favorite</i>
    </button>
    @endif
    <a class="btn-large " id="idw" href="https://api.whatsapp.com/send?phone=506{{$usuario['telefono']}}&text=¡Buenas estoy interesado en este vehiculo!,
      Marca: {{$carro['marcaId']}}, Modelo: {{$carro['modeloId']}}, Año: {{$carro->ano}}, Precio: {{$carro->precio}}">
      <i class="fab fa-whatsapp"></i>
    </a>
    <a class=" btn-large" id="idface"
      href="https://www.facebook.com/sharer/sharer.php?kid_directed_site=0&sdk=joey&u={{ url()->full() }}&display=popup&ref=plugin&src=share_button"
      target="_blank">
      <i class="fab fa-facebook-f"></i>
    </a>

    <a class="waves-effect waves-light btn btn-large modal-trigger " id="idcorreo" href="#correo">
      <i class="fas fa-envelope"></i>
    </a>



    <a class=" btn-large tooltipped" id="idpdf" href="{{ route('imprimir',$carro['id']) }}" data-position="down"
      data-tooltip="Ficha Técnica">
      <i class="far fa-file-pdf"></i>
    </a>
  </ul>
</div>



<div class="fixed-action-btn">


</div>


<!-- Modal Structure -->
<div id="correo" class="modal">
  <a class="btn white-text  red centered modal-close waves-effect waves-green btn-flat right">
    <i class="material-icons  center">close</i></a>
  <div class="modal-content">
    <div class="center-align">
      <h5>Contactar al Vendedor</h5>
    </div>
    <hr>
    <form action="{{ route('contact') }}" method="POST">

      {{ csrf_field() }}

      <div class="row">
        <input type="hidden" name="url" id="" value="{{ url()->full() }}">
        <input type="hidden" name="destinatario" value="{{ $usuario['correo'] }}">
        @if (Cookie::get('usuario')==null)
        <input type="hidden" name="action" id="" value="externo">
        <div class="input-field col s6 m6">
          <i class="material-icons prefix">person</i>
          <label for="nombre">Nombre</label>
          <input type="text" id="nombre" required name="nombre" value="">
        </div>
        <div class="input-field col s6 m6">
          <i class="material-icons prefix">phone</i>
          <label for="telefono">Número</label>
          <input type="text"  id="telefono" required name="telefono" value="">
        </div>
        <div class="input-field col s6 m12">
          <i class="material-icons prefix">email</i>
          <label for="email">Correo</label>
          <input type="email" id="email" required name="correo" value="">
        </div>
        @else
        <input type="hidden" name="action" id="" value="local">
        @endif
        <div class="input-field col s6 m12">
          <i class="material-icons prefix">title</i>
          <label for="asunto">Asunto</label>
          <input type="text" name="asunto" id="asunto" class="validate" required>
        </div>
        <div class="input-field col s6 m12">
          <i class="material-icons prefix">article</i>
          <label for="mensaje">Mensaje</label>
          <textarea id="mensaje" name="mensaje" class="materialize-textarea"></textarea>
        </div>
        <button class="btn waves-effect waves-light right" type="submit">
          ENVIAR <i class="material-icons right">send</i></button>

      </div>
      <!--FIN ROW  -->
    </form>
  </div>
  <!--FIN MODAL  -->
</div>
<!--FIN-->

<script>
  $(document).ready(function () {
    consultaInit();
    $('.modal').modal();
  });
    $(document).on('click', '.boton', function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "/deseado/controlador",
      data:{    
      "_token": "{{ csrf_token() }}", 
      "vehiculo_id":($(this).attr("veh_id")),
      "vendedor_id":($(this).attr("ven_id"))
       },
      dataType: "JSON",
       success: function (response) {
        console.log(response);
      
        if(response.resp==true){
          M.toast({html: '¡Agregado a mis favoritos!',
          classes: 'rounded'})
          $(".boton").css("background-color", "red");
          $('.boton').addClass('pulse');
        }else{
          M.toast({html: '¡Quitado de mis favoritos!',
          classes: 'rounded'})
            $(".boton").css("background-color", "#78909c"); 
            $('.boton').removeClass('pulse');
            
            }
    }
    });
 
  });

    $(document).ready(function(){
      $('.tooltipped').tooltip();
    $('.fixed-action-btn').floatingActionButton();
  }); 

  function consultaInit(){
    $.ajax({
      type: "GET",
      url: "/deseado/init/"+$('.boton').attr("veh_id")+"/"+$('.boton').attr("ven_id"),
  
      dataType: "JSON",
       success: function (response) {
         console.log(JSON.parse(response));
        if(!response){
            $(".boton").css("background-color", "#78909c");
            $('.boton').removeClass('pulse');
        }else{
            $(".boton").css("background-color", "red");  
            $('.boton').addClass('pulse');   
        }
    }
    });
  }

 
</script>