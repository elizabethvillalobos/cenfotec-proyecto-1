var ebtnCrearCarrera = document.querySelector('#btnCrearCarrera'),
  aInputs = document.querySelectorAll('form .form-control'),
	eError = document.querySelector('.alert-error'),
	regis=false,
	

ebtnCrearCarrera.addEventListener('click',function (evento) {
  
  alert('hola');
  evento.preventDefault();
  var camposVacios=validarCamposLlenos(aInputs, eError, 'Todos los campos deben estar llenos');
    
});





