var eBtnRecuperar = document.querySelector('.btn-primary'),
    aInputs = document.querySelectorAll('form .form-control'),
    eError = document.querySelector('.alert-error'),
    regis=false;

eBtnRecuperar.addEventListener('click', function (evento) {
    
    var eCorreo = document.querySelector('#email').value,
        formulario = document.querySelector('#recuperarContra');
    
    evento.preventDefault();
    
    var camposVacios=validarCamposLlenos(aInputs, eError, 'Todos los campos deben estar llenos');
    if(!camposVacios){
        var correoCorrecto=validarCorreo(eCorreo, eError, 'El correo es incorrecto');
        if(correoCorrecto){
            var correoRegistrado = validarCorreoRegistradoBD(eCorreo, eError, 'El correo no está registrado');
            if(correoRegistrado){
                var contrasena = obtenerContrasenaBD(eCorreo);
                console.log(contrasena);
                var mensaje = '<p>Este es el código para activar la cuenta: <strong>'+contrasena+'</strong></p>'+
                        '<p>Presione "Ir al gestor de citas" poder acceder al sistema</p>  ';    

                enviarEmail(eCorreo, 'Recordatorio de contraseña', mensaje);
                console.log('enviado');    
                formulario.submit();
            
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

function obtenerContrasenaBD(correoRegistrado){
        var respuesta;
        $.ajax({
            async: false,
            url: '../includes/service-seguridad.php',
            type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
            data: { // Objeto con los parámetros que utiliza el servicio.
                query : 'obtenerContrasena',
                pid : correoRegistrado
            },
            dataType: 'json',
            success: function(response) {
                console.log($.parseJSON(response.data));
                
                respuesta = $.parseJSON(response.data);
            },
            error: function(response) {
                console.log(response);
            }
        });
        return respuesta;
    }