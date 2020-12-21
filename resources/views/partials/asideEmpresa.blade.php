<div class="tile p-0">
	<ul class="nav flex-column nav-tabs user-tabs">
		<li class="nav-item"><a class="nav-link {{ Request::is('directorio/empresa') ? 'active' : ''}}"
				href="{{url('directorio/empresa')}}" onclick="event.preventDefault(); 
			document.getElementById('directorio-form').submit();">Datos básicos</a>
			<form id="directorio-form" action="{{url('directorio/empresa')}}" method="get" style="display: none;">
				{{ csrf_field() }}

				<div class="descripcion" id="id">
					<input type="hidden" name="id" value='{{$request->id}}' />';
				</div>
			</form>
		</li>

		<li class="nav-item">
			<a class="nav-link {{ Request::is('directorio/empresa/comentarios') ? 'active' : ''}}"
				href="{{url('directorio/empresa/comentarios')}}" onclick="event.preventDefault(); 
			document.getElementById('comentarios-form').submit();">Comentarios recibidos</a>
			<form id="comentarios-form" action="{{url('directorio/empresa/comentarios')}}" method="get"
				style="display: none;">
				{{ csrf_field() }}

				<div class="descripcion" id="id">
					<input type="hidden" name="id" value='{{$request->id}}' />';
				</div>
			</form>
		</li>
		<li class="nav-item">
			<a class="nav-link {{ Request::is('directorio/empresa/ofertas') ? 'active' : ''}}"
				href="{{url('directorio/empresa/ofertas')}}" onclick="event.preventDefault(); 
			document.getElementById('ofertas-form').submit();">Ofertas laborales</a>
			<form id="ofertas-form" action="{{url('directorio/empresa/ofertas')}}" method="get" style="display: none;">
				{{ csrf_field() }}

				<div class="descripcion" id="id">
					<input type="hidden" name="id" value='{{$request->id}}' />';
				</div>
			</form>
		</li>

	</ul>

</div>