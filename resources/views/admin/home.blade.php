@extends('admin.layouts.master')

@section('title', 'Inicio')

@section('style')

<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section('script')
<script src="{{ url('js/ocultarelemento.js') }}"></script>
@stop

@section('content')

@if(Session::has('message_success'))
<div class="alert alert-success flashmensasse" id="message_alert">
    <em> {!! session('message_success') !!}</em>
    <button id="hide" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
@endif
<div class="tile text-center text-dark">

    <h3 class="text-center">PÁGINA DE INICIO</h3>

    <h4 class="mt-3 mb-3"> Bienvenidos a la página administrador del Sistema de Seguimiento al Egresado de la Escuela
        Profesional de Ingeniería Geológica-Geotecnia de la UNJBG
    </h4>

    <h5 class="mt-4 mb-4 text-secondary">Puede descargar el manual de usuario <a
            href="{{url('assets/pdf/Manual de usuario - administrador_20201221_.pdf')}}" data-target="_blank">AQUÍ.</a>
    </h5>
    <h5 class="mt-2 mb-3">Por favor, elija una opción en el menú.</h5>


    <div id="text-center">
        <img id="SSE" width="150" height="150" src="{{url('assets/images/SSE.png')}}">
    </div>
</div>

@stop