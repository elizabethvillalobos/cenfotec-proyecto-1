var ebtnCrear = document.querySelector('#btnCrearCurso'),
	aInputs = document.querySelectorAll('form .form-control'),
	eError = document.querySelector('.alert-error'),
	regis=false
	ecodigo = document.querySelector('#txtCodCurso');

/* validar crear curso */

if (ebtnCrear) {
	ebtnCrear.addEventListener('click',function (evento) {
		evento.preventDefault();
    	var camposVacios=validarCamposLlenos(aInputs, eError, 'Todos los campos deben estar llenos');    
	});
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

// Crear un nuevo nodo <p class="alert-error"> que muestra
// el mensaje de texto pasado por parametro dentro del nodo tambien
// pasado por parametro.
function mostrarMensajeError(pEl, pMsg) {
	// Buscar el parentNode del input.
	var eFormRow = closestParentNode(pEl, 'form-row');
	// Agregar la clase "error" al div en que se encuentra el input.
	eFormRow.className += ' error';
	// Crear un elemento p para mostrar el error del input en especifico.
	addElementToDOM('p', '', 'alert-error flaticon-remove11', pMsg, eFormRow);
}

// Limpiar mensajes de error
function limpiarMensajesError() {
	var eFormRows = document.querySelectorAll('.form-row.error'),
		eAlertErrors = document.querySelectorAll('p.alert-error');
	
	// Eliminar la clase "error" de los "div.form-row".
	if (eFormRows) {
		for (var i=0; i < eFormRows.length; i++) {
			removeClass(eFormRows[i], 'error');
		}
	}
	// Eliminar los nodos p que son mensajes de error.
	if (eAlertErrors) {
		for (var j=0; j < eAlertErrors.length; j++) {
			var eAlertErrorParent = eAlertErrors[j].parentNode;
			eAlertErrorParent.removeChild(eAlertErrors[j]);
		}
	}
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

