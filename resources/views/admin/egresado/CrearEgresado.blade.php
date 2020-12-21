@extends('admin.layouts.master')

@section('title', 'Nuevo egresado')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Agregar egresado','bicon' => 'fa-home','bindex' => 'Egresados'])
@endsection
@section('style')

@stop

@section('content')
<div class="tile">

	@php
	//creamos arreglos asociativos para los select
	$nacionalidad = array(1=>'Peruana', 2=>'Otra');
	$genero = array(1=>'Masculino', 2=>'Femenino');
	$carrera = array(
	0=>'Ingeniería Geológica-Geotecnia',
	);
	@endphp

	<form method="POST" enctype="multipart/form-data" action="{{ route('admin.crearEgresado.submit') }}">
		{{ csrf_field() }}
		<div class="row">
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />


			<div class="col-md-6 col-lg-6 col-12">
				<div class=" form-group row ">
					<div class="col-md-6 col-12">
						<label for="" class="">Matrícula: </label>
						<input class="form-control " type="text" name="matricula" placeholder="Matrícula" required />
					</div>
					<div class="col-md-6 col-12"> <label for="" class="">DNI: </label>
						<input class="form-control " type="text" name="dni" placeholder="número de DNI" required />
					</div>
				</div>
				<div class="form-group"><label for="" class="">Nombre(s): </label>
					<input class="form-control " type="text" name="nombres" placeholder="Nombre(s)" required /></div>
				<div class=" form-group row ">

					<div class="  col-md-6 col-12 "><label for="" class="">Apellido paterno:
						</label>
						<input class="form-control " type="text" name="ap_pa" placeholder="Apellido paterno" required />
					</div>


					<div class="  col-md-6 col-12">
						<label for="" class="">Apellido materno: </label>
						<input class="form-control " type="text" name="ap_ma" placeholder="Apellido materno" required />

					</div>

				</div>
				<div class=" form-group row ">
					<div class="col-md-6 col-12"><label for="" class="">Género: </label>
						<select name="genero" class="form-control">
							@foreach($genero as $idn=>$nombre)
							<option value={{$idn}}>{{$nombre}}</option>
							<!--Tipo de datos enum-->
							@endforeach
						</select></div>
					<div class="col-md-6 col-12"><label for="" class="">Fecha de nacimiento: </label>
						<input class="form-control " type="date" name="fecha_nacimiento"
							placeholder="Fecha de nacimiento" required /></div>
				</div>


				<div class="form-group"><label for="" class="">Nacionalidad: </label>
					<select class="form-control" name="nacionalidad">
						<@foreach($nacionalidad as $idn=>$nombre)
							<option value={{$idn}}>{{$nombre}}</option>
							<!--Tipo de datos enum-->
							@endforeach
					</select></div>
				<div class="form-group"><label for="" class="">Lugar de origen: </label>
					<input class="form-control " type="text" name="lugar_origen" placeholder="Lugar de origen"
						required />
					<input type="hidden" name="habilitado" value="1" placeholder="" /></div>

			</div>
			<!--Datos de preparacion-->
			<div class="col-md-6 col-lg-6 col-12">
				<div class="form-group"><label for="" class="">Carrera: </label>
					<select name="carrera" class="form-control" required>
						@foreach($carrera as $idn=>$nombre)
						<option value="{{$idn}}">{{$nombre}}</option>
						<!--Tipo de datos enum-->
						@endforeach
					</select></div>
				<div class="form-group"><label for="" class="">Generación: </label>
					<input class="form-control " type="text" name="generacion" placeholder="Ejemplo: 2013-2018"
						required />
				</div>
				<div class="form-group"><label for="" class="">Fecha de inicio de estudios: </label>
					<input class="form-control " type="date" name="fecha_inicio"
						placeholder="Fecha de inicio de estudios" required />
				</div>
				<div class="form-group">
					<label for="" class="">Fecha de fin de estudios: </label>
					<input class="form-control " type="date" name="fecha_fin" placeholder="Fecha de fin de estudios"
						required />
				</div>
				<div class="form-group">
					<label for="" class="">Promedio (opcional): </label>
					<input class="form-control " type="text" name="promedio" placeholder="Promedio" /></div>

			</div>

			<div class="container">
				<button for="submit" type="submit" class="btn btn-success btn-block">Guardar</button>
			</div>
		</div>
	</form>
</div>




<!--contenedor-->

@stop