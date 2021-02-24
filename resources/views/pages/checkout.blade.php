  <!--formulario de pago -->
@extends('main')
@section('body-class','body-bg')
@section('title', 'Checkout de compra')
@section('content')
<div class="mt-5"></div>
<div class="container bg-white my-5 px-5" style="box-shadow: 1px 1px 4px rgba(0,0,0,.6">
  <div class="py-3 text-center">
    <img class="d-block mx-auto mb-4" src="{{asset('img/logos/logo.png')}}" alt="logo Happy Pets at Home" width="200" >
    <hr>

  </div>
  @if($errors->has('countArticles'))
  <div class="row">
    <div class="alert alert-danger mx-auto" role="alert">
      Existen problemas con el contenido del carro de compras o está vacío!!
    </div>
  </div>
  @endif
  <div class="row">

  {{-- SUMARIO DE COMPRAS--}}
    <div class="col-md-4 order-md-2 mb-4 ">

      <h4 class="text-center bg-primary text-white py-2 mb-3">Sumario de compra</h4>

      <div class="d-flex d-flex-column d-flex-md-row justify-content-between align-items-center px-2">
        <label>Artículos</label>
        <span class="badge badge-secondary badge-pill"> {{Cart::instance('shopping')->count()}} </span>
      </div>

      <ul class="list-group  mb-3 ">
        @forelse (Cart::instance('shopping')->content() as $item)
        <li class="list-group-item d-flex justify-content-between lh-condensed bg-secondary text-white" >
          <div>
            <h6 class="my-0">{{ $item->name }}</h6>
            <small class="text-muted text-white">{{ $item->options->description }}</small>
          </div>
          <span class="text-white">{{ number_format($item->price,2,',','.') }}</span>
        </li>
        @empty
        <li class="list-group-item d-flex justify-content-center lh-condensed bg-secondary text-white">
          <div>
            <h6 class="my-0">No existen items</h6>
          </div>
        </li>
        @endforelse
        <li class="list-group-item d-flex justify-content-between bg-secondary text-white">
          <strong>Total (COP)</strong>
          <strong>${{ Cart::instance('shopping')->subtotal(2,',','.') }}</strong>
        </li>
      </ul>
      <div class="text-center mt-3">
        <a href="http://www.payulatam.com/co/" target="_blank"><img src="https://ecommerce.payulatam.com/logos/PayU_180x100_Respaldo.png" alt="Con el respaldo de PayU" border="0" /></a>
        <img src="{{ ASSET('img/icos/payupaymethods.jpg') }}" alt="">
      </div>
    </div>

  {{-- DATOS DEL COMPRADOR --}}
    <div class="col-md-8 order-md-1 mb-4">
      <h4 class="mb-3 text-white bg-primary py-2 text-center">Datos del Comprador</h4>
      <form class="needs-validation" method="post" action="https://checkout.payulatam.com/ppp-web-gateway-payu" novalidate="">
        @csrf
        <input type="hidden" name="merchantId" value="{{ $formData['merchantId'] }}">

            <input type="hidden" name="referenceCode" value="{{$formData['referenceCode']}}">
            <input type="hidden" name="description" value="Venta de {{Cart::instance('shopping')->count()}} Puppy Sorb">

            <input type="hidden" name="tax" value="0">

            <input type="hidden" name="extra1" value="{{Cart::instance('shopping')->count()}}">

            <input type="hidden" class="form-control" id="extra3" name="extra3">


            <input type="hidden" name="shippingCountry" value="CO">


            <input type="hidden" name="amount" value={{ $formData['amount']}}>
            <input type="hidden" name="signature" value="{{$formData['signature']}}">
            <input type="hidden" name="currency " value="{{$formData['currency']}}">

            <input name="responseUrl"    type="hidden"  value="{{route('home')}}" >
        <div class="form-row">

        {{-- nombre y apellido --}}
          <div class="col-12 mb-3">
            @input([
              'inputName' =>'buyerFullName',
              'label'=> 'Nombre y apellido',
              'required'=> true,
              'minlength' => 2,
              'maxlength' => 30,
              ])
          </div>

        {{-- email --}}
          <div class="col-12 mb-3">
            @input([
              'inputName' =>'buyerEmail',
              'type' => 'email',
              'label'=> 'Email',
              'required'=> true,
              'minlength' => 5,
              'maxlength' => 50,
              ])
          </div>

        {{-- direccion de facturacion --}}
          <div class="col-12 mb-3">
             @input([
              'inputName' =>'billingAddress',
              'label'=> 'Dirección de Facturación',
              'required'=> true,
              'minlength' => 10,
              'maxlength' => 250,
              ])
          </div>

        {{-- direccion de envio --}}
          <div class="col-12 mb-3">
            <div class="d-flex">
              <label for="shippingAddress">Dirección de envío <span class="text-muted">(Optional)</span>
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" id="same-address"
                  @if(!old('shippingAddress')) checked @endif>

                  <label class="custom-control-label" for="same-address">Usar mi dirección de facturación</label>
                </div>
              </label>
            </div>
            <input type="text" class="form-control validate" id="shippingAddress" name="shippingAddress"
            @if(!old('shippingAddress')) disabled @endif value="{{ old('shippingAddress') }}">
          </div>

        {{-- pais de envio --}}
          <div class="col-12 col-md-6 mb-3">
            <label for="billingCountry">País</label>
            <select class="custom-select d-block w-100 validate" id="billingCountry" name="billingCountry" required>
              <option selected value="CO">COLOMBIA</option>
            </select>
            <div class="invalid-feedback">Selecciona una opción válida.</div>
          </div>

        {{-- ciudad de envio --}}
          <div class="col-12 col-md-6 mb-3">
            @input([
              'inputName' => 'billingCity',
              'label'     => 'Ciudad',
              'required'  => true,
              'minlength' => 3,
              'maxlength' => 25,
              'pattern'   => '[a-zA-Z]+',
              ])
          </div>

        {{-- telefono de contacto --}}
          <div class="col-12 col-md-6 mb-3">
            @input([
              'inputName' => 'telephone',
              'label'     => 'Teléfono',
              'minlength' => '8',
              'required'  => true,
              'pattern'   => '[0-9]+',
              'prepend'   => '+57'
              ])
          </div>

        {{-- telefono movil de contacto --}}
          <div class="col-12 col-md-6 mb-3">
            @input([
              'inputName' => 'mobilePhone',
              'label'     => 'Teléfono de Oficina',
              'minlength' => '8',
              'pattern'   => '[0-9]+',
              'prepend'   => '+57'
              ])
          </div>

        </div>

        <hr class="my-4">

        {{-- Terminos y condiciones --}}
          <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" name="termandcondition" id="termandcondition" required>
            <label class="custom-control-label" for="termandcondition">Acepto los Términos y Condiciones</label>
            <div class="invalid-feedback">Debe aceptar los términos y condiciones.</div>
          </div>



        <hr class="mb-4">

        @if (Cart::instance('shopping')->count() < 1)
          <div class="alert alert-danger text-center" role="alert">
            ¡No existen artículos agregados al carrito de compras!
          </div>
        @else
          <input type="hidden" name="countArticles" value="{{ Cart::instance('shopping')->count() }}" required>
          <button class="btn btn-success btn-lg btn-block" type="submit" title="Proceder con el pago" >
            <i class="fas fa-lock mr-2"></i>Proceder al pago
          </button>
         @endif

      </form>

    {{-- script de validacion de formulario --}}
      <script>
        (function() {
          'use strict';
            window.addEventListener('load', function() {
              var forms = document.getElementsByClassName('needs-validation');
              var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                  if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                  }
                form.classList.add('was-validated');
              }, false);
            });
          }, false);
        })();
      </script>

    </div>
  </div>
</div>
@endsection

@push('scripts')
<script type="text/javascript">
$(function() {
  $( document ).on( 'click', '#same-address', function(){
  let val = $(this).val();
    if( $( this ).is( ':checked' ) ){
      $("#shippingAddress").prop('disabled', true).prop('required', false);
    } else {
      $("#shippingAddress").prop('disabled', false).prop('required', true);
    }
  });
 

$('#buyerFullName').change(function(){
  $('#extra3').val(this.value);

});


});
</script>
@endpush

@section('facebook_standar_event')
fbq('track', 'InitiateCheckout');
@endsection