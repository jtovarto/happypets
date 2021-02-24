<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Happy Pets at Home</title>

       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('font/fontawesome/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">

    </head>
	<body style="background-image: url({{asset('img/bg-p.png')}})" >
	    <div class="container px-5 mb-4">
	    	<div class="card mx-5" style="border-top:5px solid rgb(0,0,150);">
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
	    			 <h4 class="card-title text-center bg-primary mx-4 py-2 text-white">Aviso de envío</h4>
	    			 <div class="card-text p-4">
	    			 	
	    			 	<p>Nos complace informar que tu pedido Nro. <span class="text-primary">{{ $mail->transaction_ref ?? 'HP0000xxxxxx' }}</span> bajo el Nro. de transacción <span class="text-primary">{{ $mail->transaction_id ?? '0000000000' }}</span> ya ha sido enviado a su destino, pronto estarás recibiendo nuestros productos y brindándole lo mejor a tu mascota.</p>
	    			 	<p>Para que puedes dar seguimiento a tu pedido, adjuntamos información relacionada en la tabla siguiente:</p>
	    			 	<ul class="list-group list-group-flush mx-5 border my-4">
						    <li class="list-group-item">
						    	<strong class="mr-3">Compañía de envío:</strong> {{ $mail->shipping_company ?? 'Compañia'}}
						    </li>
						    <li class="list-group-item">
						    	<strong class="mr-3">Fecha de envío:</strong> {{ $mail->shipping_date ?? '00/00/0000'}}
						    </li>
						    <li class="list-group-item">
						    	<strong class="mr-3">Nro. de guía:</strong> {{ $mail->shipping_id ?? '0000000000'}}
						    </li>
						    <li class="list-group-item">
						    	<strong class="mr-3">Estatus de envío:</strong>
						    	<span class="badge badge-success">{{ $mail->shipping_state ?? 'Enviado'}}</span>
						    </li>
						</ul>
					    <p>Para darle seguimiento a tu pedido puedes hacerlo a través de la página de la empresa de encomiendas o desde nuestro sitio web, en nuestro aparto de <a href="{{route('consulta')}}">Consulta de ordenes</a>.</p>
					    <p>Para cualquier novedad o consulta adicional puedes contactarnos a través de nuestra página de  <a href="{{ route('contacto')}}">contacto</a> o por el número telefónico: +57 300 379 9764.</p>
	    			 </div>
	    		</div>
	    		<div class="card-footer px-5">
	    			<small class="text-muted" style="font-size: .7rem">
						“Este correo y cualquier archivo transmitidos con él son confidenciales y previsto solamente para el uso del individuo o de la entidad a quienes se tratan. Si UD. ha recibido este correo por error por favor notificar a info@happypetsathome.com.ve. El receptor debe comprobar este correo y cualquier anexo del mismo para identificar la presencia de virus. La compañía no acepta ninguna responsabilidad por ningún daño causado por algún virus transmitido en este correo”.
	    			</small>
	    		</div>
	    	</div>
	    </div>
	    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</body>
</html>