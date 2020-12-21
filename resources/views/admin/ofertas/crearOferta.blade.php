@extends('admin.layouts.master')

@section('title', 'Crear oferta')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Crear oferta laboral','bicon' => 'fa-home','bindex' => 'Ofertas
laborales'])
@endsection
@section('style')



@stop

@php
$status = array(
1 => 'Vacante',
2 => 'Ocupada',
3 => 'Cancelada'
);

$carrera = array(
0 => 'Ingeniería Geológica-Geotecnia',

);
@endphp

@section('content')
<div class="tile">
	<!-- contenedor -->


	<form method="POST" enctype="multipart/form-data" action="{{ route('admin.crearOferta.submit') }}">
		{{ csrf_field() }}
		<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

		<div class="row">


			<div class="col-md-6 col-lg-6 col-12">
				<div class=" form-group  ">
					<label for="" class="">Nombre del empleo: </label>
					<input class="form-control" type="text" name="titulo_empleo" placeholder="Nombre del empleo"
						required />
				</div>
				<div class=" form-group  ">
					<label for="" class="">Descripción: </label>
					<input class="form-control" type="text" name="descripcion" placeholder="Descripción" required />
				</div>
				<div class=" form-group  ">
					<label for="" class="">Empresa: </label>
					<select class="form-control" name="empresa_id" required>
						@foreach( $empresas as $empresa )
						{{ $id = $empresa->id }}
						<option value={{$id}}>{{$empresa->nombre}}</option>
						@endforeach
					</select>
				</div>
				<div class=" form-group  ">
					<label for="" class="">Ubicación: </label>
					<input class="form-control" type="text" name="ubicacion" placeholder="Ubicación" required />
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-12">
				<div class=" form-group  ">
					<label for="" class="">Carrera: </label>
					<select class="form-control" name="carrera" required>
						@foreach( $carrera as $idn=>$nombre )
						<option value="{{$idn}}">{{$nombre}}</option>
						@endforeach
					</select>

				</div>
				<div class=" form-group  ">
					<label for="" class="">Experiencia (años): </label>
					<input class="form-control" type="text" name="experiencia" placeholder="Experiencia" required />
				</div>
				<div class=" form-group  ">
					<label for="" class="">Salario (Soles): </label>
					<input class="form-control" type="text" name="salario" placeholder="Salario" required />
				</div>
				<div class=" form-group  ">
					<label for="" class="">Status: </label>
					<select class="form-control" name="status" required>
						<@foreach($status as $idn=>$nombre)
							<option value={{$idn}}>{{$nombre}}</option>
							@endforeach
					</select>
				</div>

			</div>



		</div>


		<div class="">
			<button type="submit" class="btn btn-success btn-block">Guardar</button>
		</div>

	</form>

</div>
<!--contenedor-->
@stop