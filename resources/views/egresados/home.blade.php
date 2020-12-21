@extends('layouts.master')

@section('title', 'Inicio')

@section('style')

<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section( 'script' )
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

  <h4 class="mt-3 mb-4"> Bienvenidos a la página de usuario del Sistema de Seguimiento al Egresado de la Escuela
    Profesional de Ingeniería Geológica-Geotecnia de la UNJBG
  </h4>
  <h5 class="mt-3 mb-4 text-secondary">Puede descargar el manual de usuario <a
      href="{{url('assets/pdf/Manual de usuario - egresado_20201221.pdf')}}" data-target="_blank">AQUÍ.</a></h5>


  <h5 class="mt-2 mb-3">Por favor, elija una opción en el menú.</h5>


  <div id="text-center">
    <img id="SSE" width="150" height="150" src="{{url('assets/images/SSE.png')}}">
  </div>
</div>


@stop