
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>PDF</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  </head>
  <body>
       <header class="clearfix">
        <h2 class="name">CrAutos</h2>
        <div>Costa Rica, Limon,Siquirres</div>
        <div>(506) 8519-0450</div>
        <div><a href="mailto:company@example.com">company@example.com</a></div>
        <br>
    </header>
<style>
  table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}
td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
       <div class="container" style="width: 100%">
        <h1>Ficha técnica</h1>
      <div class="container" style="padding-top:40px; width: 100%">
      <table>
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
        </tbody>
      </table>
      </div>
      <hr>
      <h5 style="width: 100%; background-color: #0087C3; color: white">Carro:</h5>
      <br>
    
      <img src="{{ '../public/storage/carroperfil/'.trim($carro['imgPrincipal'])  }}" width="600px" height="500px" alt="">
      <br>
      <hr>
      <h5 style="width: 100%; background-color: #0087C3; color: white"">Galería</h5>
      <br>
      @foreach ($galeria as $item)
      <img src="../public/storage/galeria/{{$item['url']}}" width="500px" height="350px" alt="">
      <br>
      @endforeach
      <footer>Informacion generada por compañia CrAutos</footer>

     <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
     
  </body>
</html>

<style>

.clearfix:after {
  content: "";
  display: table;
  clear: both;
}

body {
  position: relative;
  width: 100%;  
  margin: 0 auto; 
  color: #555555;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 14px; 
  font-family: SourceSansPro;
}

header {
  padding: 10px 0;
  margin-bottom: 20px;
  border-bottom: 1px solid #AAAAAA;
  text-align:right;
}

#client {
  padding-left: 6px;
  border-left: 6px solid #0087C3;
  float: left;
}

h2.name {
  font-size: 1.4em;
  font-weight: normal;
  margin: 0;
}

table th,
table td {
  padding: 10px;
  background: #EEEEEE;
  text-align: center;
  border-bottom: 1px solid #FFFFFF;
}

table .id {
  color: #FFFFFF;
  font-size: 1.6em;
  background: #57B223;
}

footer {
  color: #777777;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  text-align: center;
}

</style>