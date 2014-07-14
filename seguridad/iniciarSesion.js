var eBtnIniciarSesion = document.querySelector('.btn-primary'),
    aInputs = document.querySelectorAll('form .form-control'),
    eError = document.querySelector('.alert-error'),
    regis=false;

eBtnIniciarSesion.addEventListener('click', function (evento) {
    
    var eCorreo = document.querySelector('#email').value,
        eContrasena = document.querySelector('#contrasena').value;
    
    evento.preventDefault();
    
    var camposVacios=validarCamposLlenos(aInputs, eError, 'Todos los campos deben estar llenos');
    if(!camposVacios){
        var correoCorrecto=validarCorreo(eCorreo, eError, 'El correo es incorrecto');
        if(correoCorrecto){
            var coincide=validarContrasena(eCorreo, eContrasena, eError, 'La contraseña no es correcta');
            if(coincide){
                alert('Bienvenido');
                document.submmit('#login');
            }
        }
    }
    
    
    
    

    
}); /*addEvenListener = Observador del evento y function ejecuta la funcion dentro de  los corchetes cuando se ejecuta la funcion*/
