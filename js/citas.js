// Esta función consulta las citas por día para el usuario actual.
// Utiliza ajax para consultar el servicio que retorna las citas.
function consultarCitas(event) {
	var $fecha = $(event.currentTarget).val(); // Obtener la fecha seleccionada.

	// Solicitar datos al servicio.
	$.ajax({
		url: '../includes/services.php',
		type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
		data: { // Objeto con los parámetros que utiliza el servicio.
			solicitante: 'evillalobos@ucenfotec.ac.cr'
		},
		dataType: 'json',
		success: function(response) {
			console.log(response.data);
			// Imprimir los datos.
			mostrarCitas($.parseJSON(response.data));
		},
		error: function(response) {
			console.log('error');
			console.log(response);
			// Mostrar mensaje de error.
		}
	});
}


// Esta función muestra en el panel del módulo de citas
// las citas que recibe por parámetro.
// El parámetro citas debe ser un objeto JSON.
function mostrarCitas(citas) {
	var $noCita = $('.no-cita');

	// Esconde el elemento que muestra el mensaje de que no hay citas.
	$noCita.removeClass('visible');

	if (citas) {
		// Imprimir citas en el panel.
		var source = $("#template-cita").html(),
			template = Handlebars.compile(source);
  		$("#citas-container").html(template(citas));
	} else {
		$noCita.addClass('visible');
	}
}

// DOM ready
(function($) {
	var eAgenda = $('#agenda-fecha');
	if (eAgenda.length) {
		eAgenda.datepicker({
			dateFormat: 'dd/mm/yy',
			dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
			hideOnSelect: false,
			minDate: new Date(),
			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
			'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			nextText: 'Sig',
			prevText: 'Prev'
		});
		eAgenda.datepicker('show');
	}
	$('#agenda-fecha').on('change', consultarCitas);
})(jQuery);