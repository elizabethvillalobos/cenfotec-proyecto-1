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
            var correoRegistrado = validarCorreoRegistrado(eCorreo, eError, 'El correo no está registrado');
            if(correoRegistrado){
    
                formulario.submit();
            
            }    
        }
    }
    
   
    

    
}); /*addEvenListener = Observador del evento y function ejecuta la funcion dentro de  los corchetes cuando se ejecuta la funcion*/
