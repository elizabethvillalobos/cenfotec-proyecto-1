(function($) {
	$('#btn-guardar-contrasena').click(function(event){
		var usuarioActivo = $('#usuario-activo').val(),
			claveUsuario = $('#clave-usuario').val(),
			contrasenaActual = $('#contrasena-actual').val(),
			contrasenaNueva = $('#contrasena-nueva').val(),
			contrasenaConfirmar = $('#contrasena-confirmar').val(),
			error1 = false,
			error2 = false,
			error3 = false;
		
		event.preventDefault();
		limpiarMensajesError();

		
		function guardarContrasena(){
			validarFormulario();
			if((error1 == false) && (error2 == false) && (error3 == false)){
				actualizarContrasena();
			}
		}

		function validaConstrasenaActual(){
			if(contrasenaActual != claveUsuario){
				mostrarMensajeError(document.querySelector('#contrasena-actual'),"Esta contraseña no coincide con su contraseña actual");	
				error1 = true;
			}else{
				error1 = false;
			}
		}

		function validarSeguridadClave(){ 
  			var expreg = /(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/;
  			if(!expreg.test(contrasenaNueva)){
      			mostrarMensajeError(document.querySelector('#contrasena-nueva'),"La contraseña debe ser de 8 a 10 caracteres, no debe tener caracteres especiales e incluye al menos una letra mayúscula y un número");
  				error2 = true;
  			}else{
  				error2 = false;
  			}
		}

		function validaClavesIguales(){
			if(contrasenaConfirmar != contrasenaNueva){
				mostrarMensajeError(document.querySelector('#contrasena-confirmar'),"La contraseña no coincide");
				error3 = true;
			}else{
				error3 = false;
			}
		}

		function validarFormulario(){
			
			if(contrasenaActual == ""){
				mostrarMensajeError(document.querySelector('#contrasena-actual'),"Este campo no puede estar vacío");
			}else{
				validaConstrasenaActual();
			}
			if(contrasenaNueva == ""){
				mostrarMensajeError(document.querySelector('#contrasena-nueva'),"Este campo no puede estar vacío");
			}else{
				validarSeguridadClave();
			}
			if(contrasenaConfirmar == ""){
    			mostrarMensajeError(document.querySelector('#contrasena-confirmar'),"Este campo no puede estar vacío");
    		}else{
    			validaClavesIguales();
    		}
		}	

		function actualizarContrasena(){
			$.ajax({
				url: '../includes/service-micuenta.php',
				type: 'get',
				data: {
					'query': 'updateContrasena',
					'contrasena': contrasenaNueva,
					'usuarioActivoId': usuarioActivo
				},
				datatype: 'json',
				success: function(response){
					//password = $.parseJSON(response.data);
					window.location = "/cenfotec-proyecto-1/configuracion/cambiarContrasena-confirmar.php";
				},
				error: function(response){
				}
			});
		}

		guardarContrasena();
		
	});
})(jQuery);



	
	
	



