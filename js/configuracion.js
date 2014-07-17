var ebtnCrearCurso = document.querySelector('#btnCrearCurso'),
	aInputs = document.querySelectorAll('form .form-control'),
	eError = document.querySelector('.alert-error'),
	regis=false,
	ecodigo = document.querySelector('#txtCodCurso'),
	totalSelected = 0;

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
<<<<<<< HEAD

/*validar correo en consfiguracionGeneral/notificaciones Javier*/

var ebtnEnviar = document.querySelector('#btnEvr'),
    eMail = document.querySelector('#email').value,
    eMsjError = document.querySelector('#msjError');

    ebtnEnviar.addEventListener('click',function(){

        var correoCorrecto = validarCorreo(eMail, eMsjError, 'El correo es incorrecto');
    
    });

/*validar correo en notificaciones*/    
=======
<<<<<<< HEAD


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


var btnSelecProfe = document.querySelector('.btnSelectInvitado');
if (btnSelecProfe!=null) {
	btnSelecProfe.addEventListener('click',function () {
	toggleForms();
	});
}

function toggleForms() {
	totalSelected=0;
	var frmCarrera=document.querySelector('#crear-carrera');
	var frmLista=document.querySelector('#listForm');
    frmCarrera.className = "backContent";
	frmLista.className = "frontContent";
	var title=document.querySelector('#lblLegent');
	var ul = document.getElementById("listElements");
	while( ul.firstChild ){
		ul.removeChild( ul.firstChild );
	}
	
	title.innerHTML="Seleccionar Profesor";		
	for(i=0;i<20;i++)
	{
		var li = document.createElement("li");
		li.appendChild(document.createTextNode("Alvaro Cordero"));
		li.setAttribute("value","1");
		li.setAttribute("class","listItem");
		ul.appendChild(li);
	}
	
	var listItems=document.getElementsByClassName('listItem');
	for(var i = 0; i < listItems.length; i++) {
		var listItem = listItems[i];
		listItem.onclick = function() {			
			toggleItem(this,3);
		}
	}
}

function toggleItem(clickedItem, maxOfItems) {
	if ( clickedItem.classList.contains("activeItem") ) {
		// Do stuff here
		clickedItem.className = "listItem";
		totalSelected--;
	}
	else
	{
		if(totalSelected<maxOfItems){	
			clickedItem.className = "listItem activeItem";
			totalSelected++;
		}
	}	
}

btnVolver.addEventListener('click',function(){
	getActiveItems();
	var frmCarrera=document.querySelector('#crear-carrera');
	var frmLista=document.querySelector('#listForm');
    frmCarrera.className = "frontContent";
	frmLista.className = "backContent";
});

function getActiveItems() {
	var activeItems=document.querySelectorAll('.activeItem'),
		nombreProfesores=document.querySelectorAll('.nombreProfe');
	for (i=0; i<activeItems.length; i++)
    {
		if(i<nombreProfesores.length){
			nombreProfesores[i].value=activeItems[i].innerHTML;
		}
	}
}
=======
>>>>>>> origin/master
>>>>>>> origin/master
