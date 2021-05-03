@extends('plantilla')
@section('cuerpo')
<div class="container-fluid white">
    <div class="container">
        @if (session('notificacion'))
        <div class="materialert success" id="alert_box">
            <div class="material-icons">check</div>
            {{ session('notificacion') }}
            <button type="button" class="close-alert" id="alert_close">×</button>
        </div>
    </div>
    @endif
    </div>
    <div class="section container">
    
        <div class="card">
            <div class="card-content centered ">
                <blockquote class="flow-text p-2    grey-text text-darken-4 activator  ">Información del Perfil<i
                        class="material-icons right">delete </i></blockquote>
    
                <form action="{{ route('user.update')}}" method="POST" class="" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="id" value="{{ json_decode(Cookie::get('usuario'),true)['id'] }}">
                    <input type="hidden" name="avatar_actual"
                        value="{{ json_decode(Cookie::get('usuario'),true)['avatar'] }}">
                    <div class="row valign-wrapper ">
                        <div class="col s12 m6 center   ">
    
                            <img class="" width="400px" height="400px"
                                src="{{ json_decode(Cookie::get('usuario'),true)['avatar']!=''?asset('storage').'/'.json_decode(Cookie::get('usuario'),true)['avatar']:asset('img/userlaravel.png') }}"
                                alt="Imagen de usuario">
                            <div class="file-field input-field">
                                <div class="btn">
                                    <span>Cambiar foto</span>
                                    <input type="file" name="avatar">
                                </div>
                                <div class="file-path-wrapper">
                                    <input class="file-path validate" type="text">
                                </div>
                            </div>
                        </div>
    
                        <div class="col s12 m12 l8">
                            <div class="input-field col s12 m12">
                                <i class="material-icons prefix">account_circle</i>
                                <label for="nombre">Nombre</label>
                                <input type="text" name="nombre" id="nombre" class="validate"
                                    value="{{json_decode(Cookie::get('usuario'),true)['nombre'] }}" required>
                            </div>
                            <div class="input-field col s12 m12">
                                <i class="material-icons prefix">phone</i>
                                <label for="telefono">Telefono</label>
                                <input type="text" name="telefono" id="telefono"
                                    value="{{json_decode(Cookie::get('usuario'),true)['telefono'] }}" class="validate"
                                    required>
                            </div>
                            <div class="input-field col s12 m12">
                                <i class="material-icons prefix">location_on</i>
                                <label for="direccion">Dirección</label>
                                <input type="text" name="direccion" id="direccion"
                                    value="{{json_decode(Cookie::get('usuario'),true)['direccion'] }}" class="validate"
                                    required>
                            </div>
                            <div class="right-align">
                                <button class="btn-large waves-effect waves-light" type="submit">
                                    Actualizar<i class="material-icons right">send</i></button>
                            </div>
    
                        </div>
    
                    </div>
                </form>
    
            </div>
    
    
            <div class="card-reveal">
                <span class="card-title grey-text text-darken-4">Información<i class="material-icons right">close</i></span>
                <p>Podrá cambiar la información de su cuenta de <Strong>CR Autos</Strong></p>
                <hr>
                <blockquote>Si desea eliminar esta cuenta, lo podrá hacer presionando este botón:</blockquote>
                <!-- Modal Trigger -->
                <a class="waves-effect waves-light btn modal-trigger red" href="#modal1">ELIMINAR MI CUENTA</a>
    
                <!-- Modal Structure -->
                <div id="modal1" class="modal">
                    <div class="modal-content">
                        <h4>ADVERTENCIA</h4>
                        <blockquote>Si lo hace no habrá vuelta atrás y toda su información será eliminada de la página.
                            <br>¿Desea eliminar su cuenta?</blockquote>
                    </div>
                    <div class="modal-footer">
                        <form action="{{ route('user.destroy') }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <a href="#!" class="modal-close waves-effect waves-green btn-flat cyan white-text ">Cancelar</a>
                            <button class="modal-close waves-effect waves-green btn-flat red white-text ">Eliminar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
</div>
<script>
    $(document).ready(function(){
    $('.tabs').tabs({
        swipeable :true
        }    ); 
  
  });
  
  $('#alert_close').click(function(){
    $( "#alert_box" ).fadeOut( "slow", function() {
    });
  });
  
</script>
@endsection