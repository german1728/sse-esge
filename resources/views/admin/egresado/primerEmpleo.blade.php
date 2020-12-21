@extends('admin.layouts.master')

@section('title', 'index')
@section('breadcrumb')
@include('partials.breadcrumb', ['btext' => 'Ver egresado','bicon' => 'fa-home','bindex' => 'Egresados'])
@endsection

@section('style')
<link href="{{ url('css/perfil.css') }}" rel="stylesheet">
@stop

@section('content')
<div class="row user">

	<div class="col-md-3">
		@include('admin.partials.asideEgresado')
	</div>
	<div class="col-md-9">
		<div class="tile row ">
			<div class=" col-12 col-lg-1">
			</div>
			@if( $empleo==NULL)
			<h6>No se ha registrado datos del primer empleo</h6>
			@else

			<div class="column content content-lg col-12 col-lg-10">
				<form method="POST" action="{{url('perfil/primerEmpleo')}}">

					{{ csrf_field() }}

					<div class="form-group-estudios">
						<label>Nombre de la empresa:</label>
						@if( $empleo )
						<label type="text" name="empresa" id="empresa"
							class="form-control">{{ $empleo->empresa }}</label>
						@else
						<input type="text" name="empresa" id="empresa" class="form-control"
							placeholder="Nombre de la empresa" required autofocus>
						@endif
					</div>

					<div class="form-group-estudios">
						<label>Sector:</label>
						@if( $empleo )
						<label type="text" name="sector" id="sector" class="form-control">{{ $empleo->sector }}</label>
						@else
						<div class="radio">
							<input type="radio" name="sector" id="publica" value="Pública" checked="checked">
							<label for="publica" class="label-radio">Pública</label>

							<input type="radio" name="sector" id="privada" value="Privada">
							<label for="privada" class="label-radio">Privada</label>

							<input type="radio" name="sector" id="propia" value="Propia">
							<label for="propia" class="label-radio">Propia</label>
						</div>
						@endif
					</div>

					<div class="form-group-estudios">
						<label>Tiempo sin empleo:</label>
						@if($empleo)
						<label type="text" name="sinempleo" id="sinempleo"
							class="form-control">{{ $empleo->tiempo_sin_empleo }}</label>
						@else
						<select name="sinempleo" id="sinempleo" class="select" required>
							<option value="">-Selecionar-</option>
							<option value="< a 6 meses">
								< a 6 meses</option> <option value="De 6 a 9 meses">De 6 a 9 meses
							</option>
							<option value="De 10 a 12 meses">De 10 a 12 meses</option>
							<option value="> a 1 año">> a 1 año</option>
							<option value="No cuento con empleo aún">No cuento con empleo aún</option>
						</select>
						@endif
					</div>

					<div class="form-group-estudios">
						<label for="fingreso"> Fecha de ingreso:</label>
						@if( $empleo )
						<label type="text" name="fingreso" id="fingreso"
							class="form-control">{{ $empleo->fecha_ingreso }}</label>
						@else
						<input type="date" name="fingreso" id="fingreso" class="form-control" required>
						{{-- {{ Form::date('fingreso', $empleo->fecha_ingreso ) }} --}}
						@endif
					</div>

					<div class="form-group-estudios">
						<label for="puestoA">Puesto inicial:</label>
						@if($empleo)
						<label type="text" name="puestoA" id="puestoA"
							class="form-control">{{ $empleo->puesto_inicial }}</label>
						@else
						<input type="text" name="puestoA" id="puestoA" class="form-control" placeholder="Agregar puesto"
							required>
						@endif
					</div>

					<div class="form-group-estudios">
						<label for="puestoI">Puesto final:</label>
						@if($empleo)
						<label type="text" name="puestoI" id="puestoI"
							class="form-control">{{ $empleo->puesto_final }}</label>
						@else
						<input type="text" name="puestoI" id="puestoI" class="form-control" placeholder="Agregar puesto"
							required>
						@endif
					</div>

					<div class="form-group-estudios">
						<label for="contrato">Jornada de trabajo:</label>
						@if($empleo)
						<label type="text" name="contrato" id="contrato"
							class="form-control">{{ $empleo->jornada }}</label>
						@else
						<select name="contrato" id="inputTContrato" class="select" required>
							<option value="" checked>-Selecionar-</option>
							<option value="Completa">Completa</option>
							<option value="Medio">Media</option>
							<option value="Horas">Horas</option>
						</select>
						@endif
					</div>

					<div class="form-group-estudios">
						<label for="inputTContrato">Tipo de contrato:</label>
						@if($empleo)
						<label type="text" name="tcontrato" id="tcontrato"
							class="form-control">{{ $empleo->contrato }}</label>
						@else
						{!! Form::select('tcontrato', config('options.tipo_contrato'), "", ['class' => 'seleccion']) !!}
						@endif
					</div>

					<div class="form-group-estudios">
						<label for="">Teléfono de la empresa:</label>
						@if( $empleo )
						<label type="text" name="telefono" id="telefono"
							class="form-control">{{ $empleo->telefono_empresa }}</label>
						@else
						<input type="tel" name="telefono" id="telefono" class="form-control"
							placeholder="Agregar teléfono" pattern="[0-9]{9, 15}" required>
						@endif
					</div>

					<div class="form-group-estudios">
						<label>Ingreso mensual:</label>
						@if( $empleo )
						<label type="text" name="ingresomensual" id="ingresomensual"
							class="form-control">{{ $empleo->ingreso_mensual }}</label>
						@else
						<select name="ingresomensual" id="ingresomensual" class="select" required>
							<option value="">-Selecionar-</option>
							<option value='Menor a 1000'>Menor a 1000</option>
							<option value='De 1001 a 2000'>De 1001 a 2000</option>
							<option value='De 2500 a 4000'>De 2500 a 4000</option>
							<option value='Más de 4000'>Más de 4000</option>
						</select>
						@endif
					</div>

					<div class="form-group-estudios">
						<label for="tContrato">Sus actividades laborales:</label>
						@if( $empleo )
						@if( $empleo->actividad_laboral == 0 )
						<label type="text" name="actividades" id="actividades" class="form-control">Requieren de la
							formación de mi carrera</label>
						@elseif( $empleo->actividad_laboral == 1 )
						<label type="text" name="actividades" id="actividades" class="form-control">No requieren de la
							formación de mi carrera</label>
						@elseif( $empleo->actividad_laboral == 2 )
						<label type="text" name="actividades" id="actividades" class="form-control">No requieren de una
							profesión</label>
						@endif
						@else
						<select name="actividades" id="actividades" class="select" required>
							<option value="">-Selecionar-</option>
							<option value="0">Requieren de la formación de mi carrera</option>
							<option value="1">No requieren de la formación de mi carrera</option>
							<option value="2">No requieren de una profesión</option>
						</select>
						@endif
					</div>

					<div class="form-group-estudios">
						<label for="factores">Factores de contratación:</label>
						@if( $empleo )
						<label type="text" name="factor" id="factor"
							class="form-control">{{ $empleo->factores_contratacion }}</label>
						@else
						<input type="text" name="factor" id="factor" class="form-control" placeholder="Agrega factores"
							required>
						@endif
					</div>

					<div class="form-group-estudios">
						<label for="carencias">Carencias básicas:</label>
						@if( $empleo )
						<label type="text" name="carencia" id="carencia"
							class="form-control">{{ $empleo->carencias_basicas }}</label>
						@else
						<select name="carencia" id="carencia" class="select" required>
							<option value="">-Selecionar-</option>
							<option value="No tener competencias laborales">No tener competencias laborales</option>
							<option value="No estar titulado">No estar titulado</option>
							<option value="No acreditar las capacitaciones solicitadas">No acreditar las capacitaciones
								solicitadas</option>
							<option value="Ser egresado de la UTM">Ser egresado de la UNJBG</option>
							<option value="No dominar el idioma extranjero">No dominar el idioma extranjero</option>
							<option value="Inhabilidades Socio-comunicativas">Inhabilidades Socio-comunicativas</option>
							<option value="Otras">Otras</option>
						</select>
						@endif
					</div>

					<div class="form-group-estudios">
						<label for="areascarencias">Áreas de carencias:</label>
						@if( $empleo )
						<label type="text" name="areascarencia" id="areascarencia"
							class="form-control">{{ $empleo->carencias_areas }}</label>
						@else
						<input type="text" name="areascarencia" id="areascarencia" class="form-control"
							placeholder="Agrega carencias" required>
						@endif
					</div>

					<div class="form-group-estudios">
						<label for="posgrado">Motivos de no estudiar posgrado:</label>
						@if( $empleo )
						<label type="text" name="posgrado" id="posgrado"
							class="form-control">{{ $empleo->motivo_no_posgrado }}</label>
						@else
						<input type="text" name="posgrado" id="posgrado" class="form-control"
							placeholder="Agrega motivos" required>
						@endif
					</div>

					<div class="form-group-estudios">
						<label for="recomendacion">Recomendaciones:</label>
						@if( $empleo )
						<label type="text" name="recomendacion" id="recomendacion"
							class="form-control">{{ $empleo->recomendaciones }}</label>
						@else
						<input type="text" name="recomendacion" id="recomendacion" class="form-control"
							placeholder="Agrega recomendaciones para recien egresados" required>

						@endif
					</div>

					@if( $empleo == NULL )
					<div class="form-group text-center">
						<button type="submit" class="flat">
							Guardar
						</button>
					</div>
					@endif
				</form>
			</div>
			@endif
			<div class=" col-12 col-lg-1">
			</div>
		</div>
	</div>
</div>




<!--fin contenedor-->
@stop