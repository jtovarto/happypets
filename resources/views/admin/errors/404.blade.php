@extends('admin.main')
@section('content')
<div class="middle-box text-center animated fadeInDown">
    <h1>404</h1>
    <h3 class="font-bold">Page Not Found</h3>

    <div class="error-desc">
      Disculpe, pero la página a la que está tratando de accesar no se ha encontrado. Verifique la URL y refresque su navegador o trate de encontrar ingresar una nueva URL.
      <p class="m-t-md"><a href="{{ url()->previous() }}"><i class="fa fa-arrow-circle-left m-r-xs"></i>Regresar</a></p>
    </div>


</div>
@endsection