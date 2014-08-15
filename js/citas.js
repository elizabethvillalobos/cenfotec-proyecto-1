var citaSeleccionada;

// Esta función consulta las citas por día para el usuario actual.
// Utiliza ajax para consultar el servicio que retorna las citas.
function consultarCitas() {
	var fechaInicio = new Date($('#agenda-fecha').datepicker('getDate')), // Obtener la fecha seleccionada.
		fechaFin = new Date(fechaInicio);
	fechaFin.setDate(fechaInicio.getDate() + 1);

	// Solicitar datos al servicio.
	$.ajax({
		url: '../includes/service-citas.php',
		type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
		data: { // Objeto con los parámetros que utiliza el servicio.
			query: 'consultarCitas',
			solicitante: 'evillalobosm@ucenfotec.ac.cr',
			fechaInicio: fechaInicio.toISOString(),
			fechaFin: fechaFin.toISOString()
		},
		dataType: 'json',
		success: function(response) {
			// Imprimir los datos.
			// console.log($.parseJSON(response.data));
			mostrarCitas($.parseJSON(response.data));
		},
		error: function(response) {
			// Mostrar mensaje de error.
			console.log(response);
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
	// Eliminar citas y mensajes que se hayan mostrado previamente.
	$('.cita-pendiente').remove();
	$('.msg-confirm').remove();

	if (citas === null) {
		$noCita.addClass('visible');
		return;
	}

	// Imprimir citas en el panel.
	var source = $("#template-cita").html(),
		template = Handlebars.compile(source);
  	$("#citas-container").html(template(citas));

  	// Ejecutar el codigo de los modal window para las citas que se agregaron.
  	modalWindow();
  	initCancelarCita();
}


// Insertar en la BD una nueva cita de atencion
// con datos dummy.
function insertarCita() {
	var fechaInicio = new Date($('#agenda-fecha').datepicker('getDate')), // Obtener la fecha seleccionada.
		fechaFin = new Date(fechaInicio);
	fechaFin.setDate(fechaInicio.getDate() + 1);

	// Insertar cita en la BD.
	$.ajax({
		url: '../includes/service-citas.php',
		type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
		data: { // Objeto con los parámetros que utiliza el servicio.
			query: 'insertar',
			idSolicitante: 'evillalobos@ucenfotec.ac.cr',
			idSolicitado: 'aluna@ucenfotec.ac.cr',
			fechaInicio: fechaInicio.toISOString(),
			fechaFin: fechaFin.toISOString(),
			asunto: 'Grafos',
			modalidad: '0',
			tipo: '0',
			observaciones: 'Testing testing testing...',
			curso: 'BISOFT1'
		},
		dataType: 'json',
		success: function(response) {
			console.log(response);
		},
		error: function(response) {
			// Mostrar mensaje de error.
			console.log(response);
		}
	});
}


// Inicializar funciones para cancelar citas.
function initCancelarCita() {
	var $btnCancelarCita = $('.btn-cancelar'), // Boton que se muestra en cada cita.
		$btnCancelarConfirmar = $('#btn-cancelar-cita'); // Boton del modal

	if ($btnCancelarCita.length) {
		$btnCancelarCita.on('click', function(event) {
			// Obtener el ID de la cita.
			var citaId = $(event.currentTarget).closest('.cita-pendiente').find('.cita-id').val(),
				$citaCancelacionInput = $('#cita-id-cancelacion'),
				$motivo = $('#motivo-cancelacion').val('');
			// Setear el ID de la cita en el input del modal.
			$citaCancelacionInput.val(citaId);
			$motivo.focus();
			citaSeleccionada = citaId;
		});
	}

	if ($btnCancelarConfirmar.length) {
		$btnCancelarConfirmar.on('click', function(event) {
			// Validar que el usuario haya ingresado el motivo de la cancelacion.
			limpiarMensajesError();
			if (validarForm('cancelar-cita')) {
				var citaId = $('#cita-id-cancelacion').val(),
					motivo = $('#motivo-cancelacion').val();
				// TODO: actualizar con el correo del usuario activo en la sesion.
				cancelarCita(citaId, motivo, 'evillalobos@ucenfotec.ac.cr');
			}
		});
	}
}


// Ejecutar cancelar cita.
function cancelarCita(citaId, motivo, idSolicitante) {
	$.ajax({
		url: '../includes/service-citas.php',
		type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
		data: { // Objeto con los parámetros que utiliza el servicio.
			query: 'cancelar',
			citaId: citaId,
			motivo: motivo,
			idSolicitante: idSolicitante
		},
		dataType: 'json',
		success: function(response) {
			var nombreSolicitado;
			if (citaSeleccionada) {
				nombreSolicitado = $('#cita-id-' + citaSeleccionada).parent('.cita-pendiente').find('.cita-invitado').text();
			}
			enviarEmailCancelacionCita('villaloboselizabeth@gmail.com', motivo, nombreSolicitado);
			mostrarMsgCancelacion(nombreSolicitado);
		},
		error: function(response) {
			// Mostrar mensaje de error.
			console.log(response);
		}
	});
}

function mostrarMsgCancelacion(nombreSolicitado) {
	var source = $("#template-msg-cancelar").html(),
		template = Handlebars.compile(source);

	// Cerrar el modal de cancelar cita.
	$('#modal-cancelar').find('.js-modal-close').click();

	// Mostrar el mensaje de confirmacion.
	$("#msg-container").html(template({
		nombreSolicitado: nombreSolicitado
	}));

	// Eliminar citas que se hayan mostrado previamente.
	$('.cita-pendiente').hide();
}


function enviarEmailCancelacionCita(to, motivo, solicitante) {
	var mensaje = '<h3>Cita cancelada</h3>' +
				  '<p>La cita de atenci&oacute;n con <b>' + decodeURI(solicitante) + '</b> fue cancelada por el siguiente motivo:</p>' + 
				  '<p style="font-style: italic;">' + motivo + '</p>',
		subject = 'Cita cancelada';

	enviarEmail(to, subject, mensaje);
}

function enviarEmailCreacionCita(citaId) {
	// Obtener la información de la cita.
	$.ajax({
		url: '../includes/service-citas.php',
		type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
		data: { // Objeto con los parámetros que utiliza el servicio.
			query: 'consultarCitaPorId',
			citaId: 33
		},
		dataType: 'json',
		success: function(response) {
			// Imprimir los datos.
			console.log($.parseJSON(response.data));
		},
		error: function(response) {
			// Mostrar mensaje de error.
			console.log(response);
		}
	});


	// var mensaje = '<h3>Cita cancelada</h3>' +
	// 			  '<p>La cita de atenci&oacute;n con <b>' + decodeURI(solicitante) + '</b> fue cancelada por el siguiente motivo:</p>' + 
	// 			  '<p style="font-style: italic;">' + motivo + '</p>',
	// 	subject = 'Cita cancelada';

	// enviarEmail(to, subject, mensaje);
}


// DOM ready
(function($) {
	// Inicializar el plugin del calendario y la funcion
	// que muestra las citas para el dia actual.
	var $agenda = $('#agenda-fecha');
	if ($agenda.length) {
		$agenda.datepicker({
			dateFormat: 'dd/mm/yy',
			dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
			hideOnSelect: false,
			minDate: new Date(),
			monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
			'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre'],
			nextText: 'Sig',
			prevText: 'Prev'
		});
		$agenda.datepicker('show');
		// Seleccionar el dia de hoy.
		$('#agenda-fecha').datepicker('setDate', new Date());

		// Add listener.
		$agenda.on('change', function() {
			consultarCitas();
		});

		// Cargar las citas para el dia de hoy.
		consultarCitas();
	}

	// enviarEmailCancelacionCita();
	enviarEmailCreacionCita();
})(jQuery);

