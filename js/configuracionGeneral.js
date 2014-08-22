function modificarDias(pdias){
	$.ajax({
		url: '../includes/service-configuracionGeneral.php',
		type: 'get',
		data: {
				'query': 'modificarDiasDeExpiracion',
				'pdias': pdias
			},
			datatype: 'json',
			success: function(response){
				var data = $.parseJSON(response);
				if (data.status == 400) {
					mostrarMensajeError(document.querySelector('#diasExpiracion'),"Este campo no puede estar vacío y solo acepta números");
				} else {
					window.location = "/cenfotec-proyecto-1/configuracion/cambiarContrasena-confirmar.php";
				}
			},
			error: function(response){
				console.log(response);
				console.log("error");
				mostrarMensajeError(document.querySelector('#diasExpiracion'),"Este campo no puede estar vacío y solo acepta números");
			}
	});
}



(function($) {
	$('#modificarDias').click(function(){
		var diasDeExpiracion = $('#diasExpiracion').val();
		//limpiarMensajesError();

		if(diasExpiracion == ""){
			mostrarMensajeError(document.querySelector('#diasExpiracion'),"Este campo no puede estar vacío y solo acepta números");
		}else{
			modificarDias(diasDeExpiracion);
		}

		
			
	});

	
})(jQuery);	

