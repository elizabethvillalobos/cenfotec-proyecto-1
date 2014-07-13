var ebtnCrearCurso = document.querySelector('#btnCrearCurso'),
	aInputs = document.querySelectorAll('form .form-control'),
	eError = document.querySelector('.alert-error'),
	regis=false,
	ecodigo = document.querySelector('#txtCodCurso'),
  ebtnCrearCarrera = document.querySelector('#btnCrearCarrera');

/* validar crear curso */

ebtnCrearCurso.addEventListener('click',function (evento) {
	
	evento.preventDefault();
    var camposVacios=validarCamposLlenos(aInputs, eError, 'Todos los campos deben estar llenos');
    
 
	});

ebtnCrearCarrera.addEventListener('click',function (evento) {
  
  alert('hola');
  evento.preventDefault();
  var camposVacios=validarCamposLlenos(aInputs, eError, 'Todos los campos deben estar llenos');
    
 
  });




function soloGuion(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "áéíóúabcdefghijklmnñopqrstuvwxyz1234567890-";
    especiales = "8-37-39-46";

    tecla_especial = false
    for(var i in especiales) {
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }

    if (letras.indexOf(tecla)==-1 && !tecla_especial) {
        return false;
    }
}

