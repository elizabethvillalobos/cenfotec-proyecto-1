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

function modificarCaracteres(pcaracteres){
    $.ajax({
 	
    	url: "../includes/service-configuracionGeneral.php",
    	type: "get",
    	data:{
      			'query': 'modificarCaracteres',
      			'pcaracteres': caracteres
    		},
    		dataType: 'json',
    		success: function(response) { 
    			window.location = "/cenfotec-proyecto-1/configuracion/configuracionGeneralConfirm.php";
    		},
    		error: function(response){
			} 
  	});
}

(function($) {
	$('#modificarDias').click(function(){
		var diasDeExpiracion = $('#diasExpiracion').val();
		limpiarMensajesError();

		if(diasExpiracion == ""){
			mostrarMensajeError(document.querySelector('#diasExpiracion'),"Este campo no puede estar vacío y solo acepta números");
		}else{
			modificarDias(diasDeExpiracion);
		}	
	});

	$('#modificarCaracteres').click(function(event){
		var caracteres = $('#caracteresMaximo').val();
		limpiarMensajesError();
		if(caracteres == ""){
			mostrarMensajeError(document.querySelector('#diasExpiracion'),"Este campo no puede estar vacío y solo acepta números");
		}else{
			modificarCaracteres(caracteres);
		}			
	});


	
})(jQuery);	

