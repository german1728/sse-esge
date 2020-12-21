@extends('layouts.master')

@section('title', 'Ofertas laborales')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Listado de ofertas laborales','bicon' => 'fa-home','bindex' => 'Ofertas
laborales'])
@endsection
@section('style')
<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">
{{-- <link href="{{ url('css/modal.css') }}" rel="stylesheet"> --}}


<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section( 'script' )

<script src="{{ url('js/ofertas.js') }}"></script>
<script type="text/javascript">
	var APP_URL = {!! json_encode(url('/ofertas')) !!}
</script>
@stop

@section('content')
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

<div class="tile">
	<!--contenedor-->




	<!--div-1-->
	<!-- Buscador -->
	<div class="d-flex justify-content-center ">
		<div class="buscador_ofertas">
			{!! Form::open(['url' => 'ofertas', 'method' => 'GET', 'role' => 'search']) !!}
			{!! Form::text('q', null, ['type' => 'search', 'name' => 'q', 'placeholder' => 'Buscar ofertas']) !!}
			{!! Form::close() !!}
		</div>

	</div>
	<div class="d-flex justify-content-center se-encontraron mt-2 ">

		<p>Se encontraron {{ $ofertas->total() }} ofertas</p>

	</div>
	<!-- Resultados -->

	<div class="table table-responsive text-center">
		<!--div-4-->
		<table class="table table-bordered">
			<thead class="thead-dark">
				<tr>
					<th>Fecha de publicación</th>
					<th>Título del empleo</th>
					<th>Empresa</th>
					<th>Ubicación</th>
					<th>Acciones</th>
				</tr>
			</thead>
			<tbody>
				@foreach($ofertas as $oferta)
				<tr data-oferta="{{ $oferta }}" data-empresa="{{ $oferta->empresa }}"
					data-contacto="{{ $oferta->empresa->contacto }}">
					<td> {{ $oferta->created_at->diffForHumans() }} </td>
					<td>{{ $oferta->titulo_empleo }}</td>
					<td><a href="#datosEmpresa" data-toggle="modal"
							class="btn-empresa">{{ $oferta->empresa->nombre }}</a></td>
					<td class="text-uppercase">{{ $oferta->ubicacion }}</td>
					<td><button type="button" class="btn btn-info btn-sm ml-1" data-toggle="modal"
							data-target="#detalleOferta" data-empresa="{{ $oferta->empresa }}"
							data-contacto="{{ $oferta->empresa->contacto }}" data-oferta="{{ $oferta}}">
							+ Detalles
						</button></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
	<!--div-4-->
	<!-- Paginación -->

	<div class="d-flex justify-content-center">
		<?php if (isset($_GET['q'])){ ?>
		{!! $ofertas->appends(['q' => $_GET["q"]])->render("pagination::bootstrap-4") !!}
		<?php }else{ ?>
		{!! $ofertas->render("pagination::bootstrap-4") !!}
		<?php } ?>
	</div>


</div>
<!--contenedor-->
<div class="modal fade" id="datosEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Datos de la empresa </h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body ">
				<div class="container">
					<div class="mb-2">
						<h5>Nombre o razón social: </h5>
						<div class="h6 font-weight-normal" id="e_nombre"></div>
					</div>
					<div class="mb-2">
						<h5>Dirección: </h5>
						<div class="h6 font-weight-normal" id="e_direccion"></div>
					</div>
					<div class="mb-2">
						<h5>Teléfono: </h5>
						<div class="h6 font-weight-normal" id="e_telefono"></div>
					</div>
					<div class="mb-2">
						<h5>Correo: </h5>
						<div class="h6 font-weight-normal" id="e_correo"></div>
					</div>
					<div class="mb-2">
						<h5>Contacto: </h5>
						<div class="h6 font-weight-normal" id="e_contacto"></div>
					</div>

					<div class="mb-2">
						<h5>Puesto: </h5>
						<div class="h6 font-weight-normal" id="e_puesto"></div>
					</div>



				</div>
				<!--parte-2-->
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

			</div>
		</div>
	</div>
</div>


<!-- div-moda-->
<div class="modal fade" id="detalleOferta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detalles de la oferta laboral
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<h5 class="descripcion mb-2 text-center" id="oferta_puesto"></h5>

				<div class="mt-1">
					<h6>Nombre de la empresa:</h6>
					<p id="oferta_empresa"></p>
					<h6>Descripcion del empleo:</h6>
					<p id="oferta_descripcion"></p>
					<h6>Contacto:</h6>
					<span class="text-uppercase" id="nombre_contacto"> </span><br>
					<span class="text-uppercase" id="puesto_contacto"> </span><br>
					<span id="correo_contacto"> </span><br>
					<span id="numero_contacto"> </span><br><br>

					<h6> SOLICITA: </h6>

					<span id="oferta_carrera"></span><br>
					<span id="oferta_experiencia"></span><br>
					<span id="oferta_salario"></span><br>
					<span>Ubicación: </span></span>
					<span class="text-uppercase" id="oferta_ubicacion"> </span><br><br>


					<h6> Recomendaciones: </h6>
					<span class="text-uppercase" id="recomendaciones_oferta"> </span>

				</div>



			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

			</div>
		</div>
	</div>
</div>

@stop