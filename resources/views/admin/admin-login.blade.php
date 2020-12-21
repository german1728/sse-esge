@extends('layouts.ingreso')

@section('title', 'Login admin')
@section('content')
<p class="login-box-msg mt-1" style="color:white; font-size:18px;"><b>INICIO DE SESIÓN -
        ADMIN</b></p>

<form method="POST" action="{{ route('admin.login.submit') }}">
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
                {{ $errors->first('correo') }}

            </span>
            @endif

        </div>
    </div>



    <div class="form-group row mt-4">
        <div class="col-md-12 ">
            <button type="submit" class="btn btn-block btn-primary">
                INGRESAR
            </button>




        </div>

    </div>
</form>

@endsection