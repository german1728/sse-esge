$(document).ready(function () {
	//Comprueba que el documento se cargo correctamente
	//Eliminar oferta
	$('.btn-showDelete').click(function () {
		//accedemos a la clase del index. btn-delet
		var row = $(this).parents('tr');
		var oferta = row.data('oferta');
		var empresa = row.data('empresa');

		document.getElementById('oferta_id').innerHTML = '<input type="hidden" name="oferta_id" value="' + oferta.id + '"/>';

	});

	// Ver Oferta
	$('.btn-show').click(function () {
		var row = $(this).parents('tr');
		var oferta = row.data('oferta');
		var empresa = row.data('empresa');

		document.getElementById('getOferta').innerHTML = '<p class="texto-descripcion">' + oferta.titulo_empleo + '</p>';
		document.getElementById('getEmpresa').innerHTML = '<p class="texto-descripcion">' + empresa.nombre + '</p>';
		document.getElementById('getDescripcion').innerHTML = '<p class="texto-descripcion">' + oferta.descripcion + '</p>';
		document.getElementById('getUbicacion').innerHTML = '<p class="texto-descripcion">' + oferta.ubicacion + '</p>';
		document.getElementById('getSalario').innerHTML = '<p class="texto-descripcion">' + 'S/ ' + oferta.salario + '</p>';
		document.getElementById('getExperiencia').innerHTML = '<p class="texto-descripcion">' + oferta.experiencia + ' año(s) de experiencia' + '</p>';
		document.getElementById('getStatus').innerHTML = '<p class="texto-descripcion">' + oferta.status + '</p>';
		document.getElementById('getCarrera').innerHTML = '<p class="texto-descripcion">' + Carrera(oferta.carrera) + '</p>';
	});

});


function Carrera(n) {
	switch (n) {
		case 0: return "Ingeniería Geológica-Geotecnia";

		default: ;
	}
}