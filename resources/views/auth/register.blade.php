@extends('layouts.ingreso')

@section('title', 'Registro')

@section('style')

<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop



@section('content')
<div class="container">
    @if(Session::has('message_danger'))
    <div class="alert alert-danger flashmensasse" id="message_alert">
        <em> {!! session('message_danger') !!}</em>
        <button id="hide" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    </div>
    @endif

    <div class="">
        <h5 class="text-center text-white">REGISTRARSE</h5>
    </div>
    <!--div-1-->

    <div class="container">
        <form class="form-horizontal" role="form" method="POST" action="{{ route('crearUsuario.submit') }}">
            {{ csrf_field() }}
            <div class="label text-white">Matricula:*</div>
            <div class="form-group row">

                <div class="input-group col-md-12">

                    <input class="form-control @if ($errors->has('matricula')) is-invalid @endif" type="text"
                        id="matricula" name="egresado_matricula" placeholder="p. ej. 2020-111111"
                        value="{{ old('matricula') }}" required autofocus>
                    @if ($errors->has('matricula'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('correo') }}

                    </span>
                    @endif

                </div>
            </div>


            <div class="label text-white">Correo electrónico:*</div>
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

            <div class="label text-white">Contraseña:*</div>
            <div class="form-group row">

                <div class="input-group col-md-12">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fa fa-lg fa-lock"></i>
                        </div>
                    </div>
                    <input class="form-control @if ($errors->has('passwword')) is-invalid @endif" type="password"
                        id="password" name="password" placeholder="Contraseña" required>

                    @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                        {{ $errors->first('password') }}

                    </span>
                    @endif

                </div>
            </div>

            <div class="label text-white">Confirmar contraseña:*</div>
            <div class="form-group row">

                <div class="input-group col-md-12">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <i class="fa fa-lg fa-lock"></i>
                        </div>
                    </div>
                    <input class="form-control" type="password" id="password" name="password_confirmation"
                        placeholder="Confirmar contraseña" required>


                </div>
            </div>

            <div class="last-label text-warning mt-0 mb-2">* Campos obligatorios</div>

            <div class="container">
                <button type="submit" class="btn btn-primary">Registrarse </button>
                <a href="{{url('/')}}" class="btn btn-danger ml-5"> Cancelar</a>

            </div>
        </form>
    </div>
</div>





@stop