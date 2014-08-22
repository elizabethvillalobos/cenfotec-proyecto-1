var eBtnRegistrar = document.querySelector('#btnRegistrar'),
    aInputs = document.querySelectorAll('form .form-control'),
    eError = document.querySelector('.alert-error'),
    regis=false
    activo = null;

eBtnRegistrar.addEventListener('click', function (evento) {
    
    var eCorreo = document.querySelector('#email').value,
        eContrasena = document.querySelector('#contrasena').value,
        eConfirmContrasena = document.querySelector('#confirmContrasena').value,
        eCodigoActiv = document.querySelector('#codigoActiv'),
        caracteres = "0123456789abcdefABCDEF",
        longitud = 8,
        formulario = document.querySelector('#form-registro');
    
    evento.preventDefault();
    
    var camposVacios=validarCamposLlenos(aInputs, eError, 'Todos los campos deben estar llenos');
    if(!camposVacios){
        var correoCorrecto=validarCorreo(eCorreo, eError, 'El correo es incorrecto');
        if(correoCorrecto){
            var segura=validarSeguridadContrasena(eContrasena, eError, 'La contraseña debe contener de 8 a 10 caracteres incluyendo numeros, sin caracteres especiales.');
            if(segura){
                var iguales=validarCamposIguales(eContrasena, eConfirmContrasena, eError, 'Las contraseñas no coinciden');
                if(iguales){
                    var correoRegistrado = validarCorreoRegistradoBD(eCorreo, eError, 'El correo ya está registrado');
                    if(correoRegistrado==null){
                    registrarUsuario(activo);
                    var codigo = rand_code(caracteres, longitud);
                    console.log('Codigo activacion: '+codigo);
                    gaurdarCodigoActivacion(eCorreo, codigo);
                    enviarEmail(eCorreo, 'Activacion de cuenta', codigo+'Link de activacion: <a src="http://localhost/cenfotec-proyecto-1/seguridad/activarCuenta.php?idActiv='+eCorreo+'">Activar</a>');
                    alert('registrado');    
                    //formulario.submit();
                    }    
                    /*var correoRegistrado = validarCorreoRegistradoBD(eCorreo, eError, 'El correo ya está registrado'); 
                    if(correoRegistrado){
                    var codigo = rand_code(caracteres, longitud);
                    
                    crearUsuario(activo);
                    localStorage.setItem('codigoActivacion', codigo);
                    //formulario.submit();
                    }    */
                }
            }
        }
    }
    

    
}); /*addEvenListener = Observador del evento y function ejecuta la funcion dentro de  los corchetes cuando se ejecuta la funcion*/

function validarCorreoRegistradoBD(pcorreo, pElementoError, pMsjError){
    var respuesta;
        $.ajax({
            async: false,
            url: '../includes/service-seguridad.php',
            type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
            data: { // Objeto con los parámetros que utiliza el servicio.
                query : 'comprobarCorreo',
                pid : pcorreo
            },
            dataType: 'json',
            success: function(response) {
                
                console.log($.parseJSON(response.data));
                if($.parseJSON(response.data)){
                    pElementoError.innerHTML=pMsjError;
                    pElementoError.className += ' error';
                }
                respuesta = $.parseJSON(response.data);
            },
            error: function(response) {
                console.log(response);
            }
        });
    return respuesta;
    }

function registrarUsuario(pactivo) {
	var nombre = $('#nombre').val(),
		apellido1 = $('#apellido1').val(),
		apellido2 = $('#apellido2').val(),
        idUsr = $('#email').val(),
        contrasena = $('#contrasena').val(),
        rol = 5,
        activo = pactivo;

	var request = $.ajax({
        async: false,
		url: "/cenfotec-proyecto-1/includes/functions-usuarios.php",
		type: "post",
		data: {
                'call' : 'insertarUsuario',
			   'pnombre': nombre,
			   'papellido1' : apellido1,
			   'papellido2' : apellido2,
                'pidUsr' : idUsr,
                'pcontrasena': contrasena,
                'prol': rol,
                'pusr-activo' : activo
			  },
		dataType: 'json',
		success: function(response){    
			
		}
	});
}

function gaurdarCodigoActivacion(pcorreo, pcodigoAct) {
	var idUsr = pcorreo,
        codigo = pcodigoAct;

	var request = $.ajax({
        async: false,
		url: "/cenfotec-proyecto-1/includes/functions-usuarios.php",
		type: "post",
		data: {
                'call' : 'insertarCodigoActivacion',
                'pid' : idUsr,
                'pcodigo' : codigo
			  },
		dataType: 'json',
		success: function(response){    
			
		}
	});
}