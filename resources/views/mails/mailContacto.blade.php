<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Happy Pets at Home</title>
        
        <link rel="stylesheet" href="{{ asset('font/custom-font.css') }}">                
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">        
        <link rel="stylesheet" href="{{ asset('font/fontawesome/css/all.min.css') }}">        
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
        
    </head>

    <body style="background-image: url({{asset('img/bg-p.png')}})" >
        <div style=" margin: 0 auto ; width: 70%; border:1px solid rgb(150,150,150); border-radius: 10px; background-color: white; padding: 75px;" >
            <div class="row">
                
            
             <table style="width: 100%;"> <!-- Lo cambiaremos por CSS -->
               <tr>
                  <td colspan="3"><img src="{{asset('img/logos/logo.png')}}" style="width: 200px;"></td>
                  <td colspan="4"><h2 style="padding:15px; text-align: center;">Correo enviado desde Formulario de contacto</h2></td>
              </tr>
              <tr >
                  <td style="border-bottom: 1px solid rgb(150,150,150); padding-top: 20px;" colspan="7"></td>          
              </tr>
              <tr>        
                <td colspan="7" style="padding-top:10px; ">
                    <h4>Atencion</h4>
                    <p style="text-transform: uppercase"> Departamento - {{$mail->departamento}}</p>
                </td>
              </tr>
              <tr>
                <td colspan="3">
                    <h5>Nombre y Apellido:</h5>
                </td>
                <td colspan="2">
                    <h5>Compañía:</h5>
                </td>        
                <td>
                    <h5>Email:</h5>
                </td>
                <td>
                    <h5>Teléfono:</h5>
                </td>
              </tr>
              <tr>
                <td colspan="3">
                    <p>{{$mail->nombre}} {{$mail->apellido}}</p>
                </td>
                <td colspan="2">
                    <p>{{$mail->compania}}</p>
                </td>        
                <td>
                    <p>{{$mail->email}}</p>
                </td>
                <td>
                    <p>{{$mail->telefono}}</p>
                </td>
              </tr>
              <tr>
                  <td colspan="7"><h5>Mensaje:</h5></td>          
              </tr>
              <tr >
                  <td style="border-bottom:1px solid rgb(150,150,150);" colspan="7"></td>          
              </tr>
              <tr>
                  <td class="" colspan="7"  disabled="true">
                      <textarea rows="10" style="width: 100%;margin-top: 10px;  padding: 10px 20px; background-color: white; border:none;" readonly disabled>{{$mail->mensaje}}</textarea>
                  </td>
              </tr>      
            </table>
        </div></div>
    </body>    
</html>