@extends('admin.layouts.master')

@section('title', 'index')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Ver egresado','bicon' => 'fa-home','bindex' => 'Egresados'])
@endsection
@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
{{-- <link href="{{ url('css/modal.css') }}" rel="stylesheet"> --}}
<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section('script')
<script src="{{ url('js/estudiosRealizados.js') }}"></script>
<script src="{{ url('js/ocultarelemento.js') }}"></script>
@stop

@php
$carrera = array(
0 => 'Ingeniería Geológica-Geotecnia'

);

$maestria_titulacion = array(
0 => 'No',
1 => 'Si',
);
@endphp

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

<div class="row user">

	<div class="col-md-3">
		@include('admin.partials.asideEgresado')
	</div>
	<div class="col-md-9">
		<div class="tile row ">

			<div class="column container">
				<div class="form-group-estudios">
					<label for="Carrera">Carrera:</label>
					<label>{{ $carrera[ $preparacion->carrera ] }}</label>
				</div>

				<div class="form-group-estudios">
					<label for="finicio">Fecha de inicio de estudios:</label>
					<label>{{ $preparacion->fecha_inicio }}</label>
				</div>

				<div class="form-group-estudios">
					<label for="ffinal">Fecha de fin de estudios:</label>
					<label>{{ $preparacion->fecha_fin }}</label>
				</div>

				<div class="form-group-estudios">
					<label for="ffinal">Promedio general:</label>
					<label>{{ $preparacion->promedio }}</label>
				</div>

				<!-- Si el usuario ya selecciono su forma de titulacion -->
				@if( $preparacion->forma_titulacion != NULL )
				@if( $preparacion->forma_titulacion != "No titulado" )
				<div class="form-group-estudios">
					<label for="ffinal">Forma de titulación:</label>
					<label>{{ $preparacion->forma_titulacion }}</label>
				</div>

				<div class="form-group-estudios">
					<label for="ffinal">Fecha de titulación:</label>
					<label>{{ $preparacion->fecha_titulo }}</label>
				</div>
				<!-- Si el estatus de titulacion del egresado es "No titulado" -->

				@endif

				<!-- Si el egresado cambia de "No titulado" por alguna forma de titulacion -->


				@else

				@endif

				<div class="text-left">
					<br>


					<div class="form-group-estudios">
						<h5 for="maestria">Maestría(s)</h5>
						<div class="">
							<!--inicio contenedor-info-->


						</div>
						<div class="table-responsive">
							@if( $preparacion->maestrias->count() > 0)
							<table class="table">
								<thead>
									<tr>
										<th>Descripción</th>
										<th class="text-center">Año de obtención</th>
									</tr>
								</thead>
								@foreach( $preparacion->maestrias as $maestria )
								<tbody>
									<tr>
										<td style="width: 70%">{{ $maestria->descripcion }}</td>
										<td class="text-center" style="width: 30%">{{ $maestria->anio_obtencion}}</td>
									</tr>
								</tbody>
								@endforeach
							</table>
							@else
							<label>No tiene maestrías registradas</label>
							@endif</div>

					</div>


					<!--contenedor-info-->

					<div class="form-group-estudios">
						<h5 for="doctorado">Doctorado(s)</h5>
						<div class="">
							<!--inicio contenedor-info-->


						</div>
						<div class="table-responsive">
							@if( $preparacion->doctorados->count() > 0)
							<table class="table">
								<thead>
									<tr>
										<th>Descripción</th>
										<th class="text-center">Año de obtención</th>
									</tr>
								</thead>
								@foreach( $preparacion->doctorados as $doctorado )
								<tbody>
									<tr>
										<td style="width: 70%">{{ $doctorado->descripcion }}</td>
										<td class="text-center" style="width: 30%">{{ $doctorado->anio_obtencion }}</td>
									</tr>
								</tbody>
								@endforeach
							</table>
							@else
							<label>No tiene doctorados registrados</label>
							@endif</div>

					</div>

					<!--contenedor-info-->
				</div>
			</div>
		</div>
	</div>
</div>






@stop
@section('script')

<script type="text/javascript" src="{{ url('js/plugins/bootstrap-datepicker.min.js') }}">
</script>

@endsection