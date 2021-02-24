@extends('main')
@section('body-class','body-bg')
@section('content')  
    <section class="container dark-grey-text my-5">
      <div class="card">
        <div class="card-body">
          
          <div class="container">
            <div class="lemon-normal d-flex justify-content-between align-items-center">
              <div class="col-12 col-md-8 d-flex">
                <i class="fas fa-shopping-cart fa-2x"></i>
                <h4 class="ml-3">Carrito de Compras</h4>
              </div>              
              <div  class="col-0 col-md-4 text-right d-none d-sm-block">
                <img src="{{asset('img/logos/logo.png')}}" width="100px" class="img-fluid">   
              </div>  
            </div>
            
            @forelse (Cart::instance('shopping')->content() as $item)
            <div class="row border-top my-3 pt-2 ">              

              <div class="col-12 col-md-6 col-xl-3 d-flex flex-row flex-md-column mt-xl-2">

                <p class="lemon-normal carrito-title text-left text-xl-center">Producto</p>

                <div class="w-100 h-100 d-flex flex-row  border rounded carrito-box">
                    <div>
                  <img src="{{ asset('img/products/puppy-sorb.png') }}" alt="" class="img-fluid text-center d-none d-sm-inline ml-3 ml-xl-2" width="50px"  >
                  </div>
                  <div class="text-left mt-sm-2 ml-1">
                    <p class="puppy-text-v lemon-normal my-0 mx-0">{{$item->name}}</p>
                    <p class="text-muted my-0 mx-0">Happy Pets at Home</p>  
                  </div>
                </div>

              </div>


              <div class="col-12 col-md-6 col-xl-2 d-flex flex-row flex-md-column mt-2 mt-md-0 mt-xl-1">

                <p class="lemon-normal carrito-title text-left text-xl-center">Descripción</p>

                <div class="w-100 h-100 border rounded carrito-box">
                  <p class="text-muted px-0 carrito-box">Absorbente de Orine.</p>
                </div>

              </div>


              <div class="col-12 col-md-3 col-xl-2 d-flex flex-row flex-md-column mt-2">

                <p class="lemon-normal carrito-title text-left text-xl-center">Precio</p>

                <div class="w-100 h-100 border rounded carrito-box">
                  <p class="text-muted">COP ${{$item->price(2,',','.')}}</p>
                </div>

              </div>

              <div class="col-12 col-md-3 col-xl-2 d-flex flex-row flex-md-column mt-2">

                <p class="lemon-normal carrito-title text-left text-xl-center" >Cantidad</p>

                <div class="w-100 h-100 d-flex flex-row border rounded carrito-box p-md-2 p-xl-0">                  
                  <input type="number" value="{{$item->qty}}" aria-label="Search" class="form-control mr-1" min=1 name="qty" id="qty" onchange="verificar()" id="qty">
                  <div>
                    <button class="btn btn-success" disabled  id="actualizarItem">
                      <i class="fa fa-redo-alt"></i>
                    </button>
                  </div>                  
                  <input type="hidden" value="{{$item->rowId}}" aria-label="Search" class="form-control" name="rId" id="rId" >
                </div>

              </div>

              <div class="col-12 col-md-3 col-xl-2 d-flex flex-row flex-md-column mt-2" >

                <p class="lemon-normal carrito-title text-left text-xl-center" >Sub-Total</p>

                <div class="w-100 h-100 border rounded carrito-box">
                  <p class="text-muted m-auto" id="subtotal">COP ${{$item->subtotal(2,',','.')}}</p>
                </div>

              </div>

              <div class="col-12 col-md-3 col-xl-1 d-flex flex-row flex-md-column mt-2 p-xl-0" >
                <p class="lemon-normal carrito-title text-left text-xl-center" >Acciones</p>
                <div class="w-100 border rounded carrito-box p-md-2 p-xl-0">
                  <a href="{{route ('removerItem', $item->rowId) }}" class="btn btn-danger removeItem mx-auto"  data-toggle="tooltip" data-placement="top"title="Remover item" >Remover</a>
                </div>
                
              </div>

            </div>
            
            @empty
            <hr>
            <div class="col-12">
              <h1>No hay items dentro del carrito</h1>              
            </div>
            @endforelse



            <div class="py-3 border-top d-flex flex-row justify-content-end">
              <div class="d-flex flex-column flex-md-row text-center mr-auto mr-md-5 ">
                <h5 class="lemon-bold">Total</h5>
                <div class="text-center ml-md-3">                    
                  <h5 class="lemon-normal puppy-text-v" id="total">COP ${{Cart::instance('shopping')->subtotal(2,',','.')}}</h5>
                </div>  
              </div>
              <div>
               <a href="{{route('checkout')}}" class="btn btn-primary  btn-rounded  @if(Cart::instance('shopping')->count()<1) disabled @endif ">  Finalizar Compra <i class="fas fa-angle-right right"></i><i class="fas fa-angle-right right"></i>
                </a> 
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
  
    var $qtyGlobal = parseInt(document.getElementById("qty").value);
    
    function activar_boton($estado){
      document.getElementById("actualizarItem").disabled = $estado; 
    }
    
    function verificar(){
        var $qtyLocal = parseInt(document.getElementById("qty").value);
        if ($qtyGlobal === $qtyLocal) {
            activar_boton(true);
        }else{
            activar_boton(false);
        }
    }


    $('#actualizarItem').on('click', function(e){
        var $qty = $('#qty').val();
        console.log($qty);
        var $rId = $('#rId').val();
        console.log($rId);
        toastr.options = {
          closeButton: true, // true/false                    
          newestOnTop: true, // true/false
          progressBar: true, // true/false                    
          preventDuplicates: true, //true/false
          onclick: null,
          showMethod : "slideDown",
          showDuration: 300, // in milliseconds
          hideMethod: "slideUp",
          hideDuration: 1000, // in milliseconds
          timeOut: 5000, // in milliseconds
          extendedTimeOut: 1000, // in milliseconds
          positionClass: "toast-top-right",
        };
        
        
        var $url = "{{ route('updateItem1') }}/" 
        
        $url = $url + $rId  + "/" + $qty;
        
        $.ajax({
            url : $url,
            type: "GET",            
            success: function(data, textStatus, jqXHR)
            {
              $('#cesta1').text(data.cesta);
              $('#cesta2').text(data.cesta);
              $('#qty').text(data.cesta);
              $('#total').text(data.subtotal);
              $('#subtotal').text(data.subtotal);
              $("#actualizarItem").prop("disabled",true);
              $qtyGlobal = parseInt(data.cesta);
              toastr.success('Artículo ha sido actualizado exitosamente', 'Exito!');            
            },
            error: function (jqXHR, textStatus, errorThrown)
            {              
              toastr.error('No se pudo actualizar el item', 'Problemas de conexión');
            }
        });
    });
  </script>
@endpush
