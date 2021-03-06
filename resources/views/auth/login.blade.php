@extends('layouts.ingreso')

@section('title', 'Login')
@section('content')

<p class="login-box-msg mt-1" style="color:white; font-size:18px;"><b>INICIO DE SESIÓN</b></p>

<form method="POST" action="{{ route('login') }}">
    {{ csrf_field() }}
    <div class="form-group row">
        <div class="input-group col-md-12">
            <div class="input-group-append">
                <div class="input-group-text">
                    <i class="fa fa-envelope"></i>
                </div>
            </div>
            <input class="form-control @if ($errors->has('correo')) is-invalid @endif " type="email" id="correo"
                name="correo" value="{{ old('correo') }}" placeholder="Correo electrónico" required autofocus>

            <!-- Muestra los mensajes de error cuando el usuario ingresa datos incorrectos -->
            @if ($errors->has('correo'))
            <span class="invalid-feedback" role="alert">
                {{ $errors->first('correo') }}

            </span>
            @endif

        </div>
    </div>

    <div class="form-group row">

        <div class="input-group col-md-12">
            <div class="input-group-append">
                <div class="input-group-text">
                    <i class="fa fa-lg fa-lock"></i>
                </div>
            </div>
            <input class="form-control @if ($errors->has('passwword')) is-invalid @endif" type="password" id="password"
                name="password" placeholder="Contraseña" required>

            @if ($errors->has('password'))
            <span class="invalid-feedback" role="alert">
                {{ $errors->first('password') }}

            </span>
            @endif

        </div>
    </div>



    <div class="form-group row mt-3">
        <div class="col-md-12 ">
            <button type="submit" class="btn btn-block btn-primary">
                INGRESAR
            </button>


        </div>

    </div>
</form>
@if( Auth::guest() )
<a class="btn btn-link " style="color:rgb(31, 158, 216)" href="{{ route('register') }}">Regístrate</a>
@endif


<p style="color:rgb(104, 98, 98)">Si tiene problemas para ingresar comunicarse a
    <strong>esge@unbjg.edu.pe</strong>
</p>

@endsection