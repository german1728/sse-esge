@extends('admin.layouts.master')

@section('title', 'index')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Ver egresado','bicon' => 'fa-home','bindex' => 'Egresados'])
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

<div class="row user">

	<div class="col-md-3">
		@include('admin.partials.asideEgresado')
	</div>
	<div class="col-md-9">
		<div class="tile row ">
			<div class="col-12">

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
		</div>
	</div>
</div>












@stop