@extends('main')
@section('body-class','body-bg')
@section('content') 
<style type="text/css">
  input:invalid, textarea:invalid {
  border-color:red;

}
</style>
    <section class="container dark-grey-text my-5">
      <div class="card">
        <div class="card-body">
          
          <div class="container">
            <div class="lemon-normal d-flex justify-content-between align-items-center">
              <div class="col-12 col-md-6 d-flex form-row">                
                <h5 >Nº Orden</h5>
                <div class="input-group mb-2">
                  <input type="text" class="form-control" id="numOrden" placeholder="Ingrese el numero de orden" pattern="[0-9]+" >
                  <div class="input-group-append">
                    <button id="btnNumOrden" class="btn btn-primary" title="Buscar"><i class="fas fa-search"></i></button>
                  </div>                    
                </div>                  
              </div>              
              <div class="col-0 col-md-2 text-right d-none d-sm-block">
                <img src="{{asset('img/logos/logo.png')}}" width="100px" class="img-fluid">   
              </div>  
            </div>
            
           
            <div  id="consultaContainer" class="d-none row border-top my-3 pt-2 ">              

              <div class="col-12 col-md-6 col-xl-2 d-flex flex-row flex-md-column mt-xl-2">

                <p class="lemon-normal carrito-title text-center">Producto</p>
                <div class="w-100 h-100 d-flex flex-column border rounded text-center carrito-box">                  
                    <p id="cantidad" class="my-0 mx-0"></p>
                    <p  class="puppy-text-v lemon-normal my-0 mx-0">Puppy Sorb</p>                  
                </div>

              </div>

              <div class="col-12 col-md-3 col-xl-2 d-flex flex-row flex-md-column mt-2">

                <p class="lemon-normal carrito-title text-left text-xl-center">Estado del pago</p>

                <div class="w-100 h-100 border rounded carrito-box">
                  <p class="text-muted text-xl-center" id="estpago"></p>
                </div>

              </div>

              <div class="col-12 col-md-3 col-xl-2 d-flex flex-row flex-md-column mt-2">

                <p class="lemon-normal carrito-title text-left text-xl-center" >Fecha Pago</p>
                
                <div class="w-100 h-100 border rounded carrito-box">
                  <p class="text-muted text-xl-center" id="fecpago"></p>
                </div>
                
              </div>

              <div class="col-12 col-md-3 col-xl-2 d-flex flex-row flex-md-column mt-2" >

                <p class="lemon-normal carrito-title text-left text-xl-center" >Estado del Envío</p>

                <div class="w-100 h-100 border rounded carrito-box">
                  <p class="text-muted m-auto text-xl-center" id="estenvio"></p>
                </div>

              </div>
              
              <div class="col-12 col-md-3 col-xl-2 d-flex flex-row flex-md-column mt-2 p-xl-0" >
                <p class="lemon-normal carrito-title text-left text-xl-center" >Empresa</p>
                <div class="w-100 h-100 border rounded carrito-box">
                  <p class="text-muted m-auto text-xl-center" id="empresa"></p>
                </div>
              </div>              

              <div class="col-12 col-md-3 col-xl-2 d-flex flex-row flex-md-column mt-2 p-xl-0" >
                <p class="lemon-normal carrito-title text-left text-xl-center" >Nº Guía</p>
                <div class="w-100 h-100 border rounded carrito-box">
                  <p class="text-muted m-auto text-xl-center" id="guia"></p>
                </div>
              </div>

            </div>
            
            
            <hr class="hidde">
            <div class="col-12 hidde">
              <h1 cl>Consulta tu pedido aquí!</h1>              
            </div>
            



            <div class="py-3 border-top d-flex flex-row justify-content-end">              
              <div>
               <button id="searchAgain" class="btn btn-primary btn-rounded disabled"> <i class="fas fa-search right"></i>  Buscar otra véz 
                </button> 
              </div>
               
            </div>
          </div>
        </div>
      </div>
    </section>  
@endsection

@push('css_files')
  <link rel="stylesheet" href="{{ asset('css/toastr.min.css') }}">  
@endpush

@push('scripts_files')
 <!-- Toastr -->
  <script src="{{asset('js/toastr.min.js')}}"></script>
@endpush

@push('scripts') 
  <script>
  
    $('#searchAgain').on('click', function(e){         
      $("#numOrden").prop("disabled",false);
      $("#numOrden").select();
      $("#btnNumOrden").prop("disabled",false);
      $("#searchAgain").addClass("disabled");
    });

    $('#btnNumOrden').on('click', function(e){
        
        var $numOrden = $('#numOrden').val();

        if ($numOrden > 0)    {
        var $url = "{{ route('consultarOrdenAux')}}/" 
        
        $url = $url +  $numOrden;
        
        $.ajax({
            url : $url,
            type: "GET",            
            success: function(data, textStatus, jqXHR)
            {
              $('#consultaContainer').removeClass("d-none")
              $('#consultaContainer').addClass("d-flex")
              $('#cantidad').text(data.cantidad + " und");
              $('#empresa').text(data.empresa);
              $('#estpago').text(data.estpago);
              $('#fecpago').text(data.fecpago);
              $('#estenvio').text(data.estenvio);
              $('#guia').text(data.guia);              
              
              $("#numOrden").prop("disabled",true);
              $("#btnNumOrden").prop("disabled",true);
              $("#searchAgain").removeClass("disabled");             
              $(".hidde").hide();               

              
            },
            error: function (jqXHR, textStatus, errorThrown)
            {              
              $('#mensaje').text("El número de orden no se encuentra registrado");
            }
        });
   


        }
   });
  </script>
@endpush
