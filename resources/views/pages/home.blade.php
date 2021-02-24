@extends('main')
@section('body-class','body-bg')
@section('content')	

	@include('snipets.carousel')

	<div class="container-fluid marketing mt-4 px-md-5">
		<div class="row">
	  		
	  		<div class="col-lg-4">
	  			<div class="d-flex flex-column flex-sm-row flex-lg-column">
	  				<div class="my-auto marketing-img">
	  					<img src="{{ asset('img/products/ps.jpg') }}"  class="img-fluid">	
	  				</div>					
	  				<div class="d-flex flex-column ">
	  					<div>
		  					<h2 class="lemon-normal">Puppy Sorb</h2>
							<p>Es el mejor producto desarrollado para facilitar la etapa de entrenamiento de sus cachorros, estos orinan por todas partes y con gran frecuencia. Recoja el orine sin usar trapeadora de manera fácil y rapida!</p>
						</div>
	  					<div class="d-flex flex-row flex-lg-column flex-xl-row">
	  						<div class=" mx-auto">
	  							<a class="btn btn-info mr-1 mr-lg-0 mr-xl-1 mb-lg-1 mb-xl-0" href="{{ route('producto','Puppy-Sorb') }}" role="button"><i class="fa fa-eye mr-2"></i>Ver detalles &raquo;</a>	
	  						</div>
	  						<div class="mx-auto">
	  							<button type="button" class="btn btn-success ml-1 mr-lg-0 mr-xl-1 mt-lg-1 mt-xl-0" data-toggle="modal" data-target="#modalQuickView"><i class="fa fa-shopping-cart mr-2"></i>Añadir al Carrito</button>	
	  						</div>
	    					
	  					</div>
	  				</div>
	  			</div>
	  		</div>

	  		<div class="col-lg-4">
	  			<div class="d-flex flex-column flex-sm-row flex-lg-column">
	  				<div class="my-auto marketing-img">
	  					<img src="{{ asset('img/products/oo.jpg') }}" class="img-fluid">	
	  				</div>					
	  				<div class="d-flex flex-column ">
	  					<div>
		  					<h2 class="lemon-normal">Oddor Off</h2>
							<p>Este ambientador ofrece la original fragancia New Sensitive la cual aromatiza el ambiente gracias a sus notas frescas y agradables, brindando sensación de frescura en todos los espacios de su hogar.</p>
						</div>
	  					<div class="d-flex flex-row flex-lg-column flex-xl-row">
	  						<div class="w-75 mx-auto">
	  							<div class=" mx-auto border border-danger text-danger py-2" style="font-weight: bold; border-radius: 5px;">Próximamente </div>
	  						</div>
	  					</div>
	  				</div>
	  			</div>
	  		</div>

	  		<div class="col-lg-4">
	  			<div class="d-flex flex-column flex-sm-row flex-lg-column">
	  				<div class="my-auto marketing-img">
	  					<img src="{{ asset('img/products/dr.jpg') }}"  class="img-fluid">
	  				</div>					
	  				<div class="d-flex flex-column ">
	  					<div>
		  					<h2 class="lemon-normal">Dog Repelent</h2>
							<p>Con la aplicación directa de <b style="color: #05a17a;">Dog Repelent</b> sobre superficies del hogar lograremos neutralizar olores y generar una reacción adversa de la mascota al percibir la fragancia.</p>
						</div>
	  					<div class="d-flex flex-row flex-lg-column flex-xl-row">
	  						<div class="w-75 mx-auto">
	  							<div class="mx-auto border border-danger text-danger py-2" style="font-weight: bold; border-radius: 5px;">Próximamente </div>
	  						</div>
	  					</div>
	  				</div>
	  			</div>
	  		</div>	

		</div>
	</div>

	<div class="container-fluid productos pt-2 pb-4">
		<div class="row ">
			<img src="{{ asset('img/logos/logo-r.png') }}" class="mx-auto ">
			<p class="text-center mx-5 text-white">Happy Pets at Home es una línea de productos que limpia, desinfecta y aromatiza tu hogar manteniéndolo fresco y agradable, ayudando al cuidado de tu mascota y de tu hogar, brindado un ambiente lleno de alegría para todos.</p>
		</div>
	</div>

	<div class="container-fluid distribuidores">		
		<div class="d-flex flex-column py-5 px-2 p-sm-5 ml-sm-5">
			<h2 class="text-left text-white lemon-normal mt-xl-3 text-shadow">¿Quieres ser distribuidor?</h2>
			<h3 class="text-left text-white lemon-normal mt-1 text-shadow">Te invitamos a ser parte de nuestros aliados!</h3>
			<div>
				<a class="btn btn-info mt-1" href="{{route('contacto')}}">Contáctanos &raquo;</a>
			</div>			
		</div>		
	</div>

	<div class="container social-media my-sm-5">	  	
		<div class="row">
			<h2 class=" mx-auto lemon-normal">SOCIAL MEDIA</h2>
		</div>
		<div class="row ">
		<div class="col-12 col-lg-6 mt-5">
			<div class="embed-responsive embed-responsive-1by1 border border-success rounded" style="width:400px;">
				<video class="embed-responsive-item" controls >
					<source src="{{asset('videos/videoHP.mp4')}}" id="video" type="video/mp4">
					<button onclick="document.getElementById('video').play()">Reproducir el Audio</button>
				</video>
			</div>	  			
		</div>
		<div class="col-12 col-lg-6 mt-5">
		<h6><i class="fab fa-instagram fa-2x mr-2" title="Síguenos en Instagram"></i><a href="https://www.instagram.com/hpetsathome.co/"
		 class="lemon-normal">@hpetsathome.co</a></h6>
		<!-- LightWidget WIDGET --><script src="http://cdn.lightwidget.com/widgets/lightwidget.js"></script><iframe src="//lightwidget.com/widgets/0af994f97e595927816a9fc8948014ad.html" scrolling="no" allowtransparency="true" class="lightwidget-widget" style="width:100%;border:0;overflow:hidden;"></iframe>
			</div>
		</div>	  	
	</div>
	
	<!--Mostrar item Modal-->
	@include('snipets.modal-item')
	
@endsection

@include('snipets.anadir-item')