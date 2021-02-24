<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CLIXER+ Admin | HappyPets at Home | @yield('page-title')</title>

    <link href="{{ asset('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet">


    <link href="{{ asset('admin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('admin/css/style.css') }}" rel="stylesheet">

    @stack('css_files')

    @yield('style')

</head>

<body>
	<div id="wrapper">
		@include('admin.layouts.navbar-side')

		<div id="page-wrapper" class="gray-bg">
			@include('admin.layouts.navbar-top')
			@include('admin.layouts.breadcrumb')

			@yield('content')

			@include('admin.layouts.footer')
        </div>
    </div>



    <!-- Mainly scripts -->
    <script src="{{ asset('admin/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Custom and plugin javascript -->
    <script src="{{ asset('admin/js/inspinia.js') }}"></script>
    <script src="{{ asset('admin/js/plugins/pace/pace.min.js') }}"></script>

    @stack('js_files')

    <!-- Page-Level Scripts -->
    @yield('scripts')

</body>

</html>
