@extends('layouts.master')

@section('title', 'Mi perfil')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Datos personales','bicon' => 'fa-home','bindex' => 'Perfil'])
@endsection

@section('style')

<link href="{{ url('css/modal.css') }}" rel="stylesheet">
<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section('script')
<script src="{{ url('js/ocultarelemento.js') }}"></script>
@stop

@section('content')

<!--inicio contenedor-->

<!-- Muestra un mensaje de alerta en caso de que el usuario no se puede registrar -->
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


<div class="tile mt-3">
	<div class="row">
		<div class="col-md-7 ">

			<!--inicio div-2-2-->
			<div class="text-left pl-3">
				<div class=" align-items-center d-flex  pb-3">
					<!--inicio contenedor-info-->

					<!--inicio icono-->
					<img src="{{ url('assets/images/user0.png') }}" alt="" class="iconos" title="Nombre">

					<!--fin icono-->
					<div class="ml-3 mt-2 ">
						<!--inicio info-->
						<h5> {{ $egresados->nombres }} {{ $egresados->ap_paterno }}
							{{ $egresados->ap_materno }} </h5>
					</div>
					<!--info-->
				</div>
				<!--contenedor-info-->
				<div class="align-items-center d-flex pb-3">
					<!--inicio contenedor-info-->
					<div class="icono-perfil">
						<!--inicio icono-->
						<img src="{{ url('assets/images/birthday.png') }}" alt="" class="iconos"
							title="Fecha de nacimiento">
					</div>
					<!--fin icono-->
					<div class="ml-3 mt-2">
						<!--inicio info-->
						<h5> {{ $egresados->fecha_nacimiento }} </h5>
					</div>
					<!--info-->
				</div>
				<!--contenedor-info-->

				<div class="align-items-center d-flex pb-3">
					<!--inicio contenedor-info-->
					<div class="icono-perfil">
						<!--inicio icono-->
						<img src="{{ url('assets/images/address.png') }}" alt="" class="iconos" title="Lugar de origen">
					</div>
					<!--fin icono-->
					<div class="ml-3 mt-2">
						<!--inicio info-->
						<h5> {{ $egresados->lugar_origen }}</h5>
					</div>
					<!--info-->
				</div>
				<!--contenedor-info-->

				<div class="align-items-center d-flex pb-3">
					<!--inicio contenedor-info-->
					<div class="icono-perfil">
						<!--inicio icono-->
						<img src="{{ url( 'assets/images/email.png') }}" alt="" class="iconos" title="Lugar de origen">
					</div>
					<!--fin icono-->
					<div class="ml-3 mt-2">
						<!--inicio info-->
						<h5>{{ $egresados->usuario->correo }}</h5>
					</div>
					<!--info-->
				</div>
				<!--contenedor-info-->

				<div>
					@if( $egresados->direccion_actual == NULL )
					<div class="align-items-center d-flex pb-3">
						<!--inicio contenedor-info-->
						<div class="icono-perfil">
							<!--inicio icono-->
							<img src="{{ url('assets/images/home0.png') }}" alt="" class="iconos"
								title="Direccion actual">
						</div>
						<!--fin icono-->
						<button type="button" class="btn btn-info ml-3" data-toggle="modal"
							data-target="#actualizarDireccion">
							Agregar dirección
						</button>
						<!--- <input type="tel" name="e_telefono" class="input-icon inputTel" placeholder="Agregar teléfono" value="{{$egresados->telefono}}" title="Teléfono" />
												-->
					</div>
					@else
					<div class="align-items-center d-flex pb-3">
						<!--inicio contenedor-info-->
						<div class="icono-perfil">
							<!--inicio icono-->
							<img src="{{ url('assets/images/home0.png') }}" alt="" class="iconos"
								title="Direccion actual">
						</div>
						<!--fin icono-->
						<div class="ml-3 mt-2">
							<!--inicio info-->
							<h5>{{ $egresados->direccion_actual }}</h5>
						</div>
						<!--info-->
						<button type="button" class="btn btn-info ml-3" data-toggle="modal"
							data-target="#actualizarDireccion">
							Actualizar
						</button>


					</div>
					<!--contenedor-info-->
					@endif

				</div>

				<div>
					@if( $egresados->telefono == NULL )
					<div class="align-items-center d-flex pb-3">
						<!--inicio contenedor-info-->
						<div class="icono-perfil">
							<!--inicio icono-->
							<img src="{{ url('assets/images/phone.png') }}" alt="" class="iconos"
								title="Numero telefónico">
						</div>
						<!--fin icono-->
						<button type="button" class="btn btn-info ml-3" data-toggle="modal"
							data-target="#actualizarTelefono">
							Agregar número de teléfono
						</button>
						<!--- <input type="tel" name="e_telefono" class="input-icon inputTel" placeholder="Agregar teléfono" value="{{$egresados->telefono}}" title="Teléfono" />
												-->
					</div>
					@else
					<div class="align-items-center d-flex pb-3">
						<!--inicio contenedor-info-->
						<div class="icono-perfil">
							<!--inicio icono-->
							<img src="{{ url('assets/images/phone.png') }}" alt="" class="iconos"
								title="Numero telefónico">
						</div>
						<!--fin icono-->
						<div class="ml-3 mt-2 ">
							<!--inicio info-->
							<h5>{{ $egresados->telefono }}</h5>
						</div>
						<!--info-->

						<button type="button" class="btn btn-info ml-3" data-toggle="modal"
							data-target="#actualizarTelefono">
							Actualizar
						</button>
					</div>
					<!--contenedor-info-->
					@endif

				</div>

				<div class="mt-3">
					<h5 class="d-flex align-items-center">
						<li class="fa fa-file-pdf-o fa-2x text-secondary pr-3"></li>&nbspCurriculum Vitae (PDF)
						:&nbsp&nbsp&nbsp
						@if($egresados->cv_url== NULL)


						@else
						<a href=" {{url('storage/'.$egresados->cv_url)}} " target=" _blank"><button
								class="btn btn-secondary" type="button">Abrir
								archivo</button></a>
						@endif
					</h5>

					<form enctype="multipart/form-data" action="{{url('perfil/uploadcv')}}" method="POST">
						<div class="d-flex justify-content-left"></div>
						<div><input type="file" name="e_cv" accept="application/pdf" />
							<input type="hidden" name="_token" value="{{ csrf_token() }}"></div>



						<button class="btn btn-success mt-3 btn-block col-8" type="submit"><i
								class="fa fa-refresh "></i>
							Actualizar
							CV</button>
					</form>
				</div>



			</div>
		</div>
		<div class="col-md-4  ml-3 mt-3 container ">
			<div class="align-items-center ">
				<div class="d-flex justify-content-center">
					@if($egresados->imagen_url)
					<img width="200" src="{{url($egresados->imagen_url)}}">
					@else
					<img width="200" src="{{url('assets/images/egresados/default.png')}}" alt="user-picture"
						class="img-thumbnail img">
					@endif
				</div>
				<div class="d-flex justify-content-center">
					<h5 class="mt-2">Foto de perfil (1x1)</h5>
				</div>
				<form enctype="multipart/form-data" action="{{url('perfil/upphoto')}}" method="POST">
					<div class="d-flex justify-content-center">
						<div class="form-group ">

							<input name="e_img" class="form-control-file" id="exampleInputFile" type="file"
								accept="image/*" aria-describedby="fileHelp">
							<input type="hidden" name="_token" value="{{ csrf_token() }}"> </div>
					</div>

					<div class="d-flex justify-content-center">
						<button class="btn btn-success btn-block" type="submit"><i class="fa fa-refresh "></i>Actualizar
							foto</button>
					</div>


				</form>
			</div>


		</div>
	</div>


