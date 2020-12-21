@extends('admin.layouts.master')

@section('title', 'index')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Ver egresado','bicon' => 'fa-home','bindex' => 'Egresados'])
@endsection
@section('style')


<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section('script')

@stop

@section('content')

<!--inicio contenedor-->

<!-- Muestra un mensaje de alerta en caso de que el usuario no se puede registrar -->
@if(Session::has('message_success'))
<div class="alert alert-success flashmensasse" id="message_alert">
    <em> {!! session('message_success') !!}</em>
    <button id="hide" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
@endif

@if(Session::has('message_danger'))
<div class="alert alert-danger flashmensasse" id="message_alert">
    <em> {!! session('message_danger') !!}</em>
    <button id="hide" type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
</div>
@endif
<div class="row user">

    <div class="col-md-3">
        @include('admin.partials.asideEgresado')
    </div>
    <div class="col-md-9">
        <div class="tile row ">
            <div class="col-md-7 ">

                <!--inicio div-2-2-->
                <div class="text-left pl-3">
                    <div class=" align-items-center d-flex  pb-3">
                        <!--inicio contenedor-info-->

                        <!--inicio icono-->
                        <img src="{{ url('assets/images/user0.png') }}" alt="" class="iconos" title="Nombre">

                        <!--fin icono-->
                        <div class="ml-3 mt-2 ">
                            <!--inicio info-->
                            <h5> {{ $egresado->nombres }} {{ $egresado->ap_paterno }}
                                {{ $egresado->ap_materno }} </h5>
                        </div>
                        <!--info-->
                    </div>
                    <!--contenedor-info-->
                    <div class="align-items-center d-flex pb-3">
                        <!--inicio contenedor-info-->
                        <div class="icono-perfil">
                            <!--inicio icono-->
                            <img src="{{ url('assets/images/birthday.png') }}" alt="" class="iconos"
                                title="Fecha de nacimiento">
                        </div>
                        <!--fin icono-->
                        <div class="ml-3 mt-2">
                            <!--inicio info-->
                            <h5> {{ $egresado->fecha_nacimiento }} </h5>
                        </div>
                        <!--info-->
                    </div>
                    <!--contenedor-info-->

                    <div class="align-items-center d-flex pb-3">
                        <!--inicio contenedor-info-->
                        <div class="icono-perfil">
                            <!--inicio icono-->
                            <img src="{{ url('assets/images/address.png') }}" alt="" class="iconos"
                                title="Lugar de origen">
                        </div>
                        <!--fin icono-->
                        <div class="ml-3 mt-2">
                            <!--inicio info-->
                            <h5> {{ $egresado->lugar_origen }}</h5>
                        </div>
                        <!--info-->
                    </div>
                    <!--contenedor-info-->

                    <div class="align-items-center d-flex pb-3">
                        <!--inicio contenedor-info-->
                        <div class="icono-perfil">
                            <!--inicio icono-->
                            <img src="{{ url( 'assets/images/email.png') }}" alt="" class="iconos"
                                title="Lugar de origen">
                        </div>
                        <!--fin icono-->
                        <div class="ml-3 mt-2">
                            <!--inicio info-->
                            <h5>
                                @if( $egresado->usuario == NULL)
                                Correo sin registrar
                                @else {{$egresado->usuario->correo}}
                                @endif

                            </h5>
                        </div>
                        <!--info-->
                    </div>
                    <!--contenedor-info-->

                    <div>
                        @if( $egresado->direccion_actual == NULL )
                        <div class="align-items-center d-flex pb-3">
                            <h5>Dirección no registrada
                            </h5>

                        </div>
                        @else
                        <div class="align-items-center d-flex pb-3">
                            <!--inicio contenedor-info-->
                            <div class="icono-perfil">
                                <!--inicio icono-->
                                <img src="{{ url('assets/images/home0.png') }}" alt="" class="iconos"
                                    title="Direccion actual">
                            </div>
                            <!--fin icono-->
                            <div class="ml-3 mt-2">
                                <!--inicio info-->
                                <h5>{{ $egresado->direccion_actual }}</h5>
                            </div>
                            <!--info-->



                        </div>
                        <!--contenedor-info-->
                        @endif

                    </div>

                    <div>
                        @if( $egresado->telefono == NULL )
                        <div class="align-items-center d-flex pb-3">
                            <!--inicio contenedor-info-->
                            <div class="icono-perfil">
                                <!--inicio icono-->
                                <img src="{{ url('assets/images/phone.png') }}" alt="" class="iconos"
                                    title="Numero telefónico">
                            </div>

                            <h5>Teléfono no registrado</h5>


                        </div>
                        @else
                        <div class="align-items-center d-flex pb-3">
                            <!--inicio contenedor-info-->
                            <div class="icono-perfil">
                                <!--inicio icono-->
                                <img src="{{ url('assets/images/phone.png') }}" alt="" class="iconos"
                                    title="Numero telefónico">
                            </div>
                            <!--fin icono-->
                            <div class="ml-3 mt-2 ">
                                <!--inicio info-->
                                <h5>{{ $egresado->telefono }}</h5>
                            </div>
                            <!--info-->


                        </div>
                        <!--contenedor-info-->
                        @endif

                    </div>

                    <div class="mt-3">
                        <h5 class="d-flex align-items-center">
                            <li class="fa fa-file-pdf-o fa-2x text-secondary pr-3"></li>&nbspCurriculum Vitae (PDF)
                            :&nbsp&nbsp&nbsp
                            @if($egresado->cv_url== NULL)


                            @else
                            <a href=" {{url('storage/'.$egresado->cv_url)}} " target=" _blank"><button
                                    class="btn btn-secondary" type="button">Abrir
                                    archivo</button></a>
                            @endif
                        </h5>


                    </div>



                </div>
            </div>
            <div class="col-md-4  ml-3 mt-3 container ">
                <div class="align-items-center ">
                    <div class="d-flex justify-content-center">
                        @if($egresado->imagen_url)
                        <img width="200" src="{{url($egresado->imagen_url)}}">
                        @else
                        <img width="200" src="{{url('assets/images/egresados/default.png')}}" alt="user-picture"
                            class="img-thumbnail img">
                        @endif
                    </div>
                    <div class="d-flex justify-content-center">
                        <h5 class="mt-2">Foto de perfil (1x1)</h5>
                    </div>




                </div>
            </div>
        </div>
    </div>



</div>




@stop