var citaCancelarSeleccionada;

// Esta función consulta las citas por día para el usuario actual.
// Utiliza ajax para consultar el servicio que retorna las citas.
function consultarCitas() {
	var fechaInicio = new Date($('#agenda-fecha').datepicker('getDate')), // Obtener la fecha seleccionada.
		fechaFin = new Date(fechaInicio),
		usuario = $('#usuarioActivoId').val(),
		rol = $('#usuarioActivoRol').val();
	fechaFin.setDate(fechaInicio.getDate() + 1);

	// Solicitar datos al servicio.
	$.ajax({
		url: '../includes/service-citas.php',
		type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
		data: { // Objeto con los parámetros que utiliza el servicio.
			query: 'consultarCitas',
			usuario: usuario,
			rol: rol,
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


function consultarCitaPorId(citaId) {
	$.ajax({
		url: '../includes/service-citas.php',
		type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
		data: { // Objeto con los parámetros que utiliza el servicio.
			query: 'consultarCitaPorId',
			citaId: citaId
		},
		dataType: 'json',
		success: function(response) {
			$(document).trigger('consultarCitaPorId', $.parseJSON(response.data));
		},
		error: function(response) {
			return $.parseJSON(response.data);	
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
  	initFinalizarCita();
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
			query: 'insertarCita',
			idSolicitante: 'evillalobosm@ucenfotec.ac.cr',
			idSolicitado: 'acordero@ucenfotec.ac.cr',
			fechaInicio: '2014-08-23 12:00:00',
			fechaFin: '2014-08-23 13:00:00',
			asunto: 'Prueba de insertar desde javascript',
			modalidad: '0',
			tipo: '0',
			observaciones: 'Testing...',
			curso: 'BISOFT-04'
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

function enviarEmailCreacionCita(citaId) {
	var mensaje,
		subject = 'Cita programada';

	$(document).bind('consultarCitaPorId', function(event, data) {
		$.ajax({
			url: '../includes/service-citas.php',
			type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
			data: { // Objeto con los parámetros que utiliza el servicio.
				query: 'consultarUsuarioPorId',
				usuarioId: data.correoSolicitado
			},
			dataType: 'json',
			success: function(response) {
				nombreSolicitado = $.parseJSON(response.data)[0].nombreCompleto;
				mensaje = '<h3">Nueva cita programada</h3>' +
					  '<table style="text-align: left; width: 100%; vertical-align: top;"><tbody>' + 
					  '<tr><th>Invitados:</th><td>' + data.nombreSolicitante + '<br />' + nombreSolicitado + '</td></tr>' + 
					  '<tr><th>Asunto a tratar:</th><td>' + data.asunto + '</td></tr>' + 
					  '<tr><th>Fecha:</th><td>' + data.fecha + '</td></tr>' + 
					  '<tr><th>Hora:</th><td>' + data.horaInicio + ' a ' + data.horaFin + '</td></tr>' +
					  '</tbody></table>';
				// Enviar correo a usuario solicitante
				enviarEmail(data.nombreSolicitante, subject, mensaje);
			},
			error: function(response) {
				console.log('error');
				console.log(response);
			}
		});		
	});

	consultarCitaPorId(citaId);
}


// Inicio Cancelar cita.
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
			citaCancelarSeleccionada = citaId;
		});
	}

	if ($btnCancelarConfirmar.length) {
		$btnCancelarConfirmar.on('click', function(event) {
			// Validar que el usuario haya ingresado el motivo de la cancelacion.
			limpiarMensajesError();
			if (validarForm('cancelar-cita')) {
				var citaId = $('#cita-id-cancelacion').val(),
					motivo = $('#motivo-cancelacion').val(),
					usuarioActivo = $('#usuarioActivoId').val();
				cancelarCita(citaId, motivo, usuarioActivo);
			}
		});
	}
}


// Ejecutar cancelar cita.
function cancelarCita(citaId, motivo, quienCancela) {
	$.ajax({
		url: '../includes/service-citas.php',
		type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
		data: { // Objeto con los parámetros que utiliza el servicio.
			query: 'cancelarCita',
			citaId: citaId,
			motivo: motivo,
			quienCancela: quienCancela
		},
		dataType: 'json',
		success: function(response) {
			var nombreSolicitado;
			if (citaCancelarSeleccionada) {
				nombreInvitado = $('#cita-id-' + citaCancelarSeleccionada).parent('.cita-pendiente').find('.cita-invitado').text();
				invitado = $('#cita-id-' + citaCancelarSeleccionada).parent('.cita-pendiente').find('.cita-invitado-id').text();
			}
			enviarEmailCancelacionCita(invitado, motivo, $('#loggedInUserName').val() + ' ' + $('#loggedInUserLastName1').val() + ' ' + $('#loggedInUserLastName2').val());
			mostrarMsgCancelacion(nombreInvitado);
		},
		error: function(response) {
			// Mostrar mensaje de error.
			console.log(response);
		}
	});
}

function mostrarMsgCancelacion(nombreInvitado) {
	var source = $("#template-msg-cancelar").html(),
		template = Handlebars.compile(source);

	// Cerrar el modal de cancelar cita.
	$('#modal-cancelar').find('.js-modal-close').click();

	// Mostrar el mensaje de confirmacion.
	$("#msg-container").html(template({
		nombreSolicitado: nombreInvitado
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
// End cancelar cita.


// Inicio Finalizar cita.
// Inicializar funciones para finalizar citas.
function initFinalizarCita() {
	var $btnFinalizarCita = $('.btn-finalizar'), // Boton que se muestra en cada cita.
		$btnFinalizarConfirmar = $('#btn-finalizar-cita'); // Boton del modal

	if ($btnFinalizarCita.length) {
		$btnFinalizarCita.on('click', function(event) {
			// Obtener el ID de la cita.
			var citaId = $(event.currentTarget).closest('.cita-pendiente').find('.cita-id').val();
			$('#cita-id-finalizacion').val(citaId);
		});
	}
	if ($btnFinalizarConfirmar.length) {
		$btnFinalizarConfirmar.on('click', function(event) {
			var citaId = $('#cita-id-finalizacion').val();
			finalizarCita(citaId);
		});
	}
}

// Ejecutar finalizar cita.
function finalizarCita(citaId) {
	$.ajax({
		url: '../includes/service-citas.php',
		type: 'get',
		data: {
			query: 'finalizarCita',
			citaId: citaId
		},
		dataType: 'json',
		success: function(response) {
			mostrarMsgFinalizacion(citaId);
		},
		error: function(response) {
			// Mostrar mensaje de error.
			console.log('error');
			console.log(response);
		}
	});
}

function mostrarMsgFinalizacion(citaId) {
	var source = $("#template-msg-finalizar").html(),
		template = Handlebars.compile(source);
	// Cerrar el modal de cancelar cita.
	$('#modal-finalizar').find('.js-modal-close').click();

	// Mostrar el mensaje de confirmacion.
	$("#msg-container").html(template({
		citaId: citaId
	}));

	// Esconder citas que se hayan mostrado previamente.
	$('.cita-pendiente').hide();
}
// End finalizar cita.


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
	// insertarCita();
})(jQuery);

