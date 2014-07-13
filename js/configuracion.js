var ebtnCrear = document.querySelector('#btnCrearCurso'),
	aInputs = document.querySelectorAll('form .form-control'),
	eError = document.querySelector('.alert-error'),
	regis=false,
	ecodigo = document.querySelector('#txtCodCurso');

/* validar crear curso */

ebtnCrear.addEventListener('click', function (evento) {
	
	evento.preventDefault();
    var camposVacios=validarCamposLlenos(aInputs, eError, 'Todos los campos deben estar llenos');
    
 
	});



