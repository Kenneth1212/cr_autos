@extends('plantilla')
@section('cuerpo')
<div class="container-fluid white">
    <div class="container">
        <div class="fixed-action-btn">
            <a class="tooltipped btn-floating btn-large red pulse " data-position="left" data-tooltip="Insertar vehículo"
                href="{{ route('vehiculo.create') }}">
                <i class="large material-icons">add</i>
            </a>
        </div>
    
    
        <div class="row p-2">
        <blockquote class="flow-text">Mis publicaciones</blockquote>

            <table id="table_cars" class=" centered ">
                <thead>
                    <tr>
                        <th>Vehículos</th>
                    </tr>
                </thead>
                <tbody id="tboby">
    
                    @foreach ($lista as $carro)
                    @if ($carro['vendedorId']==json_decode(Cookie::get('usuario'),true)['id'])
                    <tr style="250px !important">
                        <td>
                            <div class="row"  style="border-bottom: 5px solid #006064   ;">
                                <div class="col s12 m6">
                                    <div class="">
                                        <div class="card-image">
                                            <a href="{{ route('vehiculo.show',$carro['id']) }}">
                                                <img src="{{ $carro!=null?($carro['imgPrincipal']!=null?asset('storage').'/carroperfil/'.$carro['imgPrincipal']:asset('img/carro.png')):asset('img/carro.png') }}"
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
                                                        <td><i class="material-icons ">directions_cars</i>Marca:
                                                            {{ $carro['marcaId'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="material-icons">star_rate</i> Modelo:
                                                            {{ $carro['modeloId'] }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td><i class="material-icons">calendar_today</i> Año:
                                                            {{ $carro['ano'] }}</td>
                                                    </tr>
    
                                                    <tr>
                                                        <td><i class="material-icons">credit_card</i> Precio:
                                                            {{ $carro['precio'] }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="card-action p-5">
    
                                            <form action="{{ route('vehiculo.destroy',$carro['id']) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
    
                                                <a class=" btn waves-effect waves-light light-blue accent-3"
                                                    href="{{ route('vehiculo.show',$carro['id']) }}" type="submit">
                                                    Ver<i class="material-icons left">visibility</i></a>
    
                                                @if (Cookie::get('usuario')!== null)
                                                @if (json_decode(Cookie::get('usuario'),true)['id']==$carro['vendedorId'])
    
                                                <a class="btn waves-effect waves-light light-green accent-4"
                                                    href="{{ route('vehiculo.edit',$carro['id']  ) }}" type="submit">
                                                    Editar<i class="material-icons left">edit</i></a>
    
                                                <a class="vendido btn waves-effect waves-light {{ $carro['vendido']==0?'grey darken-3':'deep-orange accent-3' }}"
                                                    idcarro="{{ $carro['id'] }}" id="id{{ $carro['id'] }}">
                                                    <span id="sp{{ $carro['id'] }}">
                                                        {{  $carro['vendido']==0?'No vendido':'Vendido'}}</span><i
                                                        class="material-icons left">star_rate</i></a>
                                                <button class="btn waves-effect waves-light red">
                                                    Eliminar<i class="material-icons left">delete</i></button>
                                            </form>
    
                                            @endif
                                            @endif
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
<script>
    $(document).ready(function(){
    $('.tooltipped').tooltip();
  });

    $(document).on('click', '.vendido', function (e) {
    e.preventDefault();
    $.ajax({
      type: "POST",
      url: "/publicaciones/update",
      data:{    
      "_token": "{{ csrf_token() }}", 
      "id":($(this).attr("idcarro")) 
       },
      dataType: "JSON",
       success: function (response) {
        console.log(response);
        if(response.flag==true){
          M.toast({html: '¡Vendido!',
          classes: 'rounded'})
          $('#id'+response.id).removeClass('grey darken-3');
            $('#id'+response.id).css("background-color", "#ff3d00"); 
            $('#sp'+response.id).text('Vendido');  
        }else{
          M.toast({html: '¡Volver a vender!',
          classes: 'rounded'})
          $('#id'+response.id).removeClass('deep-orange accent-3');
            $('#id'+response.id).css("background-color", "#424242");
            $('#sp'+response.id).text('No vendido'); 
            }
    }
    });
  });

  

</script>
@endsection