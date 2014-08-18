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
            var correoRegistrado = validarCorreoRegistradoBD(eCorreo);
            alert(correoRegistrado);
            if(correoRegistrado){
                var coincide=validarContrasena(eCorreo, eContrasena, eError, 'La contraseña no es correcta');
                if(coincide){
//                    validarVistaRol(eCorreo, formulario);
                    formulario.submit();
                }
            }    
        }
    }
    
    function validarCorreoRegistradoBD(pcorreo){
        
        alert(pcorreo);
        $.ajax({
            url: '../includes/functions-seguridad.php',
            type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
            data: { // Objeto con los parámetros que utiliza el servicio.
                query : 'comprobarCorreo',
                pid : pcorreo
            },
            dataType: 'json',
            success: function(response) {
                // Imprimir los datos.
    //			mostrarCitas($.parseJSON(response.data));
                alert($.parseJSON(response.data));
                return $.parseJSON(response.data);
            }
        });
    }
    

    
}); /*addEvenListener = Observador del evento y function ejecuta la funcion dentro de  los corchetes cuando se ejecuta la funcion*/
