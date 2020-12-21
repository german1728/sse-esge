@extends('admin.layouts.master')

@section('title', 'Nueva empresa')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Nueva empresa','bicon' => 'fa-home','bindex' => 'Empresas'])
@endsection
@section('style')

@stop

@section('script')
<script src="{{ url('js/admin/empresa.js') }}"></script>
@stop

@section('content')
<div class="tile">
	<!-- contenedor -->

	<!--div-1-->

	@php
	$sector = array(1=>'Pública',2=>'Privada',3=>'Propia');
	@endphp

	<form method="post" enctype="multipart/form-data" action="{{route('admin.crearEmpresa.submit')}}">
		{{ csrf_field() }}
		<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
		<div class="row">

			<div class="col-md-6 col-lg-6 col-12">
				<div class=" form-group  ">
					<label for="" class="">Nombre de la empresa: </label>
					<input class="form-control" type="text" name="nombre_emp" placeholder="Ingrese nombre de la empresa"
						required />
				</div>
				<div class=" form-group  ">

					<label for="" class="">Descripción: </label>
					<textarea class="form-control" rows="4" cols="50" name="descripcion"
						placeholder="Describa la empresa" required></textarea>

				</div>

				<div class=" form-group  ">
					<label for="" class="">Calle: </label>
					<input class="form-control" type="text" name="calle" placeholder="Calle" required />
				</div>

				<div class=" form-group  ">
					<label for="" class="">Número: </label>
					<input class="form-control" type="text" name="numero" placeholder="Número" required />
				</div>
				<div class=" form-group  ">
					<label for="" class="">Distrito:</label>
					<input class="form-control" type="text" name="distrito" placeholder="distrito" required />
				</div>


				<div class=" form-group  ">
					<label for="" class="">Ciudad:</label>
					<input class="form-control" type="text" name="ciudad" placeholder="Ciudad" required />
				</div>
				<div class="row">
					<div class=" form-group col-md-8 col-12">
						<label for="" class="">Departamento:</label>
						<input class="form-control" type="text" name="departamento" placeholder="departamento"
							required />
					</div>
					<div class="form-group  col-md-4 col-12">
						<label for="" class="">Código postal (opcional):</label>
						<input class="form-control" type="text" name="codigo_p" placeholder="Código postal" />
					</div>
				</div>

				<div class=" form-group  ">
					<label for="" class="">giro: </label>
					<input class="form-control" type="text" name="giro" placeholder="giro de la empresa" required />
				</div>
				<div class=" form-group  ">
					<label for="" class="">Sector: </label>
					<select class="form-control" name="sector">
						@foreach($sector as $idn=>$nombre)
						<option value={{$nombre}}>{{$nombre}}</option>
						<!--Tipo de datos enum-->
						@endforeach
					</select>
				</div>


			</div>
			<div class="col-md-6 col-lg-6 col-12">
				<div class=" form-group  ">
					<label for="" class="">RUC: </label>
					<input class="form-control" type="text" name="ruc_emp" placeholder="ruc" required />
				</div>
				<div class=" form-group  ">
					<label class="">Telefono: </label>
					<input class="form-control" type="text" name="telefono_emp" placeholder="Teléfono" required />
				</div>
				<div class=" form-group  ">
					<label for="" class="">Correo: </label>
					<input class="form-control" type="email" name="correo_emp" placeholder="Correo" required />
				</div>
				<div class=" form-group  ">
					<label for="" class="">Página web: </label>
					<input class="form-control" type="text" name="pagina_w" placeholder="Página web de la empresa"
						required />
				</div>
				<div class=" form-group  ">
					<label for="" class="">Fotografía de la empresa: </label>
					<input class="form-control" id="file-input" type="file" name="imagen" required />
					<div class=" text-center"><img width=100 class="mt-1 " id="imgSalida" src="" /></div>

				</div>
				<div class=" form-group  ">
					<label for="" class="">Motivos de no contratación (opcional): </label>
					<textarea class="form-control" rows="4" cols="50" name="noContratacion"
						placeholder="Describa los motivos de no contatación"></textarea>
				</div>
				<div class=" form-group  ">
					<label for="" class="">Recomendaciones (opcional): </label>
					<textarea class="form-control" rows="4" cols="50" name="recomendacion"
						placeholder="Recomendaciones de la empresa"></textarea>
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
						<input class="form-control" type="text" name="nombre_cont" placeholder="Nombre de contacto"
							required />
					</div>

					<div class="form-group">
						<label for="" class="">Puesto: </label>
						<input class="form-control" type="text" name="puesto_cont" placeholder="Puesto del contacto"
							required />
					</div>
				</div>
				<div class="col-md-6 col-lg-6 col-12">
					<div class="form-group">
						<label for="" class="">Número telefónico: </label>
						<input class="form-control" type="text" name="numeroTel_cont"
							placeholder="Teléfono del contacto" required />
					</div>

					<div class="form-group">
						<label for="" class="">Correo electrónico: </label>
						<input class="form-control" type="email" name="email_cont" placeholder="Correo del contacto"
							required />
					</div>
				</div>
			</div>
		</div>

		<!--Habilitacion de la empresa-->
		<input type="hidden" name="habilitado" value="1" placeholder="" />


		<div class="mt-3">
			<button type="submit" class="btn btn-success btn-block">Guardar</button>
		</div>
	</form>
</div>
<!--contenedor-->

@stop