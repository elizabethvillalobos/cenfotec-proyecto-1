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

