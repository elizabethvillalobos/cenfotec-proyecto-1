var eBtnIniciarSesion = document.querySelector('.btn-primary'),
    aInputs = document.querySelectorAll('form .form-control'),
    eError = document.querySelector('.alert-error'),
    regis=false;



eBtnIniciarSesion.addEventListener('click', function (evento) {
    
    var eCorreo = document.querySelector('#email').value,
        eContrasena = document.querySelector('#contrasena').value,
        formulario = document.querySelector('#login');
    
    evento.preventDefault();
    
       
    var camposVacios=validarCamposLlenos(aInputs, eError, 'Todos los campos deben estar llenos');
    if(!camposVacios){
        var correoCorrecto=validarCorreo(eCorreo, eError, 'El correo es incorrecto');
        if(correoCorrecto){
            /*var correoRegistrado = validarCorreoRegistrado(eCorreo, eError, 'El correo no está registrado');*/
            var correoRegistrado = validarCorreoRegistradoBD(eCorreo, eError, 'El correo no está registrado');            
            if (correoRegistrado){                
                var rolUsuario=validarContrasenaBD(eCorreo, eContrasena, eError, 'La contraseña no es correcta');
                if(rolUsuario){
                    window.location.assign('/cenfotec-proyecto-1/index.php?usuarioActivoId='+correoRegistrado+'&usuarioActivoRol='+rolUsuario);
//                    formulario.submit();
                }
            }    
        }
    }
});

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
                
                console.log(response);
                if(!($.parseJSON(response.data))){
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
    
    function validarContrasenaBD(correoRegistrado, pContrasena, pElementoError, pMsjError){
        var respuesta;
        $.ajax({
            async: false,
            url: '../includes/service-seguridad.php',
            type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
            data: { // Objeto con los parámetros que utiliza el servicio.
                query : 'comprobarContrasena',
                pid : correoRegistrado,
                pcontrasena : pContrasena
            },
            dataType: 'json',
            success: function(response) {
                console.log($.parseJSON(response.data));
                if(!($.parseJSON(response.data))){
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
