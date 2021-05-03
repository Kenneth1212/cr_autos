
<div class="container-fluid centered p-2">
    <ul id="tabs-swipe-demo" class="tabs">
        <li class="tab col s3"><a class="{{ Request::is('user') ? 'blue lighten-5' : null  }} blue-text" href="{{ route('user.edit') }}">Perfil</a></li>
        <li class="tab col s3"><a href="#deseado" class="{{ Request::is('deseado') ? 'blue lighten-5' : null  }} blue-text">Deseado</a></li>
        <li class="tab col s3"><a href="#deseados " class="{{ Request::is('publicaciones') ? 'blue lighten-5' : null  }} blue-text">Publicaciones</a></li>
    </ul>
</div>


