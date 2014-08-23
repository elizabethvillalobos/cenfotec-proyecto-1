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
				//var data = $.parseJSON(response);
				//if (data.status == 400) {
					//mostrarMensajeError(document.querySelector('#diasExpiracion'),"Este campo no puede estar vacío y solo acepta números");
				//} else {
					window.location = "/cenfotec-proyecto-1/configuracion/configuracionGeneralConfirm.php";
				//}
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
      			'pcaracteres': pcaracteres
    		},
    		dataType: 'json',
    		success: function(response) { 
    			//var data = $.parseJSON(response);
				//if (data.status == 400) {
					//mostrarMensajeError(document.querySelector('#caracteresMaximo'),"Este campo no puede estar vacío y solo acepta números");
				//} else {
					window.location = "/cenfotec-proyecto-1/configuracion/configuracionGeneralConfirm.php";
				//}
    		},
    		error: function(response){
				console.log(response);
				console.log("error");
				mostrarMensajeError(document.querySelector('#caracteresMaximo'),"Este campo no puede estar vacío y solo acepta números");
			} 
  	});
}

function modificarCorreoClave(correo, clave){
	$.ajax({
    	url: "../includes/service-configuracionGeneral.php",
    	type: "get",
    	data:{
      			'query': 'modificarCorreoClave',
      			'pcorreo': correo,
      			'pclave': clave
    		},
    		dataType: 'json',
    		success: function(response) { 
    			//var data = $.parseJSON(response);
				//if (data.status == 400) {
					//mostrarMensajeError(document.querySelector('#caracteresMaximo'),"Este campo no puede estar vacío y solo acepta números");
				//} else {
					window.location = "/cenfotec-proyecto-1/configuracion/configuracionGeneralConfirm.php";
				//}
    		},
    		error: function(response){
				console.log(response);
				console.log("error");
				mostrarMensajeError(document.querySelector('#password'),"Este campo no puede estar vacío y solo acepta números");
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

	$('#modificarCaracteres').click(function(){
		var caracteres = $('#caracteresMaximo').val();
		
		limpiarMensajesError();

		if(caracteres == ""){
			mostrarMensajeError(document.querySelector('#caracteresMaximo'),"Este campo no puede estar vacío y solo acepta números");
		}else{
			modificarCaracteres(caracteres);
		}			
	});

	$('#modificarNotificaciones').click(function(){
		var correo = $('#email').val(),
			clave = $('#password').val();
		
		modificarCorreoClave(correo, clave);	

	});	


})(jQuery);	

