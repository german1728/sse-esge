@extends('admin.layouts.master')

@section('title', 'Editar oferta')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Editar oferta laboral','bicon' => 'fa-home','bindex' => 'Ofertas
laborales'])
@endsection
@section('style')


@stop

@section('script')
<script src="{{ url('js/admin/evento.js') }}"></script>
@stop

@php
$status = array(
0=>'Vacante',
1=>'Ocupada',
2=>'Cancelada'
);

$carrera = array(
0=>'Ingeniería Geológica-Geotecnia',


);
@endphp

@section('content')
<div class="tile">


	<!--Contenido de la pagina-->
	<form method="post" enctype="multipart/form-data" action="{{route('admin.editarOferta.submit')}}">
		{{ csrf_field() }}
		<div class="row ">
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
			<input name="id" type="hidden" value="{{$oferta->id}}" />
			<div class="col-md-6 col-lg-6 col-12">
				<div class=" form-group  ">

					<label for="" class="">Título del empleo: </label>
					<input class="form-control" type="text" name="titulo_empleo" value="{{ $oferta->titulo_empleo }}"
						placeholder="Titulo de empleo" required />
				</div>
				<div class=" form-group  ">
					<label for="" class="">Descripción: </label>
					<input class="form-control" type="text" name="descripcion" value="{{ $oferta->descripcion }}"
						placeholder="Descripción del puesto" required />
				</div>
				<div class=" form-group  ">
					<label for="" class="">Empresa: </label>
					<select class="form-control" name="empresa_id" required>
						<!-- Empresa original de la oferta -->
						<@foreach( $empresas as $empresa ) @if( $oferta->empresa_id == $empresa->id )
							<option value="{{ $empresa->id }}">{{ $empresa->nombre }}</option>
							@endif
							@endforeach
							<!-- Evitar repetir la empresa anterior -->
							<@foreach( $empresas as $empresa ) @if( $oferta->empresa_id != $empresa->id )
								{{ $id = $empresa->id }}
								<option value={{$id}}>{{$empresa->nombre}}</option>
								@endif
								@endforeach
					</select>


				</div>
				<div class=" form-group  ">
					<label for="" class="">Ubicación: </label>
					<input class="form-control" type="text" name="ubicacion" value="{{ $oferta->ubicacion }}"
						placeholder="Ubicación" required />
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-12">

				<div class="form-group">
					<label for="" class="">Carrera: </label>
					<select class="form-control" name="carrera" required>
						<!--Valor original del campo-->
						<option value="{{ $oferta->carrera }}">{{ $carrera[ $oferta->carrera ] }}</option>
						<!-- Evitar repetir el valor anterior -->
						@foreach($carrera as $idn=>$nombre)
						@if( $idn != $oferta->carrera )
						<option value="{{ $idn }}">{{ $nombre }}</option>
						@endif
						@endforeach
					</select>
				</div>
				<div class=" form-group  ">
					<label for="" class="">Experiencia (años): </label>
					<input class="form-control" type="text" name="experiencia" value="{{ $oferta->experiencia }}"
						placeholder="Experiencia requerida" required />
				</div>
				<div class=" form-group  ">
					<label for="" class="">Salario (soles): </label>
					<input class="form-control" type="text" name="salario" value="{{ $oferta->salario }}"
						placeholder="Salario" required />

				</div>
				<div class=" form-group  ">
					<label for="" class="">Status: </label>
					<select class="form-control" name="status" required>
						<option value="{{ $oferta->status }}">{{ $oferta->status }}</option>
						<@foreach( $status as $sts ) @if( $sts !=$oferta->status )
							<option value="{{ $sts }}">{{ $sts }}</option>
							@endif
							@endforeach
					</select>
				</div>
				<div class=" form-group  ">



				</div>

			</div>
		</div>
		<div class="mt-3">
			<button type="submit" class="btn btn-success btn-block">
				Actualizar
			</button>
		</div>



	</form>

</div>
<!--contenedor-->

@stop