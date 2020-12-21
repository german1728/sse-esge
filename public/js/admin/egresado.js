$(document).ready(function () {//Comprueba que el documento se cargo correctamente

	//Eliminar tip
	$('.btn-showDelete').click(function () {//accedemos a la clase del index. btn-delet
		var row = $(this).parents('tr');
		var egresado = row.data('egresado');


		document.getElementById('eg_matricula').innerHTML = '<input  hidden name="matricula" value="' + egresado.matricula + '"/>';

	});

	//Ver tip
	$('.btn-show').click(function () {//accedemos a la clase del index. btn-delet
		var row = $(this).parents('tr');
		var egresado = row.data('egresado');
		var preparacion = row.data('preparacion');
		var usuario = row.data('usuario');

		var nombre_completo = egresado.ap_paterno + ' ' + egresado.ap_materno + ' ' + egresado.nombres;
		document.getElementById('egv_correo').innerHTML = '<p class="texto-descripcion">' + usuario.correo + '</p>';
		document.getElementById('egv_nombreComp').innerHTML = '<p class="texto-descripcion">' + nombre_completo + '</p>';
		document.getElementById('egv_dni').innerHTML = '<p class="texto-descripcion">' + egresado.dni + '</p>';
		document.getElementById('egv_cv').innerHTML = '<a class="btn btn-secondary" target="_blank" href="../storage/' + egresado.cv_url + '"><li class="fa fa-file-pdf-o fa-2x text-white pr-1"></li>Ver PDF</a>';
		if (egresado.genero == 'Masculino')
			document.getElementById('egv_genero').innerHTML = '<p class="texto-descripcion">Masculino</p>';
		else
			document.getElementById('egv_genero').innerHTML = '<p class="texto-descripcion">Femenino</p>';

		document.getElementById('egv_fechaNac').innerHTML = '<p class="texto-descripcion">' + egresado.fecha_nacimiento + '</p>';

		if (egresado.nacionalidad == 'Peruana')
			document.getElementById('egv_nacionalidad').innerHTML = '<p class="texto-descripcion">Peruana</p>';
		else
			document.getElementById('egv_nacionalidad').innerHTML = '<p class="texto-descripcion">Otra</p>';

		if (egresado.telefono)
			document.getElementById('egv_telefono').innerHTML = '<p class="texto-descripcion">' + egresado.telefono + '</p>';
		else
			document.getElementById('egv_telefono').innerHTML = '<p class="texto-descripcion">' + "Teléfono no registrado" + '</p>';

		document.getElementById('egv_lugarOrig').innerHTML = '<p class="texto-descripcion">' + egresado.lugar_origen + '</p>';
		document.getElementById('egPrv_carrera').innerHTML = '<p class="texto-descripcion">' + Carrera(preparacion.carrera) + '</p>';
		document.getElementById('egPrv_generacion').innerHTML = '<p class="texto-descripcion">' + preparacion.generacion + '</p>';
		document.getElementById('egPrv_fechaI').innerHTML = '<p class="texto-descripcion">' + preparacion.fecha_inicio + '</p>';
		document.getElementById('egPrv_fechaF').innerHTML = '<p class="texto-descripcion">' + preparacion.fecha_fin + '</p>';
	});

});


function Carrera(n) {
	switch (n) {
		case 0: return "Ingeniería Geológica-Geotecnia";


		default: ;
	}
}