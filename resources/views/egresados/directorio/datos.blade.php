@extends('layouts.master')

@section('title', 'Datos básicos')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Información de la empresa','bicon' => 'fa-home','bindex' => 'Directorio de
empresas / Empresa'])
@endsection
@section('style')
<link href="{{ url('css/datosEmpresa.css') }}" rel="stylesheet">
<link href="{{ url('css/modalDatosEmpresa.css') }}" rel="stylesheet">
<link href="{{ url('css/estrellasRating.css') }}" rel="stylesheet">
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
@stop

@section('script')
<script src="{{ url('js/calificar.js') }}"></script>
@stop

@section('content')
<div class="row user">
	<div class="col-md-3">
		@include('partials.asideEmpresa')
	</div>
	<div class="col-md-9">
		<div class="tile row ">
			<!--inicio div-2-2-->
			<div class="col-md-7">
				<div class="">
					{{ csrf_field() }}

					<div class="contenedor-info">
						<!--inicio contenedor-info-->
						<div class="icono">
							<!--inicio icono-->
							<img src="{{ url('assets/images/address.png') }}" alt="" class="iconos">
						</div>
						<!--fin icono-->
						<div class="info">
							<!--inicio info-->
							<span> {{ $empresa->nombre }} </span>
						</div>
						<!--info-->
					</div>
					<!--contenedor-info-->

					<div class="contenedor-info">
						<!--inicio contenedor-info-->
						<div class="icono">
							<!--inicio icono-->
							<img src="{{ url('assets/images/home0.png') }}" alt="" class="iconos">
						</div>
						<!--fin icono-->
						<div class="info">
							<!--inicio info-->
							<span> {{ $empresa->ciudad}}, {{ $empresa->ciudad }} </span>
						</div>
						<!--info-->
					</div>
					<!--contenedor-info-->

					<div class="contenedor-info">
						<!--inicio contenedor-info-->
						<div class="icono">
							<!--inicio icono-->
							<img src="{{ url('assets/images/phone.png') }}" alt="" class="iconos">
						</div>
						<!--fin icono-->
						<div class="info">
							<!--inicio info-->
							<span> {{ $empresa->telefono }} </span>
						</div>
						<!--info-->
					</div>
					<!--contenedor-info-->

					<div class="contenedor-info">
						<!--inicio contenedor-info-->
						<div class="icono">
							<!--inicio icono-->
							<img src="{{ url('assets/images/email.png') }}" alt="" class="iconos">
						</div>
						<!--fin icono-->
						<div class="info">
							<!--inicio info-->
							<span> {{ $empresa->correo }} </span>
						</div>
						<!--info-->
					</div>
					<!--contenedor-info-->

					<div class="contenedor-info">
						<!--inicio contenedor-info-->
						<div class="icono">
							<!--inicio icono-->
							<img src="{{ url('assets/images/user0.png') }}" alt="" class="iconos">
						</div>
						<!--fin icono-->
						<div class="info">
							<!--inicio info-->
							<span> {{ $empresa->contacto->nombre }} </span>
						</div>
						<!--info-->
					</div>
					<!--contenedor-info-->

					<div class="contenedor-info">
						<!--inicio contenedor-info-->
						<div class="icono">
							<!--inicio icono-->
							<img src="{{ url('assets/images/empresa_puesto.png') }}" alt="" class="iconos">
						</div>
						<!--fin icono-->
						<div class="info">
							<!--inicio info-->
							<span> {{ $empresa->contacto->puesto }} </span>
						</div>
						<!--info-->
					</div>
					<!--contenedor-info-->

				</div>
			</div>

			<!--fin div-2-2-->

			<div class="col-md-5 text-center">
				<!-- div-2-3 -->
				<div class="inline-block mt-3"> <img width="200" src="{{url( $empresa->imagen_url )}}"
						alt="user-picture" class="img">
				</div>

				@if( $rank == 0 )
				<div class="mt-3">
					<img src="{{ url('assets/images/empresa_estrella.png') }}" alt="" class="iconos">

				</div>
				<div class="mt-1 "><a class="btn btn-warning" href="#calificaEmpresa" data-toggle="modal"
						data-target="#calificaEmpresa">Calificar empresa</a>
				</div>

				@endif
			</div>
		</div>


	</div>
</div>






<div class="modal fade" id="calificaEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Calificar esta empresa</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form method="POST" enctype="multipart/form-data" action="{{ route('guardarCalificacion.submit') }}">
				{{ csrf_field() }}
				<div class="modal-body mr-2">
					<div class="stars">


						<div class="descripcion" id="id">
							<!-- {{$request->id}} -->
							<input type="hidden" name="id" value='{{$request->id}}' />
						</div>
						<div class="clasificacion">
							<input class="star star-5" id="star_5" type="radio" name="star" value="5" />
							<label class="star star-5" for="star_5"></label>
							<input class="star star-4" id="star_4" type="radio" name="star" value="4" />
							<label class="star star-4" for="star_4"></label>
							<input class="star star-3" id="star_3" type="radio" name="star" value="3" />
							<label class="star star-3" for="star_3"></label>
							<input class="star star-2" id="star_2" type="radio" name="star" value="2" />
							<label class="star star-2" for="star_2"></label>
							<input class="star star-1" id="star_1" type="radio" name="star" value="1" />
							<label class="star star-1" for="star_1"></label>
						</div>


						<p class="coment">Comentario</p>
						<div>
							<textarea name="comentario" id="comentario" class="form-control" rows="3"
								required></textarea>
						</div>


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