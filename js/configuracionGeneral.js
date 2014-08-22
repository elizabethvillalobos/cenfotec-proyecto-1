function actualizarContrasena(pdias){
	$.ajax({
		url: '../includes/service-configuracionGeneral.php',
		type: 'get',
		data: {
				'query': 'modificarDiasDeExpiracion',
				'pdias': pdias
			},
			datatype: 'json',
			success: function(response){
				console.log(response);
				//window.location = "/cenfotec-proyecto-1/configuracion/cambiarContrasena-confirmar.php";
			},
			error: function(response){
				console.log(response);
				console.log("error");
			}
	});
}



(function($) {
	$('#modificarDias').click(function(){
		var diasDeExpiracion = $('#diasExpiracion').val();
		
		if(diasExpiracion == ""){
			mostrarMensajeError(document.querySelector('#diasExpiracion'),"Este campo no puede estar vacío y solo acepta números");
		}else{
			modificarDias(diasDeExpiracion);
		}

		
			
	});

	
})(jQuery);	

