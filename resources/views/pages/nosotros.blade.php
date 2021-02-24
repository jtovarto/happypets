@extends('main')
@section('body-class','body-bg')
@section('content')
<div class="jumbotron mb-0">

	<div class="container text-center text-md-left">
		<img src="{{asset('img/logos/logow.png')}}" class="img-fluid " width="250" alt="Happy Pets at Home" title="Happy Pets at Home" >
		<h1 class="display-3 text-light d-none">Happy Pets at Home</h1>
		<p class="mt-3 text-light">Quienes tienen mascotas como gatos y perros saben que el esfuerzo en la limpieza del hogar es doble, ya que constantemente sueltan pelo, dejan restos de comida, agua en el suelo, traen la suciedad de la calle y olores característicos sobre todo cuando son cachorros, además de tener pequeños descuidos con sus necesidades fisiológicas.</p>
	</div>

</div>

<div class="container-fluid p-5 bg-dark text-white">
	<div class="row">
		<div class="col-md-12 text-center">
			<h2 class="lemon-bold">Un poco sobre nosotros...</h2>
            <p> Mardeans es una empresa dedicada al mundo de las mascotas desde el año 2010, una marca que diseña, importa e innova en productos para el aseo del hogar con mascotas. Somos una empresa que nace como una necesidad de entender y tratar a las mascotas como un miembro más de la familia, por ende, debe ser tratado y cuidado como tal; de allí que nuestra misión sea clara: ayudar a las mascotas y a sus dueños a convivir mejor, desde que llegan a su nuevo hogar. Desde Mardeans nos comprometemos a impulsar el respeto a los animales y ayudar a través de nuestros productos a que la relación entre mascotas y las personas sea más fácil, agradable y divertida. </p>
        </div>
    </div>
</div>

<div class="container  py-5 my-5">
	<div class="row ">
		<div class="col-12 col-md-6 flex-column mb-5  ">
			<h2 class="lemon-bold text-center text-success"> <i class="fas fa-heart"></i> Valores</h2>
			<div class="row flex-column text-center text-md-left lemon-normal mt-3">
				<div class="mt-3 ">
					<h6 class="font-weight-bold  my-auto">
						<i class="fas fa-award blue-text" style="min-width: 20px;"></i> RESPONSABILIDAD 
					</h5>
				</div>

				<div class="mt-3">
					<h6 class="font-weight-bold d-inline-block my-auto">
						<i class="fas fa-user-tie teal-text fa-1x" style="min-width: 20px;"></i>  HONESTIDAD
					</h6>
				</div>
				<div class="mt-3">
					<h6 class="font-weight-bold d-inline-block my-auto">
		          		<i class="fas fa-cogs indigo-text fa-1x" style="min-width: 20px;"></i>  CALIDAD DE PRODUCTOS
		          	</h6>
		          </div>

		          <div class="mt-3">
		          	<h6 class="font-weight-bold d-inline-block my-auto">
		          		<i class="fas fa-user-cog deep-purple-text fa-1x" style="min-width: 20px;"></i>  ORIENTACION HACIA NUESTROS CLIENTES
		          	</h6>
		          </div>
		      </div>
		  </div>

		  <div class="col-12 col-md-6 px-5">
		  	<div class="row flex-column">
		  		
		  		<div>
		  			<h2 class="lemon-bold text-info"><i class="fas fa-bullseye"></i> Misión</h2>
		            <p class="text-justify">Brindar productos innovadores y de calidad que ayuden al bienestar integral de tus mascotas, facilitando su cuidado e higiene, coadyuvando al mismo tiempo en el entrenamiento y reforzamiento de conductas positivas que fortalezcan la relación de nuestros clientes y sus mascotas, haciéndola mas fácil,  agradable y divertida. </p>
		        </div>

		        <div >
		        	<h2 class="text-primary lemon-bold"><i class="fa fa-eye"></i> Visión</h2>
		            <p class="text-justify">Ser reconocida en el mercado nacional e internacional como una marca líder de productos innovadores para mascotas, destacando el acompañamiento que como compañía brindamos a nuestros clientes, a través de nuestra línea de productos, en el entrenamiento y fortalecimiento de sus mascotas, todo enmarcado en impulsar el respeto a los animales.</p>
		        </div>

		    </div>
		</div>
	</div>
</div>
@endsection