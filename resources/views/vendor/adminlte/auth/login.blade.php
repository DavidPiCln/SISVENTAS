<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log In</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    @section('adminlte_css_pre')
        <link rel="stylesheet" href="{{ asset('vendor/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    @stop

    @php( $login_url = View::getSection('login_url') ?? config('adminlte.login_url', 'login') )
    @php( $register_url = View::getSection('register_url') ?? config('adminlte.register_url', 'register') )
    @php( $password_reset_url = View::getSection('password_reset_url') ?? config('adminlte.password_reset_url', 'password/reset') )

    @if (config('adminlte.use_route_url', false))
        @php( $login_url = $login_url ? route($login_url) : '' )
        @php( $register_url = $register_url ? route($register_url) : '' )
        @php( $password_reset_url = $password_reset_url ? route($password_reset_url) : '' )
    @else
        @php( $login_url = $login_url ? url($login_url) : '' )
        @php( $register_url = $register_url ? url($register_url) : '' )
        @php( $password_reset_url = $password_reset_url ? url($password_reset_url) : '' )
    @endif

    <div class="main">

        <div class="container">
            <div class="signup-content">
                <form action="{{ $login_url }}" method="POST" id="signup-form" class="signup-form">
                    @csrf
                    <h2>Iniciar Sesion </h2>
                    
            
                    <div class="form-group">
                        <input  type="email" name="email" 
                                class="form-control 
                                @error('email') is-invalid @enderror"
                                value="{{ old('email') }}" 
                                placeholder="{{ __('adminlte::adminlte.email') }}" 
                                autofocus>
                        
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    
                    </div>

                    <div class="form-group">
                        <input 
                            type="password" 
                            id="password" 
                            name="password" 
                            class="form-control @error('password') is-invalid @enderror" 
                            placeholder="{{ __('adminlte::adminlte.password') }}">
                            
                        <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                    
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    

                    {{-- <div class="form-group">
                        <input type="checkbox" name="agree-term" id="agree-term" class="agree-term" />
                        <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                    </div> --}}

                    <div class="form-group">
                        <button type="submit"  class="form-submit submit 
                            {{ config('adminlte.classes_auth_btn', 'btn-flat btn-primary') }}">
                            {{ __('Ingresar') }}
                        </button>
                        <a href="{{ $register_url }}" class="submit-link submit">Registrarse</a>
                    </div>

                    
                </form>
            </div>
        </div>

    </div>
    
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>