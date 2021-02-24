<!DOCTYPE html>
<html>

<head><meta charset="gb18030">

    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>CLIXER+ Admin | HappyPets at Home | admin login</title>

    <link href="{{ asset ('admin/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset ('admin/font-awesome/css/font-awesome.css') }}" rel="stylesheet">
    <link href="{{ asset ('admin/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css') }}" rel="stylesheet">

    <link href="{{ asset ('admin/css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset ('admin/css/style.css') }}" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">CX+</h1>

            </div>
            <h2>Inicio de Sesión</h2>

            <form class="m-t" role="form" action="{{ route('login') }}" method="post">
                @csrf
                <div class="form-group">
                     <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus placeholder="Usuario">

                    @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required  placeholder="Contraseña" >

                    @if ($errors->has('password'))
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
               <div class="checkbox m-r-xs">
                    <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                    <label for="remember">{{ __('Remember Me') }}</label>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Entrar</button>
                 @if (Route::has('password.request'))
                    <a class="btn btn-link" href="{{ route('password.request') }}">
                        {{ __('Forgot Your Password?') }}
                    </a>
                @endif
            </form>
            <p class="m-t"> <small>by Clixer+  &copy; 2020</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="{{ asset('admin/js/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>

</body>

</html>
