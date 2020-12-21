@extends('layouts.master')

@section('title', 'Mis empleos')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Trayectoria laboral','bicon' => 'fa-home','bindex' => 'Perfil'])
@endsection

@section('style')
{{-- <link href="{{ url('css/perfil.css') }}" rel="stylesheet"> --}}
<link href="{{ url('css/modal.css') }}" rel="stylesheet">
{{-- <link href="{{ url('css/table.css') }}" rel="stylesheet"> --}}
<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section('script')
<script src="{{ url('js/estudiosRealizados.js') }}"></script>
<script src="{{ url('js/ocultarelemento.js') }}"></script>
@stop

@section('content')

<!--inicio contenedor-->
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
	<!--inicio div-2-->
	<div class="container mb-2">
		<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#agregarEmpleo">
			Agregar empleo
		</button>
	</div>


	<div class="container">
		<div class="d-flex justify-content-left">
			@if( $empleos->count() == 0 )
			<label>No tiene empleos registrados</label>
			@endif
		</div>
	</div>
	<div class="container col-12">

		<div class="table table-responsive">
			<div class="d-flex justify-content-left">@if( $empleos->count() > 0 )
				<label>Tiene {{ $empleos->count() }} empleos registrados</label>
			</div>

			<table class="table table-bordered">
				<thead class="thead-dark">
					<tr>
						<th>Empresa</th>
						<th>Funciones</th>
						<th>Antig&#252;edad</th>
						<th>Puesto inicial</th>
						<th>Puesto final</th>
					</tr>
				</thead>
				<tbody>
					@foreach( $empleos as $empleo )
					<tr>
						<td class="text-uppercase">{{ $empleo->empresa }} </td>
						<td>{{ $empleo->funciones }}</td>
						<td>{{ $empleo->antiguedad }} {{ $empleo->unidad_tiempo }}</td>
						<td class="text-uppercase">{{ $empleo->puesto_inicial }}</td>
						<td class="text-uppercase">{{ $empleo->puesto_final }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
			@endif
		</div>
	</div>


</div>




{{-- modal agregar empleo --}}
<div class="modal fade" id="agregarEmpleo" tabindex="-1" role="dialog" aria-labelledby="agregarEmpleo"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Agregar empleo</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('perfil/guardarempleo') }}" method="post" class="agregarEmpleoForm">
				<div class="modal-body">
					<div class="d-flex justify-content-center mb-1">
						<div class="text-danger">*</div>Una vez agregado no podrá ser eliminado ni modificado.
					</div>
					<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

					<div class="form-group">
						<h6>Nombre de la empresa</h6>
						<input type="text" name="empresa" id="empresa" class="form-control"
							placeholder="Nombre de la empresa" autofocus required>
					</div>

					<div class="form-group">
						<h6>Puesto inicial</h6>
						<input type="text" name="puestoi" id="puestoi" class="form-control" placeholder="Puesto inicial"
							required>
					</div>

					<div class="form-group">
						<h6>Puesto final</h6>
						<input type="text" name="puestof" id="puestof" class="form-control" placeholder="Puesto final"
							required>
					</div>

					<div class="form-group">
						<h6>Funciones</h6>
						<input type="text" name="funciones" id="funciones" class="form-control" placeholder="Funciones"
							required>
					</div>

					<div class="form-group">
						<h6>Antig&#252;edad</h6>
						<input type="text" name="antiguedad" id="antiguedad" class="form-control"
							placeholder="Antig&#252;edad" pattern="[0-9]{1,2}" required>
					</div>
					<div class="">
						<input type="radio" name="antiguedadunidad" id="meses" value="meses" checked>
						<label for="meses" class="label-radio"> Meses&nbsp&nbsp</label>

						<input type="radio" name="antiguedadunidad" id="anios" value="años">
						<label for="anios" class="label-radio"> Años</label>
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


@stop