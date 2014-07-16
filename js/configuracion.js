var ebtnCrearCurso = document.querySelector('#btnCrearCurso'),
	aInputs = document.querySelectorAll('form .form-control'),
	eError = document.querySelector('.alert-error'),
	regis=false,
	ecodigo = document.querySelector('#txtCodCurso');

/* validar crear curso */

if (ebtnCrearCurso) {
	ebtnCrearCurso.addEventListener('click',function (evento) {
		evento.preventDefault();
    	var camposVacios=validarCamposLlenos(aInputs, eError, 'Todos los campos deben estar llenos');
	});
}

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


// Elizabeth
// -------------------------------------------
// Retorna true/false si el correo es valido.
function validateEmail(pEmail) {
	var re = new RegExp(/^\"?[\w-_\.]*\"?@ucenfotec\.ac\.cr$/);
	return re.test(pEmail);
}

function validateNumber(pNumber) {
	return !isNaN(Number(pNumber));
}

// Validar un formulario.
function validarForm(pFormId) {
	var bValido = true,
		eInputs = document.querySelectorAll('#' + pFormId + ' input[required], textarea[required]'),
		eSelects = document.querySelectorAll('#' + pFormId + ' select[required]'),
		eTextareas = document.querySelectorAll('#' + pFormId + ' textarea[required]');

	// Validar que los inputs requeridos esten llenos.
	for(var i=0; i < eInputs.length; i++) {
		if (eInputs[i].value == '') {
			bValido = false;
			mostrarMensajeError(eInputs[i], 'Este campo no puede estar vacío.');
		} else if (eInputs[i].dataset.validateType) {
			switch(eInputs[i].dataset.validateType) {
			    case 'email':
			        if (!validateEmail(eInputs[i].value)) {
			        	bValido = false;
			        	mostrarMensajeError(eInputs[i], 'El correo electrónico no es válido.');
			        }
			        break;
			    case 'number':
			    	if (!validateNumber(eInputs[i].value)) {
			    		bValido = false;
			        	mostrarMensajeError(eInputs[i], 'Este campo solo admite números.');
			    	}
			        break;
			    case 'string':
			    	// Pendiente...
			        console.log('validate string');
			        break;
			    case 'letters':
			    	// Pendiente...
				    console.log('validate letras');
			    	break;
			}
		}
	}
	// Validar que los selects tengan un valor
	for(var j=0; j < eSelects.length; j++) {
		if (eSelects[j].value == '') {
			bValido = false;
			mostrarMensajeError(eSelects[j], 'Debe seleccionar una opción.');
		}
	}
	return bValido;
}

// Inicializar la validacion.
var eFormValidar = document.querySelector('form[data-validate="true"]');
if (eFormValidar) {
	var eFormBtnSubmit = document.querySelector('form[data-validate="true"]').querySelector('button[type="submit"]');
	if (eFormBtnSubmit) {
		eFormBtnSubmit.addEventListener('click', function(event) {
			event.preventDefault();
			limpiarMensajesError();
			if (validarForm(eFormValidar.id)) {
				eFormValidar.submit();
			}
		});
	}
}

// Fin - Elizabeth
// -------------------------------------------

