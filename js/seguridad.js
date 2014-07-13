var eBtnIniciarSesion = document.querySelector('.btn-primary'),
    aInputs = document.querySelectorAll('form .form-control'),
    eError = document.querySelector('.alert-error'),
    eCorreo = document.querySelector('#login #email').value,
    eContraseña = document.querySelector('#login #contraseña').value,
    regis=false;

eBtnIniciarSesion.addEventListener('click', function (evento) {
    
    alert(eCorreo);
    alert(eContraseña);
    evento.preventDefault();
    var camposVacios=validarCamposLlenos(aInputs, eError, 'Todos los campos deben estar llenos');
    if(!camposVacios){
        var correoCorrecto=validarCorreo(eCorreo, eError, 'El correo es incorrecto');
    }
    
    if(correoCorrecto){
        document.querySelector('#login').submmit;
    }
    
    

    
}); /*addEvenListener = Observador del evento y function ejecuta la funcion dentro de  los corchetes cuando se ejecuta la funcion*/
