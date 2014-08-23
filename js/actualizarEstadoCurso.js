function agregarListenersHabilitarDeshabilitar() {
	$('.form-row-buttonAcciones2profes > input#btnHabilitarCurso').on('click', function(){
		var elem_container = $(this).parent();
		elem_container.find('#btnDeshabilitarCurso').removeAttr('disabled');
		$(this).attr('disabled','disabled');
		updateStatus(elem_container.attr('id'),1);
	});

	$('.form-row-buttonAcciones2profes > input#btnDeshabilitarCurso').on('click', function(){
		var elem_container = $(this).parent();
		// console.debug(elem_container[0].tagName);
		elem_container.find('#btnHabilitarCurso').removeAttr('disabled'); //quita el atributo disable al boton habilitar					
		$(this).attr('disabled','disabled');	
		updateStatus(elem_container.attr('id'),0);
	});
}

function updateStatus(idcurso,estado) {
	var request = $.ajax({
		url: "/cenfotec-proyecto-1/includes/functions-carreras.php",
		type: "post",
		data: { 
				'call': 'actualizarEstadoCurso',
				'pId_curso': idcurso, 
				'pEstado': estado 
			},				
	});
}