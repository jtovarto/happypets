<header><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<nav class="navbar navbar-expand-lg fixed-top navbar-light bg-light px-md-5">
  		<a class="navbar-brand" href="#">
  			<img src="{{ asset('img/icos/ico64.png' )}}" width="45" height="45" class="d-inline-block align-top" alt="Happy Pets at Home logo">
  		</a>

  		<a href="{{ route('carrito')}}" class="d-inline-block d-lg-none rounded waves-effect ml-auto">
			<i class="fas fa-shopping-cart fa-3x" style="color:#5a5a5a;"></i>
			<small></small><span class="badge badge-danger" id="cesta1">{{Cart::instance('shopping')->count()}}</span></small>
		</a>
		<button class="navbar-toggler ml-2" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>			
		</button>

		
    	<div class="collapse navbar-collapse lemon-normal " id="navbarCollapse">
		    <ul class="navbar-nav mx-auto ">
				<li class="nav-item col {{ request()->is('home') ? 'active' : '' }}">
					<a class="nav-link " href="{{ route('home') }}">Inicio {{ request()->is('home') ? '<span class="sr-only">(current)</span>' : '' }} </a>
				</li>
				<li class="nav-item col {{ request()->is('home') ? 'nosotros' : '' }}">
					<a class="nav-link" href="{{ route('nosotros') }}">Nosotros</a>
				</li>
				<li class="nav-item col {{ request()->is('producto') ? 'active' : '' }} dropdown">
					<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Productos
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="{{ route('producto','Puppy-Sorb') }}">Puppy Sorb</a>		          
					</div>
				</li>
				<li class="nav-item col {{ request()->is('carrito') ? 'active' : '' }}">
					<a class="nav-link" href="{{ route('carrito') }}" tabindex="-1" >Carrito</a>
				</li>
				<li class="nav-item col {{ request()->is('contacto') ? 'active' : '' }}">
					<a class="nav-link" href="{{ route('contacto') }}" tabindex="-1" >Contacto</a>
				</li>
				<li class="nav-item col {{ request()->is('consulta') ? 'active' : '' }}">
					<a class="nav-link" href="{{ route('consulta') }}" tabindex="-1" >Consulta</a>
				</li>

		    </ul>
		    <ul class="navbar-nav ml-auto d-flex flex-row navbar-social align-items-center">
			  	<li class="nav-item ml-3">
			  		<a href="https://www.facebook.com/hpetsathomeco-113001716832156/">
			  			<i class="fab fa-facebook" title="Síguenos en Facebook" ></i>
			  		</a>
			  	</li>
			  	<li class="nav-item ml-3">
			  		<a href="https://www.instagram.com/hpetsathome.co/">
			  			<i class="fab fa-instagram" title="Síguenos en Instagram"></i>
			  		</a>
			  	</li>
			  	<li class="nav-item ml-3 d-none d-lg-inline">
			  		<a href="{{ route('carrito')}}" class="nav-link rounded waves-effect mr-2">
			  			<i class="fas fa-shopping-cart fa-2x"></i>
                		<span class="badge badge-danger" id="cesta2">{{	Cart::instance('shopping')->count()}}</span>
                	</a>
			  	</li>
		  	</ul>
		</div>
	</nav>
</header>