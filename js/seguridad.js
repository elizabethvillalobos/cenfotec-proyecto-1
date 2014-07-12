var eBtnIniciarSesion = document.querySelector('.btn-primary'),
    aInputs = document.querySelectorAll('form .form-control'),
    eError = document.querySelector('.alert-error'),
    eCorreo = document.querySelector('#mail').value,
    regis=false,
    document.querySelector('#login').submmit;

eBtnIniciarSesion.addEventListener('click', function (evento) {
    
    evento.preventDefault();
    var camposVacios=validarCamposLlenos(aInputs, eError, 'Todos los campos deben estar llenos');
    if(!camposVacios){
        validarCorreo(eCorreo, eError, 'El correo es incorrecto');
    }
    
    

    
}); /*addEvenListener = Observador del evento y function ejecuta la funcion dentro de  los corchetes cuando se ejecuta la funcion*/
