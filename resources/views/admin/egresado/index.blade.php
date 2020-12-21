@extends('admin.layouts.master')

@section('title', 'index')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Lista de egresados','bicon' => 'fa-home','bindex' => 'Egresados'])
@endsection
@section('style')


<!-- <link href="{{ url('css/modal.css') }}" rel="stylesheet"> -->


<link href="{{ url('css/cssadmin/egresados.css') }}" rel="stylesheet">
<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section('script')
<script src="{{ url('js/admin/egresado.js') }}"></script>
<script src="{{ url('js/ocultarelemento.js') }}"></script>
@stop

@php
//creamos arreglos asociativos para los select
$nacionalidad = array(1=>'Peruana', 2=>'Otra');
$genero = array(1=>'Masculino', 2=>'Femenino');
$carrera = array(
0=>'Ingeniería Geológica-Geotecnia',
);
@endphp

@section('content')

<!-- contenedor -->
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

<div class="tile">

	<!--editar-->

	<div class="container">

		<!--inicio div-2-2-1-->
		<div class="d-flex mb-3">
			<a class="btn btn-success mr-5" href="{{url('/admin/egresado/crearEgresado')}}">
				<li class="fa fa-plus"></li> Agregar egresado
			</a><!-- Button crear Egresado-->
			<a href="{{url('/admin/egresado/reporte', $valor) }}" target="_blank" class="btn btn-danger ">
				<li class="fa fa-file-pdf-o"></li>Descargar
				PDF
			</a>
		</div>
		<div class="search d-flex mb-3 justify-content-center">{!! Form::open(['url' => url()->current(), 'method' =>
			'GET', 'role' => 'search']) !!}
			{!! Form::text('q', null, ['type' => 'search', 'name' => 'q', 'placeholder' => 'Buscador de egresados']) !!}
			{!! Form::close() !!}
		</div>


	</div>

	<!--fin div-2-2-1-->
	<div class="table table-responsive">
		@php
		$i = 1;
		@endphp
		<table class="table table-striped text-center">
			<!--Contenido de la pagina-->
			<thead class="thead-dark">
				<tr>
					<th>Nº</th>
					<th>Matricula</th>
					<th>Nombre</th>
					<th>Carrera</th>
					<th>Generación</th>
					<th>Acciones</th>
				</tr>

			</thead>
			<tbody>
				@foreach($egresados as $egresado)
				<tr data-egresado="{{$egresado}}" data-usuario="{{$egresado->usuario}}"
					data-preparacion="{{$egresado->preparacion}}">
					<td>{{$i}}</td>
					<td>{{$egresado->matricula}} </td>
					<td class="text-uppercase">
						<a href="#verEgresado" class="btn-show" data-toggle="modal"
							data-target="#verEgresado">{{$egresado->ap_paterno}} {{$egresado->ap_materno}}
							{{$egresado->nombres}}</a>
					</td>
					<td>{{ $carrera[ $egresado->preparacion->carrera ] }}</td>
					<td>{{ $egresado->preparacion->generacion }}</td>
					<td class="">

						@if($egresado->usuario==NULL)
						&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
						@else
						<a href="{{url('/admin/egresado/datosPersonales', $egresado->matricula)}}">
							<li class="fa fa-eye fa-2x text-info mr-2"></li>
						</a>
						@endif
						<a href="{{url('/admin/egresado/editarEgresado', $egresado->matricula)}}" class="mr-1 ">
							<li class="fa fa-pencil-square-o fa-2x text-secondary "></li>
						</a>

						<a href="#eliminarEgresado" data-toggle="modal" data-target="#eliminarEgresado">
							<li class="fa fa-trash-o fa-2x text-danger btn-showDelete"></li>
						</a>


						<!--Eliminar-->
					</td>
				</tr>
				@php
				$i++;
				@endphp

				@endforeach
			</tbody>
		</table>

		<div class="d-flex justify-content-center">
			<?php if (isset($_GET['q'])){ ?>
			{!! $egresados->appends(['q' => $_GET["q"]])->render("pagination::bootstrap-4") !!}
			<?php }else{ ?>
			{!! $egresados->render("pagination::bootstrap-4") !!}
			<?php } ?>
		</div>

	</div>




</div>



<!--contenedor-->

<!--Ventana emergente para eliminar-->
<div class="modal fade" id="eliminarEgresado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Eliminar Egresado</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('admin.eliminarEgresado.submit')}}" method="post">
				{{ csrf_field() }}
				<div class="modal-body text-center">
					<div id="eg_matricula"></div>
					<h6>¿Seguro que desea eliminar?</h6>


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-danger">Eliminar</button>
				</div>
			</form>
		</div>
	</div>
</div>


<div class="modal fade" id="verEgresado" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Ver egresado - Resumen</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body row">

				<div class="col-md-6 col-12">
					<!--item-1-->
					<h6>Nombre:</h6>
					<div class="descripcion" id="egv_nombreComp"></div>
					<h6>DNI:</h6>
					<div class="descripcion" id="egv_dni"></div>
					<h6>Género:</h6>
					<div class="descripcion" id="egv_genero"></div>
					<h6>Fecha de Nacimiento:</h6>
					<div class="descripcion" id="egv_fechaNac"></div>
					<h6>Correo:</h6>
					<div class="descripcion" id="egv_correo"></div>
					<h6>Teléfono:</h6>
					<div class="descripcion" id="egv_telefono"></div>
					<h6>Curriculum Vitae:</h6>
					<div class="descripcion" id="egv_cv">

					</div>
					<!--descripcion-->
				</div>
				<!--item-1-->

				<div class="col-md-6 col-12">
					<!--item-1-->
					<h6>Nacionalidad:</h6>
					<div class="descripcion" id="egv_nacionalidad"></div>
					<h6>Lugar de origen:</h6>
					<div class="descripcion text-uppercase" id="egv_lugarOrig"></div>
					<h6>Carrera:</h6>
					<div class="descripcion" id="egPrv_carrera"></div>
					<h6>Generación:</h6>
					<div class="descripcion" id="egPrv_generacion"></div>
					<h6>Fecha de inicio de estudios:</h6>
					<div class="descripcion" id="egPrv_fechaI"></div>
					<h6>Fecha de fin de estudios:</h6>
					<div class="descripcion" id="egPrv_fechaF"></div>
					<!--descripcion-->
				</div>
				<!--item-1-->



			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

			</div>
		</div>
	</div>
</div>
<!--Ventana emergente para ver-->



@stop