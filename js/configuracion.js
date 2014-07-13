var ebtnCrear = document.querySelector('#btnCrearCurso'),
	aInputs = document.querySelectorAll('form .form-control'),
	eError = document.querySelector('.alert-error'),
	regis=false,
	ecodigo = document.querySelector('#txtCodCurso');

/* validar crear curso */

ebtnCrear.addEventListener('click',function (evento) {
	
	evento.preventDefault();
    var camposVacios=validarCamposLlenos(aInputs, eError, 'Todos los campos deben estar llenos');
    
 
	});

function soloGuion(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       caracteresAdmitidos = "áéíóúabcdefghijklmnñopqrstuvwxyz1234567890-";
       especiales = "8-37-39-46";

<<<<<<< HEAD
       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(caracteresAdmitidos.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
=======

>>>>>>> origin/master
