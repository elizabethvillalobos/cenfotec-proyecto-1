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

// Inicializar la validacion de formularios.
var eFormValidar = document.querySelector('form[data-validate="true"]');
if (eFormValidar) {
    var eFormBtnSubmit = document.querySelector('form[data-validate="true"]').querySelector('button[type="submit"]');
        eFormBtnSubmit.addEventListener('click', function(event) {
            event.preventDefault();
            limpiarMensajesError();
            if (validarForm(eFormValidar.id)) {
                eFormValidar.submit();
            }
        });

}


/*validar correo en consfiguracionGeneral/notificaciones Javier*/


var ebtnEnviar = document.querySelector('#btnEvr'),
    eMailEl = document.querySelector('#email'),
    eMail = '',
    eMsjError = document.querySelector('#msjError');

if (eMailEl) {
	eMail = eMailEl.value;
}
if (ebtnEnviar) {
	ebtnEnviar.addEventListener('click',function(){
		var correoCorrecto = validarCorreo(eMail, eMsjError, 'El correo no es válido.');
	});
}

/*validar correo en notificaciones*/    




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

var btnVolver = document.querySelector('#btnVolver');
if (btnVolver) {
	btnVolver.addEventListener('click',function(){
		getActiveItems();
		var frmCarrera=document.querySelector('#crear-carrera');
		var frmLista=document.querySelector('#listForm');
	    frmCarrera.className = "frontContent";
		frmLista.className = "backContent";
	});
}

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
