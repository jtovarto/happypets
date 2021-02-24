<footer class="container-fluid pt-5 bg-dark text-white pl-5">
	<div class="row pb-4">
		<div class="col-12 col-md">
			<img src="{{ asset ('img/logos/logo.png') }}" style="max-height: 100px;">
			<small class="d-block mb-3 text-muted">&copy; 2019</small>
		</div>

    	<div class="col-6 col-md">
      		<h5 class="h6 lemon-normal">Productos</h5>
      		<ul class="list-unstyled text-small">
        		<li><a class="text-muted" href="{{ route('producto','Puppy-Sorb') }}">Poppy Sorb</a></li>
        		<li><a class="text-muted disabled" href="#">Oddor Off</a></li>
        		<li><a class="text-muted disabled" href="#">Dog Repelent</a></li>
        		
      		</ul>
    	</div>

    	<div class="col-6 col-md">
      		<h5 class="h6 lemon-normal">Nosotros</h5>
      		<ul class="list-unstyled text-small">
        		<li><a class="text-muted" href="{{route('nosotros')}}#resena">Reseña</a></li>
        		<li><a class="text-muted" href="{{route('nosotros')}}#mision">Misión</a></li>
        		<li><a class="text-muted" href="{{route('nosotros')}}#vision">Visión</a></li>
        		<li><a class="text-muted" href="{{route('nosotros')}}#valores">Valores</a></li>
      		</ul>
    	</div>

    	<div class="col-6 col-md">
      		<h5 class="h6 lemon-normal">Carrito</h5>
      		<ul class="list-unstyled text-small">
        		<li><a class="text-muted" href="{{route('carrito')}}">Artículos</a></li>
        		<li><a class="text-muted" href="{{route('checkout')}}">Checkout</a></li>
            <li><a class="text-muted" href="{{route('consulta')}}">Checkout</a></li>            
      		</ul>
    	</div>

    	<div class="col-6 col-md">
      		<h5 class="h6 lemon-normal">Contacto</h5>
      		<ul class="list-unstyled text-small">
        		<li><a class="text-muted" href="{{route('contacto')}}">Contáctanos</a></li>
        		<li><a class="text-muted" href="#">Términos de Privacidad</a></li>
        		<li><a class="text-muted" href="#">Políticas de Devolución</a></li>        		
      		</ul>
    	</div>
  	</div>
  	
  	<div class="row">
  		<p class="col-12 text-right text-muted">&reg;Happy Pets at Home - 2019</p>
  	</div>
</footer>