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
				mostrarMensajeError(document.querySelector('#caracteresMaximo'),"Este campo no puede estar vacío y solo acepta números");
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
			clave = $('#password').val(),
			error1 = false,
			error2 = false;
		
		modificarCorreoClave(correo, clave);

		/*function validarCampos(){
			if(correo == ""){
				mostrarMensajeError(document.querySelector('#email'),"Este campo no puede estar vacío");
			}else{
				validarCorreo();
			}
			if(clave == ""){
				mostrarMensajeError(document.querySelector('#password'),"Este campo no puede estar vacío");
			}else{
				validarSeguridadClave();
			}	
		}

		function validarSeguridadClave(){ 
  			var expreg = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
  			if(!expreg.test(clave)){
      			mostrarMensajeError(document.querySelector('#password'),"La contraseña debe ser de 8 a 10 caracteres, no debe tener caracteres especiales e incluye al menos una letra mayúscula y un número");
  				error1 = true;
  			}else{
  				error1 = false;
  			}
		}

		function validarCorreo() { 
  			var expreg = /^\w+@ucenfotec.ac.cr$/;
  			if(!expreg.test(correo)){
      			mostrarMensajeError(document.querySelector('#email'),"El correo debe ser del dominio de Cenfotec");
      			error2 = true;
  			}else{
  				error2 = false;	
  			}
		}*/

	});	


})(jQuery);	

