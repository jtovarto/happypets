<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Happy Pets at Home</title>
    </head>
	<body style="background-image: url({{asset('img/bg-p.png')}})" >
	    <div class="container px-5 mb-4">
	    	<div class="card mx-5" style="border-top:5px solid rgb(0,0,150); background-color: white; padding: 2rem;">
	    		<div class="card-header">
	    			<div class="row">
	    				<div class="col-4">
	    					<img src="{{asset('img/logos/logo.png')}}" style="width: 200px;">
	    				</div>
	    				<div class="col-8">
			    			<ul class="list-unstyled text-right mt-4 mb-0" >
			    				<li>Bogotá- Colombia<i class="fa fa-map-marker ml-2"></i></li>
			    				<li>+57 300 379 9764<i class="fa fa-phone ml-2"></i></li>
			    				<li>info@happypetsathome.com.co<i class="fa fa-envelope ml-2"></i></li>
			    			</ul>
	    				</div>
	    			</div>
	    		</div>
	    		<div class="card-body">
	    			 <h4 class="card-title text-center bg-primary mx-4 py-2 text-white">Aviso de orden</h4>
	    			 <div class="card-text p-4">
	    			 	<p>Se ha recibido una nueva orden de compra:</p>
	    			 	<h4>Ref.: <span style="color: #666">{{$order->reference_sale ?? 'HP0000XXXXXX'}}</span></h4>
	    			 	<ul style="list-style: none; line-height: 2rem;">
	    			 	    <li>
						    	<strong>Nombre Comprador:</strong>
						    	<span> {{ $order->extra3 ?? 'Nombre Usuario'}}</span>
						    </li>
						    <li>
						    	<strong>Correo:</strong>
						    	<span> {{ $order->email_buyer ?? 'email@dominio.com'}}</span>
						    </li>
						   
						    <li>
						    	<strong class="mr-3">Cantidad de artículos:</strong>
						    	<span>{{ $order->extra1 ?? '0'}} Puppy Sorb</span>
						    </li>
						    <li class="list-group-item">
						    	<strong class="mr-3">Monto de Transacción:</strong>
						    	<span>COP ${{ number_format($order->value,2,',','.') ?? '00.000,00'}} </span>
						    </li>
						</ul>
						<ul style="list-style: none; line-height: 2rem;">
						    <li>
						    	<strong>Estado de la Transacción:</strong>
						    @if 	($order->state_pol == 4)
                                <span class="label label-primary">Aceptado</span>
                            @elseif ($order->state_pol == 5)
                                <span class="label label-warning">Expirado</span>
                            @elseif ($order->state_pol == 6)
                                <span class="label label-danger">Declinado</span>
                            @endif

						    </li>
						    <li>
						    	<strong class="mr-3">Dirección de Envío:</strong>
						    	<span>{{ $order->shipping_address ?? 'DIRECCION'}}</span>
						    </li>
						    <li>
						    	<strong class="mr-3">Ciudad de Envío:</strong>
						    	<span>{{ $order->shipping_city ?? 'CIUDAD'}}</span>
						    </li>
						    <li>
						    	<strong class="mr-3">Teléfono:</strong>
						    	<span>{{ $order->phone ?? '+57000000000'}}</span>
						    </li>
						    
						</ul>
	    			 </div>
	    		</div>
	    	</div>
	    </div>
	</body>
</html>