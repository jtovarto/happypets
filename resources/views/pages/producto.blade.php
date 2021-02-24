@extends('main')
@push('css_files')
  <link rel="stylesheet" href="{{ asset('css/product-page.css') }}">  
@endpush
@section('content')
	
	<div class="position-relative overflow-hidden p-3  text-center bg-product">		
		<div class="col-md-6 p-lg-5 mx-auto my-sm-5 bg-sucesss " id="productBanner">
			<h1 class="d-none font-weight-normal">Puppy Sorb</h1>
			<h1 class="lemon-bold mt-5" >Dile adiós</h1>
			<h1 class="lemon-bold mb-5" > al <span style="color:orange;">orine</span></h1>
		</div>
		<div class="product-device  d-none d-md-block"></div>
		<div class="product-device product-device-2 d-none d-md-block"></div>
	</div>

<div class="d-md-flex flex-md-equal w-100" style="background-image: url({{asset('img/bg-stamp.jpg')}});">
		<div class="col-12 col-md-7 text-center bg-white overflow-hidden"  style="margin-right: -2px; ">
			<img src="{{asset('img/products/puppy-sorb.jpg')}}" class="img-fluid w-100" >
		</div>
		<div class="col-12 col-md-5 px-3  px-md-5 py-3 overflow-hidden text-white">
			<div class="p-1">
				<div class="w-100 d-flex ">
					<h2 class="lemon-bold text-white d-inline-flex my-auto" style="text-shadow: 2px 2px 1px #05A17A;" >{{$producto->name}}</h2>
				</div>
				<small> <span class="badge badge-danger ml-2">Oferta</span>
				<span class="badge badge-warning ml-2">Más vendido</span>
				</small>
				<p class="text-light text-justify">Es el mejor producto desarrollado para facilitar la etapa de entrenamiento de sus cachorros, estos orinan por todas partes y con gran frecuencia. Usando <span class="lemon-bold puppy-text-v">PUPPY SORB</span> no tendrá que utilizar frecuentemente traperos o mopas para estar recogiendo y limpiando los desastres de su de su mascota.</p>
				<ul class="list-unstyled font-small mt-2 mb-0">
					<li>
					  <p class="text-uppercase mb-0 lemon-bold " style="text-shadow: 2px 2px 1px #05A17A;"><strong>Precio</strong></p>
						<p class="text-warning mb-1 lemon-normal" style="font-size: 1.3em;">COP $ {{$producto->price}}</h1>
						<br>
						    <small style="color: rgba(175,175,175,1); font-size: .8rem;">
						        <s>COP $25.500,00</s>
						    </small>
						    <p class="m-0 mb-3" style="font-size:14px; font-weight:bold">* No incluye envío</p>
						</p>
					</li>
					<li>
						<p class="text-uppercase mb-0 lemon-bold " style="text-shadow: 2px 2px 1px #05A17A;"><strong>Presentación</strong></p>
						<p class="text-warning mb-3 lemon-normal">300g</p>
					</li>
					<li>
						<p class="text-uppercase mb-0 lemon-bold" style="text-shadow: 2px 2px 1px #05A17A;"><strong>Descripción</strong></p>
						<p class="text-white mb-3">Absorbente de orine.</p>
					</li>
					<li class="text-md-right ">
						<button href="" class="btn btn-success" id="anadirItem"><i class="fas fa-shopping-cart mr-2"></i>Añadir al carrito</button>
					</li>
				</ul>
			</div>
		</div>
	</div>

	<div class="container-fluid marketing px-5">
		<div class="row featurette my-5">
			<div class="col-md-7 pr-4">
				<h2 class="featurette-heading m-0">Facilita la etapa de entrenamiento <span class="text-muted"> de sus cachorros.</span></h2>
				<p class="lead text-justify">Es el mejor producto desarrollado para facilitar la etapa de entrenamiento de sus cachorros, estos orinan por todas partes y con gran frecuencia, usándo <span class="lemon-bold puppy-text-v">PUPPY SORB</span> no tendrá que utilizar frecuentemente traperos o mopas para estar recogiendo y limpiando los desastres de su mascota, simplemente aplique una pequeña cantidad de <span class="lemon-bold puppy-text-v">PYPPY SORB</span> sobre el orín y espere 4 minutos hasta que se gelifique completamente, este producto absorberá por completo el líquido sin dejar residuos en sus pisos, simplemente utilice recogedor y un escoba y arrójelo a la caneca, también puede utilizar aspiradora ya que <span class="lemon-bold puppy-text-v">PUPPI SORB</span> no deja escapar fluidos después de gelificarse.</p>
			</div>
			<div class="col-md-5  ">
				<img class="img-fluid" src="{{asset('img/images/ban01.jpg')}}"  style="border-radius: 20px;">
			</div>
		</div>

		<hr class="featurette-divider">

		<div class="row featurette my-5">
			<div class="col-md-7 order-md-2 pl-4">
				<h2 class="featurette-heading m-0">Fácil de usar - <span class="text-muted">Fácil de limpiar.</span></h2>
				<p class="lead text-justify">Aplique una pequeña cantidad de sobre el orine y espere de 3 a 4 minutos hasta que se gelifique completamente, este producto adsorberá por completo el líquido sin dejar residuos en sus pisos, simplemente utiliza recogedor y escoba y arrójelo al cesto. <br>Puede utilizar aspiradora ya que <span class="lemon-bold puppy-text-v">PUPPY SORB</span> no deja escapar fluidos después de gelificarse.</p>
			</div>
			<div class="col-md-5 order-md-1">
				<img class="img-fluid " style="border-radius: 20px;" src="{{asset('img/images/ban02.jpg')}}">
			</div>
		</div>

		<hr class="featurette-divider">

		<div class="row featurette my-5">
			<div class="col-md-7">
				<h2 class="featurette-heading m-0">Precauciones y <span class="text-muted">Advertencias.</span></h2>
				<p class="lead text-justify"><span class="lemon-bold puppy-text-v">PUPPY SORB</span> es totalmente natural, no es nocivo para niños y no es nocivo para sus mascotas, no contiene aldehídos y si su mascota lo ingiere no le causará ningún efecto adverso. Puede ser usado en derrames de otro tipo en el hogar como gaseosas, café, vino entre otros.</p>
			</div>
			<div class="col-md-5">
				<img class="img-fluid" style="border-radius: 20px;" src="{{asset('img/images/ban03.jpg')}}" alt="Generic placeholder image">
			</div>
		</div>		
	</div>

@endsection

@include('snipets.anadir-item')

@section('facebook_standar_event')
fbq('track', 'ViewContent', {product:'Puppy Sorb'});
@endsection