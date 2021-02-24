<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        @include ('googleTools.tagManagerHead')
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Happy Pets at Home</title>
        
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-154030406-1"></script>
        <script>
          window.dataLayer = window.dataLayer || [];
          function gtag(){dataLayer.push(arguments);}
          gtag('js', new Date());
        
          gtag('config', 'UA-154030406-1');
        </script>
        
        <link rel="icon" type="image/png" href="{{asset('img/icos/ico64.png')}}" />
        <link rel="stylesheet" href="{{ asset('font/custom-font.css') }}">
        <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('font/fontawesome/css/all.min.css') }}">
        <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom-style.css') }}">
		
		<!--Archivos CSS particulares-->
        @stack('css_files')
        
        <script src='https://www.google.com/recaptcha/api.js?render=6Lc3hrsZAAAAAHzNZhdS3ML2NVpLqJe5MJLKR7J9'></script>
        
        <!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window,document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
 fbq('init', '352314466012691'); 
fbq('track', 'PageView');

@yield('facebook_standar_event')
</script>
<noscript>
 <img height="1" width="1" 
src="https://www.facebook.com/tr?id=352314466012691&ev=PageView
&noscript=1"/>
</noscript>
<!-- End Facebook Pixel Code -->
        
<script>
    grecaptcha.ready(function() {
    grecaptcha.execute('6Lc3hrsZAAAAAHzNZhdS3ML2NVpLqJe5MJLKR7J9', {action: 'formulario'})
    .then(function(token) {
        var recaptchaResponse = document.getElementById('recaptchaResponse');
        recaptchaResponse.value = token;
    });});
</script>
    </head>

    <body @hasSection('body-class') class="@yield('body-class')" @endif>
        @include ('googleTools.tagManagerBody')
        
		<main role="main">
	        <!--Barra de Navegación-->
	        @include('layouts.navbar')
	 	      
	 	    <!--Cuerpo de la página-->
	        @yield('content') 		       
			
			<!--Pie de página-->
	        @include('layouts.footer')

	       <script src="{{ asset('font/fontawesome/js/all.min.js') }}"></script>
	    	<script src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
	        <script src="{{ asset('js/popper.min.js') }}"></script>
	        <script src="{{ asset('js/bootstrap.min.js') }}"></script>
	        
	        <!--Archivos JS particulares-->
	        @stack('scripts_files')
	        
	        <!--Scripts particulares-->
	        @stack('scripts')

	    </main>        
    </body>    
</html>