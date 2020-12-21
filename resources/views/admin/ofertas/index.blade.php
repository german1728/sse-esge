@extends('admin.layouts.master')

@section('title', 'Ofertas')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Lista de ofertas laborales','bicon' => 'fa-home','bindex' => 'Ofertas
laborales'])
@endsection

@section('style')
<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">

<!-- <link href="{{ url('css/modal.css') }}" rel="stylesheet"> -->
<link href="{{ url('css/cssadmin/modalAdmin.css') }}" rel="stylesheet">
<link href="{{ url('css/cssadmin/ofertas.css') }}" rel="stylesheet">
<!-- <link href="{{ url('css/empresa.css') }}" rel="stylesheet"> -->
<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section( 'script' )
<script src="{{ url('js/ocultarelemento.js') }}"></script>
<!--
		Este archivo esta en public, presenta la ventana emergente
		para crear, ver y eliminar un evento
	-->
<script src="{{ url('js/admin/ofertas.js') }}"></script>
@stop

@php


$carrera = array(
0=>'Ingeniería Geológica-Geotecnia',

);
@endphp

@section('content')
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
	<!-- contenedor -->

	<div class="container">

		<!--inicio div-2-2-1-->
		<div class="d-flex mb-3">
			<a class="btn btn-success mr-5" href="{{url('/admin/ofertas/crearOferta')}}">
				<li class="fa fa-plus"></li> Crear oferta
			</a><!-- Button crear Egresado-->
			<a href="{{url('/admin/ofertas/reporte', $valor) }}" target="_blank" class="btn btn-danger ">
				<li class="fa fa-file-pdf-o"></li>Descargar
				PDF
			</a>
		</div>
		<div class="search d-flex mb-3 justify-content-center">{!! Form::open(['url' => url()->current(), 'method' =>
			'GET', 'role' => 'search']) !!}
			{!! Form::text('q', null, ['type' => 'search', 'name' => 'q', 'placeholder' => 'Buscador de ofertas']) !!}
			{!! Form::close() !!}
		</div>


	</div>


	<div class="table table-responsive">

		<table class="table table-striped text-center table-bordered">
			<!--Contenido de la pagina-->
			<thead class="thead-dark">
				<th> Puesto </th>
				<th>Empresa</th>
				<th> Descripción </th>
				<th> Ubicación </th>
				<!-- <td> Salario </td> -->
				<th> Carrera </th>
				<th> Acción </th>

			</thead>

			<tbody>
				@foreach( $ofertas as $oferta )
				<tr data-oferta="{{ $oferta }}" data-empresa="{{ $oferta->empresa }}">
					<td>
						<a href="#verOferta" class="btn-show" data-toggle="modal" data-target="#verOferta">
							{{ $oferta->titulo_empleo }}
						</a>
					</td>
					<td>
						{{ $oferta->empresa->nombre }}
					</td>
					<td>
						{{ $oferta->descripcion }}
					</td>
					<td class="text-uppercase">
						{{ $oferta->ubicacion }}
					</td>
					<td>
						{{ $carrera[ $oferta->carrera ] }}
					</td>
					<td>
						<a href="{{url('/admin/ofertas/editarOferta', $oferta->id )}}">
							<li class="fa fa-pencil-square-o fa-2x text-secondary "></li>
						</a>
						<!--editar-->
						<a href="#eliminarOferta" class="btn-showDelete" data-toggle="modal"
							data-target="#eliminarOferta">
							<li class="fa fa-trash-o fa-2x text-danger"></li>
						</a>
						<!--Eliminar-->
					</td>
				</tr>
				@endforeach
			</tbody>

		</table>
	</div>

	<!--Fin del contenido de la pagina-->
	<div class="d-flex justify-content-center">
		<?php if (isset($_GET['q'])){ ?>
		{!! $ofertas->appends(['q' => $_GET["q"]])->render("pagination::bootstrap-4") !!}
		<?php }else{ ?>
		{!! $ofertas->render("pagination::bootstrap-4") !!}
		<?php } ?>
	</div>

	<!--Fin del paginador-->
</div>
<!--contenedor-->
<div class="modal fade" id="verOferta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Detalles de la oferta laboral</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="text-center">
					<!--parte-1-->
					<h5 class="txt" id="getOferta"></h5>
				</div>
				<!--parte-1-->

				<div class="parte-2">
					<!--parte-2-->
					<div class="item-1">
						<!--item-1-->
						<h6>Empresa: </h6>
						<div class="descripcion" id="getEmpresa"></div>
						<!--descripcion-->
					</div>
					<!--item-1-->

					<div class="item-1">
						<!--item-1-->
						<h6>Descripcion: </h6>
						<div class="descripcion" id="getDescripcion"></div>
						<!--descripcion-->
					</div>
					<!--item-1-->

					<div class="item-1">
						<!--item-1-->
						<h6>Ubicación: </h6>
						<div class="descripcion" id="getUbicacion"></div>
						<!--descripcion-->
					</div>
					<!--item-1-->

					<div class="item-1">
						<!--item-1-->
						<h6>Salario: </h6>
						<div class="descripcion" id="getSalario"></div>
						<!--descripcion-->
					</div>
					<!--item-1-->

					<div class="item-1">
						<!--item-1-->
						<h6>Experiencia: </h6>
						<div class="descripcion" id="getExperiencia"></div>
						<!--descripcion-->
					</div>
					<!--item-1-->

					<div class="item-1">
						<!--item-1-->
						<h6>Carrera: </h6>
						<div class="descripcion" id="getCarrera"></div>
						<!--descripcion-->
					</div>
					<!--item-1-->

					<div class="item-1">
						<!--item-1-->
						<h6>Estado: </h6>
						<div class="descripcion" id="getStatus"></div>
						<!--descripcion-->
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>

				</div>
			</div>
		</div>
	</div>
</div>

<!--Ventana emergente para eliminar-->
<div class="modal fade" id="eliminarOferta" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Eliminar oferta laboral</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('admin.eliminarOferta.submit')}}" method="post">
				<div class="modal-body text-center">
					<h5>¿Seguro que desea eliminar la oferta laboral seleccionada?</h5>
					<!--parte-1-->


					<div class="parte-2">
						<!--parte-2-->
						<input name="_token" type="hidden" value="{!! csrf_token() !!}" />

						<div class="descripcion" id="oferta_id"></div>


					</div>

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
					<button type="submit" class="btn btn-danger">Eliminar</button>
				</div>
			</form>
		</div>
	</div>
</div>


@stop