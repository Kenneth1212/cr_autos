<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  @yield('metatoken')
  <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
  <!-- Compiled and minified CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/bootstrap-grid.css') }}">
  <link rel="stylesheet" href="{{ asset('css/degradado.css') }}">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.15/css/jquery.dataTables.min.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.13.0/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
  <link rel="stylesheet" href="{{ asset('css/btn.css') }}">
  <link rel="stylesheet" href="{{ asset('css/dropzone.css') }}">
  <link rel="stylesheet" href="{{ asset('css/alertas.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.2/animate.min.css">
  <link rel="stylesheet" href="{{ asset('css/load.css') }}">
  <link rel="stylesheet" href="{{ asset('css/nouislider.css') }}">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  
  <link rel="stylesheet" href="{{ asset('css/lightgallery.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">
  <link href="https://cdn.jsdelivr.net/lightgallery/1.3.9/css/lightgallery.min.css" rel="stylesheet">

  @yield('css')
  <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
  <script src="{{ asset('js/nouislider.js') }}"></script>
  
  <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>
  
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  <script src="{{ asset('js/main.js') }}"></script>
  @yield('scripts')
  <title>Document</title>
</head>

<body>
  <div class="center section" id="precarga">

    <div class="container">
      <div class="row">
        <div class="col s12">
          <span>Cargando</span>
        </div>
      </div>
      <div class="row">

      </div>
      <div class="row">
        <div class="col s12" style="">

          <div class="loading"></div>

        </div>
      </div>
    </div>
  </div>

  <div class="container-fluid ">
    <nav class=" blue-grey darken-4 ">
      <div class="nav-wrapper container">
        <a href="{{ route('index') }}" class="brand-logo center">CRAutos</a>
        <ul id="nav-mobile" class="right hide-on-med-and-down center">
          <li><a href="{{ route('index') }}">INICIO</a></li>
          <li><a href="{{ route('autos.index') }}">AUTOS NUEVOS</a></li>

        </ul>
      </div>
    </nav>
    <div class="container">

      <a href="#" style="position: absolute; margin-top: -50px; " data-target="slide-out"
        class="sidenav-trigger btn-floating pulse"><i class="material-icons">person</i></a>
    </div>

    <ul id="slide-out" class="sidenav">
      @if (Cookie::get('usuario')!== null)
      <li>
        <div class="user-view">
          <div class="background">
            <img src="{{ asset('img/portada.jpg') }}" width="100%">
          </div>

          <a href="#user" class=""><img class="circle"
              src="{{ json_decode(Cookie::get('usuario'),true)['avatar']!=''?asset('storage').'/'.json_decode(Cookie::get('usuario'),true)['avatar']: asset('img/userlaravel.png') }}"></a>
          <a href="#name" class="collection-item"><span
              class="name">{{ json_decode(Cookie::get('usuario'),true)['nombre'] }}</span></a>
          <a href="#email"><span class="email">{{ json_decode(Cookie::get('usuario'),true)['correo'] }}</span></a>
        </div>
      </li>
      @else
      <li>
        <div class="user-view" style="height: 80px">
          <div class="background">
            <img src="{{ asset('img/portada.jpg') }}" width="100%" height="80px">
          </div>
        </div>
      </li>
      @endif




      @if (Cookie::get('usuario')!== null)
      <li><a href="{{ route('user.edit') }}"><i class="material-icons">mode_edit</i>Mi Perfil</a></li>
      <li><a href="{{ route('deseados') }}"><i
            class="material-icons">turned_in</i>Deseados</a></li>
      <li><a href="{{ route('publicaciones') }}"><i class="material-icons">time_to_leave</i>Publicaciones</a></li>
      <li>
        <div class="divider"></div>
      </li>
      <li><a href="{{ route('logout') }}"><i class="material-icons">transfer_within_a_station</i>Salir</a></li>

      @else
      <li><a href="{{ route('social.auth','google') }}"><i class="material-icons">login</i>Ingresar o Registrarse</a>
      </li>
      @endif

    </ul>
  </div>

  <section >
    @yield('cuerpo')

  </section>
</body>


<footer class="page-footer blue-grey darken-4">
  <div class="container">
    <div class="row">
      <div class="col l6 s12">
        <h5 class="white-text">Proyecto Final CR Autos</h5>
        <p class="grey-text text-lighten-4">Universidad de Costa Rica</p>
      </div>
      <div class="col l4 offset-l2 s12">
        <h5 class="white-text">Estudiantes</h5>
        <ul>
          <li>
            <h6 class="grey-text text-lighten-3">Tatiana Mendoza</h6>
          </li>
          <li>
            <h6 class="grey-text text-lighten-3">Kenneth Aguilar</h6>
          </li>
          <li>
            <h6 class="grey-text text-lighten-3">Frander Rosales</h6>
          </li>
          <li>
            <h6 class="grey-text text-lighten-3">Jesús Fonseca</h6>
          </li>
        </ul>
      </div>
    </div>
  </div>
  <div class="footer-copyright">
    <div class="container">
      © 2020 Derechos Reservados

    </div>
  </div>
</footer>
</footer>

<script>
  window.addEventListener('load', () => {
    document.getElementById('precarga').className = 'hide';
    //document.getElementById('pagina').className = 'animated fadeIn';
});
  $(document).ready(function(){
    $('#lightgallery').lightGallery();
    $(".modal").modal();
        $('#table_cars').DataTable({
      "language": {
      "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
    },
    "aaSorting": []
    });
    $('.sidenav').sidenav();
  });

  
</script>
<style>::-webkit-scrollbar{
  width: 10px;
  background-color: #F5F5F5;
}
::-webkit-scrollbar-track{
  -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
  background-color: #F5F5F5;
}
::-webkit-scrollbar-thumb{
  background-color: #00897b; 
  background-image: -webkit-linear-gradient(90deg,rgba(255, 255, 255, .2) 25%,transparent 25%,transparent 50%,rgba(255, 255, 255, .2) 50%,rgba(255, 255, 255, .2) 75%,transparent 75%,transparent)
}</style>

</html>