@extends('layouts.master')

@section('title', 'Mis estudios')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Estudios realizados','bicon' => 'fa-home','bindex' => 'Perfil'])
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
<div class="">
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



	<div class="tile col-12">


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
			@else
			<div class="form-group-estudios">
				<label for="ffinal">Forma titulación:</label>
				<label>{{ $preparacion->forma_titulacion }}</label>
				<a href="#" class="ml-3" onclick="showElement()">Actualizar</a>
			</div>
			@endif

			<!-- Si el egresado cambia de "No titulado" por alguna forma de titulacion -->
			<div id="hide_element" style="display:none;">
				<form method="POST" action="{{url('perfil/guardarFormacion')}}">
					{{ csrf_field() }}
					<div class="d-flex flex-row">
						<div class="form-group-estudios">
							<label> Forma de titulación:</label>
						</div>
						<div class="animated-radio-button pt-2">
							<label class="">
								<input type="radio" name="titulacion" value="Tesis"><span
									class="label-text">Tesis</span>
							</label>
							<label class="ml-3">
								<input type="radio" name="titulacion" value="Artículo científico"><span
									class="label-text">Artículo científico</span>
							</label>
							<label class="ml-3 ">
								<input type="radio" name="titulacion" value="No titulado" checked><span
									class="label-text">No
									titulado</span>
							</label>
						</div>


					</div>

					<div class="form-group-estudios">
						<label for="ftitulacion">Fecha de titulación:</label>
						{{-- <input type="text" name="ftitulacion" id="ftitulacion" class="form-control"> --}}
						{!! Form::date( 'ftitulacion', \Carbon\Carbon::now() ) !!}
					</div>
					<div class="form-group text-center">
						<button type="submit" class="btn btn-success btn-lg">Guardar</button>
					</div>
				</form>
			</div>

			@else
			<form method="POST" action="{{url('perfil/guardarFormacion')}}">
				{{ csrf_field() }}

				@if( $preparacion->forma_titulacion == NULL )
				<div class="d-flex flex-row">
					<div class="form-group-estudios">
						<label> Forma de titulación:</label>
					</div>
					<div class="animated-radio-button pt-2">
						<label class="">
							<input type="radio" name="titulacion" value="Tesis"><span class="label-text">Tesis</span>
						</label>
						<label class="ml-3">
							<input type="radio" name="titulacion" value="Artículo científico"><span
								class="label-text">Artículo científico</span>
						</label>
						<label class="ml-3 ">
							<input type="radio" name="titulacion" value="No titulado" checked><span
								class="label-text">No
								titulado</span>
						</label>
					</div>


				</div>

				<div class="form-group">
					<label for="ftitulacion">Fecha de titulación:</label>
					{{-- <input type="text" name="ftitulacion" id="ftitulacion" class="form-control"> --}}
					{!! Form::date( 'ftitulacion', \Carbon\Carbon::now() ) !!}
				</div>
				@endif

				<div class="form-group text-center">
					<button type="submit" class="btn btn-success btn-lg">Guardar</button>
				</div>
			</form>
			@endif

			<div class="text-left">
				<br>


				<div class="form-group-estudios">
					<h5 for="maestria">Maestría(s)</h5>
					<div class="">
						<!--inicio contenedor-info-->

						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#agregarMaestria">
							Agregar maestría
						</button>
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

						<button type="button" class="btn btn-info" data-toggle="modal" data-target="#agregarDoctorado">
							Agregar doctorado
						</button>
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
	<!-- Modal para agregar DOCTORADO -->
	<div class="modal fade" name="div-doctorado" id="agregarDoctorado" tabindex="-1" role="dialog"
		aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Agregar doctorado</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="{{ url('perfil/guardardoctorado') }}" method="post">
					<div class="modal-body">
						<div class="d-flex justify-content-center">
							<div class="text-danger">*</div>Una vez agregado no podrá ser eliminado ni modificado.
						</div>
						<div class="container d-flex justify-content-center">
							<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

							<input type="text" name="agregardoctorado" id="agregardoctorado" class="form-control"
								placeholder="Titulo del doctorado" required />

						</div>

						<div class="container  justify-content-center mt-3 col-md-6 col-12">
							<label>Obtenido(año)</label>&nbsp&nbsp
							<select name="anio_obtencion" class="form-control" required />

							@for ($year = (int)date('Y'); 1990 <= $year ; $year--) <option value="{{$year}}">{{$year}}
								</option>

								@endfor

								</select>


						</div>

					</div>
					<div class="modal-footer">

						<button type="submit" class="btn btn-success">Guardar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					</div>
				</form>


			</div>
		</div>
	</div>
	<!-- end Modal para agregar DOCTORADO -->


	<!-- Modal para agregar MAESTRIA -->
	<div class="modal fade" tabindex="-1" role="dialog" id="agregarMaestria">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title">
						<li class="fa fa-add "></li>Agregar maestría
					</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form action="{{ url('perfil/guardarmaestria') }}" method="post">
					<div class="modal-body">
						<div class="d-flex justify-content-center">
							<div class="text-danger">*</div>Una vez agregado no podrá ser eliminado ni modificado.
						</div>
						<div class=" d-flex justify-content-center">
							<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

							<input type="text" name="agregarmaestria" id="agregarmaestria" class="form-control"
								placeholder="Titulo de la maestría" required /><br>
						</div>
						<div class="container  justify-content-center mt-3 col-md-6 col-12">
							<label>Obtenido (año)</label>&nbsp&nbsp&nbsp

							<select name="anio_obtencion1" class="form-control" required />
							@for ($year = (int)date('Y'); 1990 <= $year ; $year--) <option value="{{$year}}">{{$year}}
								</option>

								@endfor


								</select>
						</div>

					</div>
					<div class="modal-footer">

						<button type="submit" class="btn btn-success">Guardar</button>
						<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
					</div>
			</div>
		</div>
	</div>



	@stop
	@section('script')

	<script type="text/javascript" src="{{ url('js/plugins/bootstrap-datepicker.min.js') }}">
	</script>

	@endsection