@extends('admin.layouts.master')

@section('title', 'Editar empresa')

@section('style')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Editar empresa','bicon' => 'fa-home','bindex' => 'Empresas'])
@endsection
@stop

@section('script')
<script src="{{ url('js/admin/empresa.js') }}"></script>
@stop

@section('content')
<div class="tile">

	@php
	$sector = array(1=>'Pública',2=>'Privada',3=>'Propia');
	@endphp

	<form method="post" enctype="multipart/form-data" action="{{route('admin.editarEmpresa.submit')}}">
		{{ csrf_field() }}
		<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
		<input name="id" type="hidden" value="{{$empresa->id}}" />
		<div class="row">

			<div class="col-md-6 col-lg-6 col-12">
				<div class=" form-group  ">
					<label for="" class="">Nombre de la empresa: </label>
					<input class="form-control" type="text" name="nombre_emp" value="{{$empresa->nombre}}" required />
				</div>
				<div class=" form-group  ">
					<label for="" class="">Descripción: </label>
					<textarea class="form-control" rows="4" cols="50" name="descripcion"
						required>{{$empresa->descripcion}}</textarea>
				</div>
				<div class=" form-group  ">
					<label for="" class="">Calle: </label>
					<input class="form-control" type="text" name="calle" value="{{$empresa->calle}}" required />
				</div>
				<div class=" form-group  ">
					<label for="" class="">Número: </label>
					<input class="form-control" type="text" name="numero" value="{{$empresa->numero}}" required />
				</div>
				<div class=" form-group  ">
					<label for="" class="">Distrito:</label>
					<input class="form-control" type="text" name="distrito" value="{{$empresa->distrito}}" required />
				</div>
				<div class=" form-group  ">
					<label for="" class="">Ciudad:</label>
					<input class="form-control" type="text" name="ciudad" value="{{$empresa->ciudad}}" required />
				</div>
				<div class=" row">
					<div class="form-group col-md-8 col-12">
						<label for="" class="">Departamento:</label>
						<input class="form-control" type="text" name="departamento" value="{{$empresa->departamento}}"
							required />
					</div>
					<div class="form-group col-md-4 col-12">
						<label for="" class="">Código postal (opcional):</label>
						<input class="form-control" type="text" name="codigo_p" value="{{$empresa->codigo_postal}}" />
					</div>
				</div>


				<div class=" form-group  ">
					<label for="" class="">giro: </label>
					<input class="form-control" type="text" name="giro" value="{{$empresa->giro}}" required />
				</div>
				<div class="form-group">
					<label for="" class="">Sector: </label>
					<select class="form-control" name="sector">
						@foreach($sector as $idn=>$nombre)
						@if($nombre == $empresa->sector)
						<option value={{$nombre}} selected>{{$nombre}}</option>
						<!--Tipo de datos enum-->
						@else
						<option value={{$nombre}}>{{$nombre}}</option>
						<!--Tipo de datos enum-->
						@endif
						@endforeach
					</select>
				</div>
			</div>
			<div class="col-md-6 col-lg-6 col-12">

				<div class="form-group">
					<label for="" class="">RUC: </label>
					<input class="form-control" type="text" name="ruc_emp" value="{{$empresa->ruc}}" required />
				</div>
				<div class="form-group">
					<label for="" class="">Teléfono: </label>
					<input class="form-control" type="text" name="telefono_emp" value="{{$empresa->telefono}}"
						required />
				</div>
				<div class="form-group">
					<label for="" class="">Correo: </label>
					<input class="form-control" type="email" name="correo_emp" value="{{$empresa->correo}}" required />
				</div>
				<div class="form-group">
					<label for="" class="">Página web: </label>
					<input class="form-control" type="text" name="pagina_w" value="{{$empresa->pagina_web}}" required />
				</div>

				<div class=" form-group  ">
					<label for="" class="">Fotografía de la empresa: </label>
					<input class="form-control" id="file-input" name="imagen" type="file" />
					<div class="mt-1 text-center"><img id="imgSalida" width="100" src="{{ url($empresa->imagen_url)}}"
							alt="" /></div>

				</div>
				<div class="form-group">
					<label for="" class="">Motivos de no contratación: </label>
					<textarea class="form-control" rows="4" cols="50" name="noContratacion"
						required>{{$empresa->motivo_no_contratacion}}</textarea>
				</div>
				<div class="from-group"> <label for="" class="">Recomendaciones: </label>
					<textarea class="form-control" rows="4" cols="50" name="recomendacion"
						required>{{$empresa->recomendaciones}}</textarea>
				</div>

			</div>
		</div>
		<div class="card mt-2">
			<div class="card-header">
				Contacto
			</div>
			<div class="card-body row">
				<div class="col-md-6 col-lg-6 col-12">
					<div class="form-group">
						<label for="" class="">Nombre del contacto: </label>
						<input class="form-control" type="text" name="nombre_cont" value="{{$contacto->nombre}}"
							required />
					</div>

					<div class="form-group">
						<label for="" class="">Puesto: </label>
						<input class="form-control" type="text" name="puesto_cont" value="{{$contacto->puesto}}"
							required />
					</div>
				</div>
				<div class="col-md-6 col-lg-6 col-12">
					<div class="form-group">
						<label for="" class="">Número telefónico: </label>
						<input class="form-control" type="text" name="numeroTel_cont" value="{{$contacto->telefono}}"
							required />
					</div>

					<div class="form-group">
						<label for="" class="">Correo electrónico: </label>
						<input class="form-control" type="email" name="email_cont" value="{{$contacto->correo}}"
							required />
					</div>
					<!--Datos del contacto de la empresa-->
					<input name="contacto_id" type="hidden" value="{{$contacto->id}}" required />


				</div>
			</div>
		</div>

		<div class="mt-3">
			<button type="submit" class="btn btn-success btn-block">Actualizar</button>
		</div>
	</form>

</div>
<!--contenedor-->

@stop