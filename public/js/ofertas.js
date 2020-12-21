$(document).ready(function () {

	// var row = $(this).parents('tr');
	// var empresa = row.data('empresa');
	// if (empresa == null){
	// 	window.location = APP_URL;
	// }

	$('.btn-empresa').click(function () {
		var row = $(this).parents('tr');
		var empresa = row.data('empresa');
		var contact = row.data('contacto');

		var dir = empresa.calle + ' #' + empresa.numero + ', ' + empresa.distrito + ', ' + empresa.ciudad + ', ' + empresa.departamento + ', CP: ' + empresa.codigo_postal;
		var nombre = document.getElementById('e_nombre');
		var direccion = document.getElementById('e_direccion');
		var telefono = document.getElementById('e_telefono');
		var correo = document.getElementById('e_correo');
		var contacto = document.getElementById('e_contacto');
		var puesto = document.getElementById('e_puesto');

		nombre.innerHTML = '<p class="texto-descripcion">' + empresa.nombre + '</p>';
		direccion.innerHTML = '<p class="texto-descripcion">' + dir + '</p>';
		telefono.innerHTML = '<p class="texto-descripcion">' + empresa.telefono + '</p>';
		correo.innerHTML = '<p class="texto-descripcion">' + empresa.correo + '</p>';
		contacto.innerHTML = '<p class="texto-descripcion">' + contact.nombre + '</p>';
		puesto.innerHTML = '<p class="texto-descripcion">' + contact.puesto + '</p>';
	});
	$('#detalleOferta').on('shown.bs.modal', function (event) {

		// The reference tag is your anchor tag here
		var reference_tag = $(event.relatedTarget);
		var empresa = reference_tag.data('empresa');
		var oferta = reference_tag.data('oferta');
		var contact = reference_tag.data('contacto');

		document.getElementById('nombre_contacto').innerHTML = contact.nombre;
		document.getElementById('puesto_contacto').innerHTML = contact.puesto;

		document.getElementById('numero_contacto').innerHTML = contact.telefono;
		document.getElementById('correo_contacto').innerHTML = contact.correo;
		document.getElementById('recomendaciones_oferta').innerHTML = empresa.recomendaciones;

		var puesto = document.getElementById('oferta_puesto');
		var name_empresa = document.getElementById('oferta_empresa');
		var salario = document.getElementById('oferta_salario');
		var descripcion = document.getElementById('oferta_descripcion');
		var carrera = document.getElementById('oferta_carrera');
		var experiencia = document.getElementById('oferta_experiencia');
		var ubicacion = document.getElementById('oferta_ubicacion');

		puesto.innerHTML = oferta.titulo_empleo;
		name_empresa.innerHTML = empresa.nombre;
		descripcion.innerHTML = oferta.descripcion;
		carrera.innerHTML = elijeCarrera(oferta.carrera) + " o áreas afines.";
		experiencia.innerHTML = elijeExperiencia(oferta.experiencia);
		salario.innerHTML = "Con un salario base de " + 'S/' + oferta.salario;
		ubicacion.innerHTML = oferta.ubicacion;
	})


});

function elijeExperiencia(n) {
	switch (n) {
		case 0: return "Sin Experiencia.";
		case 1: return "Con " + n + " año de experiencia.";
		default: return "Con " + n + " años de experiencia."
	}
}

function elijeCarrera(n) {
	switch (n) {
		case 0: return "Ingeniero Geológico – Geotécnico";

		default: ;
	}
}