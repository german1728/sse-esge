@extends('admin.layouts.master')

@section('title', 'Cambiar contraseña')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Cambiar contraseña','bicon' => 'fa-home','bindex' => 'Configuraciones'])
@endsection
@section('style')

<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section('script')
<script src="{{ url('js/ocultarelemento.js') }}"></script>
@stop

@section('content')

@if(Session::has('message_danger'))
<div class="alert alert-danger flashmensasse" id="message_alert">
    <em> {!! session('message_danger') !!}</em>
    <button id="hide" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
@endif

<!-- Muestra un mensaje de alerta en caso de que el usuario no se puede registrar -->

<!--div-1-->
<div class="d-flex justify-content-center">
    <div class="tile col-lg-6 col-md-8 col-12">
        <div class="container ">
            <form class="" role="form" method="POST" action="{{ route( 'passrwordconfirmar.submit' ) }}">
                {{ csrf_field() }}
                <div class="">
                    <div class="form-group{{ $errors->has( 'passwordold' ) ? ' has-error' : '' }}">
                        <label for="password" class="col-md-4 control-label">Contraseña actual: </label>

                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" name="passwordold" required
                                autofocus>
                            @if( $errors->has( 'passwordold' ) )
                            <span class="help-block">
                                <strong>{{ $errors->first( 'passwordold' ) }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has( 'password' ) ? ' has-error' : '' }}">
                        <label for="password" class="col-md-12 control-label">Contraseña nueva: </label>
                        <div class="col-md-12">
                            <input id="password" type="password" class="form-control" name="password" required>
                            @if( $errors->has( 'passwordold' ) )
                            <span class="help-block">
                                <strong>{{ $errors->first( 'passwordold' ) }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="password-confirm" class="col-md-12 control-label">Confirmar contraseña nueva:
                        </label>
                        <div class="col-md-12">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" required>
                        </div>
                    </div>
                </div>
                <div class="col-md-12 d-flex justify-content-center">
                    <button type="submit" class="btn btn-success mr-2">Confirmar</button>

                    <a href="{{url('admin/home')}}" class="btn btn-danger ml-2">Cancelar</a>

                </div>
            </form>







        </div>
    </div>

</div>

<!--contenedor-->
@stop