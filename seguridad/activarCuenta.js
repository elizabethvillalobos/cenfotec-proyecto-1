var eBtnActivar = document.querySelector('#btnActivar'),
    aInputs = document.querySelectorAll('form .form-control'),
    eError = document.querySelector('.alert-error'),
    regis=false;

eBtnActivar.addEventListener('click', function (evento) {

    var eCodigoActivacion = document.querySelector('#codigoAct').value,
        eCodigoConfirmacion = document.querySelector('#codigoConfirm').value,
        formulario = document.querySelector('#activacion');
    
    evento.preventDefault();
    
    var camposVacios=validarCamposLlenos(aInputs, eError, 'Todos los campos deben estar llenos');
    if(!camposVacios){
        var correcta=validarClave(eCodigoActivacion, eError, 'El código ingresado no coincide con el suministrado');
        if(correcta){
            var iguales=validarCamposIguales(eCodigoActivacion, eCodigoConfirmacion, eError, 'Los códigos no coinciden');
            if(iguales){
                formulario.submit();
            }
        }
    }
        





});