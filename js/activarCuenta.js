var eBtnActivar = document.querySelector('#btnActivar'),
    aInputs = document.querySelectorAll('form .form-control'),
    eError = document.querySelector('.alert-error'),
    regis=false;

eBtnActivar.addEventListener('click', function (evento) {

    var eCodigoActivacion = document.querySelector('#codigoAct').value,
        formulario = document.querySelector('#activacion');
    
    evento.preventDefault();
    
    var camposVacios=validarCamposLlenos(aInputs, eError, 'Todos los campos deben estar llenos');
    if(!camposVacios){
        var idActiv = getURLParameter("idActiv");
        console.log(idActiv);
        var correcta=validarCodigo(idActiv, eCodigoActivacion, eError, 'El código ingresado no coincide con el suministrado');
        if(correcta){
            console.log(idActiv);
            activarUsuario(idActiv);
            formulario.submit();
        }
    }

});

function getURLParameter(name){
        return decodeURI(
            (RegExp(name + '=' + '(.+?)(&|$)').exec(location.search)||[,null])[1]
        );
}

function validarCodigo(pidActiv, pcodigoActiv, pElementoError, pMsjError){
    var respuesta;
        $.ajax({
            async: false,
            url: '../includes/service-seguridad.php',
            type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
            data: { // Objeto con los parámetros que utiliza el servicio.
                query : 'comprobarCodigo',
                pid : pidActiv,
                pcodigo : pcodigoActiv
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

function activarUsuario(pidActiv) {

	var request = $.ajax({
        async: false,
		url: "/cenfotec-proyecto-1/includes/functions-seguridad.php",
		type: "post",
		data: {
                'call' : 'activarUsuario',
                'pidUsr' : pidActiv
                
			  },
		dataType: 'json',
		success: function(response){    
			
		}
	});
}