</div>

<!-- Modal para agregar o actualizar TELEFONO -->
<div class="modal fade" id="actualizarTelefono" tabindex="-1" role="dialog" aria-labelledby="actualizarTelefono"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Actualizar teléfono</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('perfil/guardar') }}" method="post">
				<div class="modal-body">

					{{ csrf_field() }}

					<!--parte-2-->
					<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
					<div class="input-group container">
						<div class="input-group-append">
							<div class="input-group-text">
								<i class="fa fa-lg fa-phone"></i>
							</div>
						</div>
						<input type="text" name="telefono" class="form-control" placeholder="Agregar teléfono"
							value="{{$egresados->telefono}}" required />
						<input type="hidden" name="modificacion" value="telefono" />
					</div>


				</div>
				<div class="modal-footer">

					<button type="submit" class="btn btn-success">Guardar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>

			</form>


		</div>
	</div>
</div>


<div class="modal fade" id="actualizarDireccion" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Actualizar dirección</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{ url('perfil/guardar') }}" method="post">
				<div class="modal-body">


					{{ csrf_field() }}

					<!--parte-2-->
					<input name="_token" type="hidden" value="{!! csrf_token() !!}" />
					<div class="input-group container">
						<div class="input-group-append">
							<div class="input-group-text">
								<i class="fa fa-lg fa-home"></i>
							</div>
						</div>
						<input type="text" name="direccion" class="form-control" placeholder="Agregar direccion"
							value="{{ $egresados->direccion_actual }}" required />
						<input type="hidden" name="modificacion" value="direccion" />
					</div>
				</div>
				<div class="modal-footer">

					<button type="submit" class="btn btn-primary">Guardar</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
				</div>



			</form>
		</div>
	</div>
</div>


@stop