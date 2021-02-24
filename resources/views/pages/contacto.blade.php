@extends('main')
@section('body-class','body-bg')
@section('content')
<div class="container-fluid py-5 ">			
    
	<section class="px-md-5 mx-md-5 dark-grey-text bg-light py-5">
	    <div class="d-flex flex-column flex-sm-row">
	        
	    
	    
    	    <div class="text-center mb-3 mb-sm-0">
    	        <img src="{{asset('img/logos/logo.png')}}" class="img-fluid " width="230px" >    
    	    </div>
    	    
    	    <div>
    	        <h3 class="font-weight-bold text-center lemon-bold ">Contacto</h3>
    		    <p class="text-muted text-center px-5">En Happy Pets at Home nuestra prioridad son nuestos clientes y sus mascotas.<br> Contáctanos para cualquier duda o comentario que quieras hacernos.</p>
    
    		    
    	    </div>
    	   </div>
    	   <div id="map-container-google-1" class="map-container my-5">
    	   	<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d254508.3928070812!2d-74.24789584881646!3d4.648625942144886!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e3f9bfd2da6cb29%3A0x239d635520a33914!2sBogot%C3%A1%2C%20Colombia!5e0!3m2!1ses!2sve!4v1575329162169!5m2!1ses!2sve" width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""></iframe>
    	   </div>
		
		

			<hr class="my-5">
			
		    @if (session()->has('success'))
    		<div class="alert alert-success alert-dismissable">
                <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                {{ session()->get('success') }}
            </div>
        	@endif
            
			<div class="row">
			    
				<div class="col-lg-5 col-md-12 mb-0 mb-md-0">
					<h4 class="font-weight-bold">Llama o escríbenos</h4>
					<p class="text-muted mb-4">Contacto a cualquiera de nuestros departamentos, trabajamos para brindarte el mejor servicio.</p>
  				
  				<p class="font-weight-bold">Soporte:</p>

  				<p class="mb-2">+57 300 379 9764</p>
  				
  				<p class="mb-2"><a href="#">Contacta nuestro equipo de soporte:</a></p>

				<p class="mb-4">Nuestro soporte técnico esta disponible desde las  8am hasta 5pm.</p>

				<p class="font-weight-bold">Ventas:</p>

				<p class="mb-2">+57 300 379 9764</p>

				<p class="mb-2"><a href="#">Contacta nuestro equipo de ventas:</a></p>

		        <p class="mb-4">Nuestro equipo ventas esta disponible desde las  8am hasta 5pm.</p>

				<p class="font-weight-bold">Para requerimientos generales:</p>

		        <p class="mb-2"><a href="#">info@happypetsathome.com.co</a></p>
		    </div>
            
		    <div class="col-lg-7 col-md-12 mb-4 mb-md-0">
		        <form method="POST" action="{{route('enviar-email')}}" id="formContacto">
                @csrf
                <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
		    	<div class="row">
		    		<div class="col-md-6">
		    			<div class="md-form md-outline mb-0">
		    				<input type="text" id="name" name="nombre" class="form-control" required>
		    				<label for="name">Nombre(s)</label>
		    			</div>
		    		</div>

		    		<div class="col-md-6">
		    			<div class="md-form md-outline mb-0">
		    				<input type="text" id="lastname" name="apellido" class="form-control" required>
		    				<label for="lastname">Apellido(s)</label>
		    			</div>
		    		</div>
		    	</div>

		    	<div class="md-form md-outline mt-3">
		    		<input type="text" id="company" name="compania" class="form-control">
		    		<label for="company">Compañía</label>
		    	</div>


		        <div class="md-form md-outline mt-3">
  					<input type="email" id="email" name="email" class="form-control" required>
  					<label for="email">E-mail</label>
				</div>


		        <div class="md-form md-outline mt-3">
  					<input type="number" id="phone" name="telefono" class="form-control" required>
  					<label for="phone">Teléfono</label>
				</div>
				
				<div class="md-form md-outline mt-3">
    				<select class="form-control" name="departamento" required >        				
        				<option value="Suporte">Soporte</option>
        				<option value="Ventas">Ventas</option>
        				<option value="Distribuidores">Distribuidores</option>
        				<option value="General">General</option>
      				</select>
      				<label for="departament">Departamento</label>
      			</div>


		        <div class="md-form md-outline mt-3">
  					<input type="text" id="subject" name="asunto" class="form-control" required>
  					<label for="subject">Asunto</label>
				</div>


		        <div class="md-form md-outline mb-3">
  					<textarea id="message" name="mensaje" class="md-textarea form-control" rows="3" maxlength="250"></textarea>
  					<label for="form-message">Como podemos ayudarte?</label>
				</div>

				<button type="submit" class="btn btn-info btn-block ml-0">Enviar<i class="far fa-paper-plane ml-2"></i></button>
                </form>
				</div>
			
	      
	    </div>
	</section>


</div>
@endsection
