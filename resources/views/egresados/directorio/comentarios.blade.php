@extends('layouts.master')

@section('title', 'Comentarios')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Información de la empresa','bicon' => 'fa-home','bindex' => 'Directorio
de empresas / Empresa'])
@endsection
@section('style')
<link href="{{ url('css/datosEmpresa.css') }}" rel="stylesheet">
<link href="{{ url('css/ofertas.css') }}" rel="stylesheet">

@stop

@section('content')
<div class="row user">
	<div class="col-md-3">
		@include('partials.asideEmpresa')
	</div>
	<div class="col-md-9">
		<div class="tile row ">
			<div class="container text-center">
				@if( $comentario->total > 0 )
				<div class="text-center">
					<h5>{{ $comentario->empresa->nombre }}</h5>
					<div>
						<h2>{{ round( $comentario->promedio ) }}</h2>
						@for( $i = 1; $i <= 5; $i++ ) @if( $i <=round( $comentario->promedio ) )
							<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
							@else
							<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
							@endif
							@endfor
							<h6 class="mb-4">{{ $comentario->total }} evaluaciones</h6>
					</div>
				</div>


				@foreach( $ranking as $rank )
				<div class="comentario_list mt-1">
					@for( $i = 1; $i <= 5; $i++ ) @if( $i <=round( $rank->calificacion ) )
						<img src="{{ url('assets/images/empresa_estrella_full.png') }}">
						@else
						<img src="{{ url('assets/images/empresa_estrella_empty.png') }}">
						@endif
						@endfor
						<label class="fecha_comentario">{{ $rank->created_at->diffForHumans() }}</label>
						<div class="mb-3">{{ $rank->comentario }}</div>
				</div>
				@endforeach

				<!-- Paginación -->
				<div class="d-flex justify-content-center">
					{{ $ranking->appends( $_GET )->render("pagination::bootstrap-4")}}
				</div>

				<!--div-5-->
				@else
				<p>No se encontraron resultados para esta empresa</p>
				@endif
			</div>

		</div>
	</div>
</div>

< @stop