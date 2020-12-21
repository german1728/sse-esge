@extends('admin.layouts.master')

@section('title', 'Empresas')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Lista de empresas','bicon' => 'fa-home','bindex' => 'Empresas'])
@endsection
@section('style')
<link href="{{ url('css/paginacion.css') }}" rel="stylesheet">

<!-- <link href="{{ url('css/modal.css') }}" rel="stylesheet"> -->
<link href="{{ url('css/cssadmin/modalAdmin.css') }}" rel="stylesheet">
<link href="{{ url('css/cssadmin/empresas.css') }}" rel="stylesheet">
<!-- <link href="{{ url('css/empresa.css') }}" rel="stylesheet"> -->
<link href="{{ url('css/notificationflash.css') }}" rel="stylesheet">
@stop

@section( 'script' )
<script src="{{ url('js/ocultarelemento.js') }}"></script>
<script src="{{ url('js/admin/empresa.js') }}"></script>
@stop

@section('content')
<div class="tile">
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
	<div class="container">

		<!--inicio div-2-2-1-->
		<div class="d-flex mb-3">
			<a class="btn btn-success mr-5" href="{{url('/admin/empresas/crearEmpresa')}}">
				<li class="fa fa-plus"></li> Agregar empresa
			</a><!-- Button crear Egresado-->
			<a href="{{url('/admin/empresas/reporte', $valor) }}" target="_blank" class="btn btn-danger ">
				<li class="fa fa-file-pdf-o"></li>Descargar
				PDF
			</a>
		</div>
		<div class="search d-flex mb-3 justify-content-center">
			{!! Form::open(['url' => url()->current(), 'method' => 'GET', 'role' => 'search']) !!}
			{!! Form::text('q', null, ['type' => 'search', 'name' => 'q', 'placeholder' => 'Buscador de empresas']) !!}
			{!! Form::close() !!}
		</div>


	</div>


	<div class="table table-responsive">

		<table class="table table-bordered table-striped text-center">
			<!--Contenido de la pagina-->
			<thead class="thead-dark">
				<th>Nombre</th>
				<th>ubicación</th>
				<th>Teléfono</th>
				<th>Descripción</th>
				<th>Acción</th>
			</thead>
			<tbody>
				@foreach($empresas as $empresa)
				<tr data-empresa="{{$empresa}}">
					<td>{{$empresa->nombre}}</td>
					<td>{{$empresa->ciudad}}</td>
					<td>{{$empresa->telefono}}</td>
					<td>{{$empresa->descripcion}}</td>
					<td>
						<a href="{{url('/admin/empresas/editarEmpresa',$empresa->id)}}">
							<li class="fa fa-pencil-square-o fa-2x text-secondary "></li>
						</a>
						<!--editar-->
						<a href="#eliminarEmpresa" class="btn-showDelete" data-toggle="modal"
							data-target="#eliminarEmpresa">
							<li class="fa fa-trash-o fa-2x text-danger"></li>
						</a>
						<!--Eliminar-->
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>

		<div class="div-5">
			<!--div-5-->
			<!-- Paginación -->
			<?php if (isset($_GET['q'])){ ?>
			{!! $empresas->appends(['q' => $_GET["q"]])->render() !!}
			<?php }else{ ?>
			{!! $empresas->render() !!}
			<?php } ?>
		</div>

	</div>
	<!--div-5-->
	<!--Fin paginacion-->
</div>
<!--contenedor-->
<div class="modal fade" id="eliminarEmpresa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLongTitle">Eliminar empresa</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<form action="{{route('admin.eliminarEmpresa.submit')}}" method="post">
				<div class="modal-body text-center">
					<h5>¿Seguro que desea eliminar esta empresa?</h5>
					<div class="parte-2">
						<!--parte-2-->
						<input name="_token" type="hidden" value="{!! csrf_token() !!}" />


						<div class="descripcion" id="e_id"></div>

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