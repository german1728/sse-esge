$(document).ready(function () {

	$('.btn-empresa').click(function () {
		var row = $(this).parents('tr');
		var company = row.data('empresa');
		var contact = row.data('contacto');

		var dir = company.calle + ' #' + company.numero + ', ' + company.distrito + ', ' + company.ciudad + ', ' + company.departamento + ', CP: ' + company.codigo_postal;

		document.getElementById('id').innerHTML = '<input type="hidden" name="id" value="' + company.id + '"/>';

		document.getElementById('e_nombre').innerHTML = '<p class="texto-descripcion">' + company.nombre + '</p>';
		document.getElementById('e_direccion').innerHTML = '<p class="texto-descripcion">' + dir + '</p>';
		document.getElementById('e_telefono').innerHTML = '<p class="texto-descripcion">' + company.telefono + '</p>';
		document.getElementById('e_correo').innerHTML = '<p class="texto-descripcion">' + company.correo + '</p>';
		document.getElementById('e_contacto').innerHTML = '<p class="texto-descripcion">' + contact.nombre + '</p>';
		document.getElementById('e_puesto').innerHTML = '<p class="texto-descripcion">' + contact.puesto + '</p>';
	});

});