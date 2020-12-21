@extends('layouts.master')

@section('title', 'Ofertas laborales')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Información de la empresa','bicon' => 'fa-home','bindex' => 'Directorio
de empresas / Empresa'])
@endsection
@section('style')
<link href="{{ url('css/datosEmpresa.css') }}" rel="stylesheet">
<link href="{{ url('css/modal.css') }}" rel="stylesheet">

<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">
@stop

@php
$carrera = array(
0=>'Ingeniería Geológica-Geotecnia',

);
@endphp

@section('content')
<div class="row user">
	<div class="col-md-3">
		@include('partials.asideEmpresa')
	</div>
	<div class="col-md-9">
		<div class="tile row ">
			<div class="container text-center">
				<!-- Resultados -->
				@if( $totalOferta->total > 0 )
				<div class="se-encontraron">
					<p>Se encontraron {{ $totalOferta->total }} ofertas laborales de esta empresa</p>
				</div>
				<div class="table table-responsive">
					<!--div-4-->
					<table class="table table-bordered">
						<thead class="thead-dark">
							<tr>
								<th>Título del empleo</th>
								<th>Descripción</th>
								<th>Ubicación</th>
								<th>Carrera</th>
								<th>Salario</th>
								<th>Status</th>
							</tr>
						</thead>
						<tbody>
							@foreach($ofertas as $oferta)
							<tr>
								<td> {{ $oferta->titulo_empleo }} </td>
								<td>{{ $oferta->descripcion }}</td>
								<td class="text-uppercase">{{ $oferta->ubicacion }}</td>
								<td>{{ $carrera[ $oferta->carrera ] }}</td>
								<td>S/ {{ $oferta->salario }}.00 </td>
								<td>{{ $oferta->status }}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<!-- Paginación -->
					<div class="d-flex justify-content-center">
						{{ $ofertas->appends( $_GET )->render("pagination::bootstrap-4")}}
					</div>

					<!--div-5-->
				</div>
				<!--div-4-->
				@else
				<p>No se encontraron ofertas laborales para esta empresa</p>
				@endif
			</div>
		</div>
	</div>
</div>


@stop