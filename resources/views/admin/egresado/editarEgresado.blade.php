@extends('admin.layouts.master')

@section('title', 'Editar egresados')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Editar egresado','bicon' => 'fa-home','bindex' => 'Egresados'])
@endsection
@section('style')

<!-- <link href="{{ url('css/ranking.css') }}" rel="stylesheet"> -->

@stop
@section('content')
<div class="tile">
	<!-- contenedor -->

	@php
	//creamos arreglos asociativos para los select
	$nacionalidad = array(1=>'Peruana', 2=>'Otra');
	$genero = array(1=>'Masculino', 2=>'Femenino');
	$carrera = array(
	0=>'Ingeniería Geológica-Geotecnia',
	);
	@endphp
	<form method="post" action="{{route('admin.editarEgresado.submit')}}">
		<div class="row">


			{{ csrf_field() }}
			<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

			<div class="col-md-6 col-lg-6 col-12">
				<div class=" form-group row ">
					<div class="col-md-6 col-12">
						<label for="" class="">Matrícula: </label>
						<input class="form-control " type="text" name="matricula" value="{{$egresado->matricula}}"
							placeholder="Matrícula" required disabled />
					</div>
					<div class="col-md-6 col-12"> <label for="" class="">DNI: </label>
						<input class="form-control " type="text" name="dni" value="{{$egresado->dni}}"
							placeholder="número de DNI" required /></div>
				</div>
				<div class="form-group"><label for="" class="">Nombre(s): </label>
					<input class="form-control " type="text" name="nombres" value="{{$egresado->nombres}}"
						placeholder="Nombre(s)" required /></div>
				<div class=" form-group row ">

					<div class="  col-md-6 col-12 "><label for="" class="">Apellido paterno:
						</label>
						<input class="form-control " type="text" name="ap_pa" value="{{$egresado->ap_paterno}}"
							placeholder="Apellido paterno" required /></div>


					<div class="  col-md-6 col-12">
						<label for="" class="">Apellido materno: </label>
						<input class="form-control " type="text" name="ap_ma" value="{{$egresado->ap_materno}}"
							placeholder="Apellido materno" required />

					</div>

				</div>
				<div class=" form-group row ">
					<div class="col-md-6 col-12">
						<label for="" class="">Género: </label>
						<select class="form-control " name="genero">
							@foreach($genero as $idn=>$nombre)
							@if( $nombre == $egresado->genero)
							<option value={{$idn}} selected>{{$nombre}}</option>
							<!--Tipo de datos enum-->
							@else
							<option value={{$idn}}>{{$nombre}}</option>
							@endif
							@endforeach
						</select></div>
					<div class="col-md-6 col-12"><label for="" class="">Fecha de nacimiento: </label>
						<input class="form-control " type="date" name="fecha_nacimiento"
							value="{{$egresado->fecha_nacimiento}}" placeholder="Fecha de nacimiento" required /></div>
				</div>


				<div class="form-group"><label for="" class="">Nacionalidad: </label>
					<select class="form-control " name="nacionalidad">
						@foreach($nacionalidad as $idn=>$nombre)
						@if( $nombre == $egresado->nacionalidad)
						<option value={{$idn}} selected>{{$nombre}}</option>
						<!--Tipo de datos enum-->
						@else
						<option value={{$idn}}>{{$nombre}}</option>
						@endif
						@endforeach
					</select></div>
				<div class="form-group"><label for="" class="">Lugar de origen: </label>
					<input class="form-control " type="text" name="lugar_origen" value="{{$egresado->lugar_origen}}"
						placeholder="Lugar de origen" required />
					<input class="form-control " type="hidden" name="habilitado" value="1" placeholder="" /></div>

			</div>
			<!--Datos de preparacion-->
			<div class="col-md-6 col-lg-6 col-12">
				<div class="form-group"><label for="" class="">Carrera: </label>
					<select class="form-control " name="carrera" class="carrera">
						@foreach($carrera as $idn=>$nombre)
						@if( $idn == $preparacion->carrera)
						<option value={{$idn}} selected>{{$nombre}}</option>
						<!--Tipo de datos enum-->
						@else
						<option value={{$idn}}>{{$nombre}}</option>
						@endif
						@endforeach
					</select></div>
				<div class="form-group"><label for="" class="">Generación: </label>
					<input class="form-control " type="text" name="generacion" value="{{$preparacion->generacion}}"
						placeholder="Ejemplo: 2013-2018" required /></div>
				<div class="form-group"><label for="" class="">Fecha de inicio de estudios: </label>
					<input class="form-control " type="date" name="fecha_inicio" value="{{$preparacion->fecha_inicio}}"
						placeholder="Fecha de inicio de estudios" required />
				</div>
				<div class="form-group">
					<label for="" class="">Fecha de fin de estudios: </label>
					<input class="form-control " type="date" name="fecha_fin" value="{{$preparacion->fecha_fin}}"
						placeholder="Fecha de fin de estudios" required />
				</div>
				<div class="form-group">
					<label for="" class="">Promedio: </label>
					<input class="form-control " type="text" name="promedio" value="{{$preparacion->promedio}}"
						placeholder="Promedio" required /></div>



			</div>
			<div class="container text-center">
				<button type="submit" class="btn btn-success btn-block">Guardar cambios</button>
			</div>
	</form>
</div>
</div>
<!--contenedor-->

@stop