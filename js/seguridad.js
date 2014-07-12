var eBtnIniciarSesion = document.querySelector('.btn-primary'),
    aInputs = document.querySelectorAll('form .form-control'),
    eError = document.querySelector('.error');

eBtnIniciarSesion.addEventListener('click', function () {
    
   validarCamposLlenos(aInputs, eError, 'Los campos deben estar llenos');
    
    
}); /*addEvenListener = Observador del evento y function ejecuta la funcion dentro de  los corchetes cuando se ejecuta la funcion*/
