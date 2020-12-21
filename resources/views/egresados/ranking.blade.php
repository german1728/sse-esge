@extends('layouts.master')

@section('title', 'Ranking de empresas')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Listado de empresas por calificación','bicon' => 'fa-home','bindex' =>
'Ranking de empresas'])
@endsection
@section('style')
<link href="{{ url('css/ranking.css') }}" rel="stylesheet">

@stop

@section('script')
<script src="{{ url('js/ranking.js') }}"></script>
@stop

@section('content')
<div class="tile">



	<div class="d-flex justify-content-center">
		<div class="search">
			{!! Form::open(['url' => 'ranking', 'method' => 'GET', 'role' => 'search']) !!}
			{!! Form::text('q', null, ['type' => 'search', 'name' => 'q', 'placeholder' => 'Buscar']) !!}
			{!! Form::close() !!}
		</div>

	</div>
	<div class="d-flex justify-content-center se-encontraron mt-2">

		<p>Se encontraron {{ $empresas->total() }} resultados</p>

	</div>
	<div class="div-4">
		<!--div-4-->
		<div class="table table-responsive">
			<!--div-4-1-->
			<table class="table table-bordered text-center">
				<thead class="thead-dark">
					<tr>
						<th>Lugar</th>
						<th>Calificación</th>
						<th>Nombre de la empresa</th>
						<th>Ubicación</th>
						<th>Giro de la empresa</th>
					</tr>
				</thead>
				<tbody>
					@foreach($empresas as $indexKey => $empresa)
					<tr data-empresa="{{ $empresa }}" data-contacto="{{ $empresa->contacto }}">
						@if ( Request::get('page') )
						@if ( Request::get('page') == 1 and $indexKey == 0 )
						<td><img src="{{ url('assets/images/trofeo.png') }}"></td>
						@else
						<td class="text_red"> {{ ($indexKey + 1) + ((Request::get('page')-1) * 10) }} </td>
						@endif
						@elseif ( $indexKey == 0 )
						<td><img src="{{ url('assets/images/trofeo.png') }}"></td>
						@else
						<td class="text_red">{{ $indexKey + 1 }}</td>
						@endif

						<!-- <td class="text_red">{{ $indexKey + 1 }}</td> -->
						<td>
							<!--	{{ round( $empresa->calif ) }} -->
							@for( $i = 1; $i <= 5; $i++ ) @if( $i <=round( $empresa->calif ) )
								<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
								@else
								<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
								@endif
								@endfor
						</td>
						<td><a href="#datosEmpresa" data-toggle="modal" data-target="#datosEmpresa"
								class="btn-empresa">{{ $empresa->nombre }}</a>
						<td>{{ $empresa->ciudad . ', ' . $empresa->departamento }}</td>
						<td>{{ $empresa->giro }}</td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<!--div-4-1-->
	</div>
	<!-- Paginación -->
	<div class="d-flex justify-content-center">
		<?php if (isset($_GET['q'])){ ?>
		{!! $empresas->appends(['q' => $_GET["q"]])->render("pagination::bootstrap-4") !!}
		<?php }else{ ?>
		{!! $empresas->render("pagination::bootstrap-4") !!}
		<?php } ?>
	</div>





	<!--div-5-->
</div>
<!--contenedor-->

<div class="modal fade" id="datosEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Datos de empresa</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('directorio/empresa') }}" method="get">
				<div class="modal-body">

					<div class="container">
						<!--parte-2-->
						<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

						<div class="descripcion" id="id"></div>

						<div class="container ">
							<!--parte-2-->
							<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

							<div class="descripcion" id="id"></div>

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
					<div class="modal-footer mb-0">

						<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

					</div>
					<!--parte-3-->
			</form>


		</div>
	</div>
</div>

@stop