
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
</head>
<style> 

    @charset "UTF-8";
    @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);
    
    body {
    }
    
    h1 {
      font-size:3em; 
      font-weight: 300;
      line-height:1em;
      text-align: center;
      color: #4DC3FA;
    }
    
    h2 {
      font-size:1em; 
      font-weight: 300;
      text-align: center;
      display: block;
      line-height:1em;
      padding-bottom: 2em;
      color: #FB667A;
    }
    
    h2 a {
      font-weight: 700;
      text-transform: uppercase;
      color: #FB667A;
      text-decoration: none;
    }
    
    .blue { color: #185875; }
    .yellow { color: #FFF842; }
    
    .container th h1 {
          font-weight: bold;
          font-size: 1em;
      text-align: left;
      color: #185875;
    }
    
    .container td {
          font-weight: normal;
          font-size: 1em;
      -webkit-box-shadow: 0 2px 2px -2px #0E1119;
           -moz-box-shadow: 0 2px 2px -2px #0E1119;
                box-shadow: 0 2px 2px -2px #0E1119;
    }
    
    .container {
          text-align: left;
          overflow: hidden;
          width: 80%;
          margin: 0 auto;
      display: table;
      padding: 0 0 8em 0;
    }
    
    .container td, .container th {
          padding-bottom: 2%;
          padding-top: 2%;
      padding-left:2%;  
    }
    
    /* Background-color of the odd rows */
    .container tr:nth-child(odd) {
          background-color: #323C50;
    }
    
    /* Background-color of the even rows */
    .container tr:nth-child(even) {
          background-color: #2C3446;
    }
    
    .container th {
          background-color: #1F2739;
    }
    
    .container td:first-child { color: white; }
    
    .container tr:hover {
       background-color: #464A52;
    -webkit-box-shadow: 0 6px 6px -6px #0E1119;
           -moz-box-shadow: 0 6px 6px -6px #0E1119;
                box-shadow: 0 6px 6px -6px #0E1119;
    }
    
    .container td:hover {
      background-color: #FFF842;
      color: #403E10;
      font-weight: bold;
      
      box-shadow: #7F7C21 -1px 1px, #7F7C21 -2px 2px, #7F7C21 -3px 3px, #7F7C21 -4px 4px, #7F7C21 -5px 5px, #7F7C21 -6px 6px;
      transform: translate3d(6px, -6px, 0);
      
      transition-delay: 0s;
          transition-duration: 0.4s;
          transition-property: all;
      transition-timing-function: line;
    }
    
    @media (max-width: 800px) {
    .container td:nth-child(4),
    .container th:nth-child(4) { display: none; }
    }
    </style>
    
<body style="
font-family: 'Open Sans', sans-serif;
font-weight: 300;
line-height: 1.42em;
color:#A7A1AE;
background-color:#1F2739; padding:20px">
    
<h1><span class="blue"><span class="yellow">CRAutos</span></h1>
    <h2>??Est??n interesados en tu veh??culo!</h2>
    
    <table class="container">
        <thead>
          
        </thead>
        <tbody>
            <tr>
                <td>Solicitante</td>
                <td style="color: white"> {{ $action=='local'?json_decode(Cookie::get('usuario'),true)['nombre']:$nombre    }}</td>
            </tr>
            <tr>
                <td>Numero</td>
                <td style="color: white">{{ $action=='local'?json_decode(Cookie::get('usuario'),true)['telefono']:$telefono }}</td>
            </tr>
            <tr>
                <td>Correo</td>
                <td > <a href="{{ $action=='local'?json_decode(Cookie::get('usuario'),true)['correo']:$correo }}" style="color:white;">{{ $action=='local'?json_decode(Cookie::get('usuario'),true)['correo']:$correo }}</a></td>
            </tr>

            <tr >
                <td >Mensaje</td>
                <td style="color: white" >{{ $mensaje }}</td>
            </tr>
            <tr >
                <td >Asunto</td>
                <td style="color: white" >{{ $asunto }}</td>
            </tr>
            <tr>
                <td colspan="1">Vehiculo Solicitado</td>
                <td colspan="1"><a style="color:white;" href="{{ $url }}">{{ $url }}</a></td>
            </tr>
        </tbody>
    </table>
</body>
</html>