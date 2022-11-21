@extends('layouts.app')

@section('content')
<div class="container" style="background-color:#0B5466;">
    <div class="row justify-content-center" style="margin-top: 120px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">{{ __('BIENVENIDO') }}</div>

                <div class="card-body" style="background:#ECF0F5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electrónico') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus>
                                {!! $errors->first('email','<large class="text-danger">:message</large><br>') !!}
                            </div>
                        </div>




                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>

                            <div class="col-md-6">
                                <div class="input-group">
                                    <input id="txtPassword" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password">
                                    <div class="input-group-append">
                                        <button id="show_password" class="btn btn" type="button" onclick="mostrarPassword()" style="background-color:#1493B3;"> <span class="fa fa-eye-slash icon" style="color:white"></span> </button>
                                    </div>
                                </div>
                                {!! $errors->first('password','<large class="text-danger">:message</large><br>') !!}
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Recuérdame') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Iniciar sesión') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Olvidé mi contraseña') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection