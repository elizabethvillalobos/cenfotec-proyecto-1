// document.getElementById('no').onclick = 
// function mostrarForm(){
//   document.getElementById('wrapperItems');
//   wrapperItems.classList.remove("mostrarForm");
//   wrapperItems.classList.add("ocultarForm");            
// }

var eRadiosChecked = document.querySelectorAll('.radio'),
    aPuntajes = document.querySelectorAll('.nbr'),
    ePromedio = document.querySelector('#promedio');

if (eRadiosChecked) {
	for(var i=0; i < eRadiosChecked.length; i++) {
		eRadiosChecked[i].addEventListener('click', function(event) {
			var eEl = event.currentTarget,
				eElParent = closestParentNode(eEl, 'accordion-detail'),
				eWrapperItems = eElParent.querySelector('.wrapperItems');

			limpiarMensajesError();
			if (eEl.querySelector('input[type="radio"]').value == 'si') {
				eWrapperItems.className += ' visible';
			} else {
				removeClass(eWrapperItems, 'visible');
			}
		});
	}
}

/********************************************************************************/

for(var i=0; i < aPuntajes.length; i++) {
    aPuntajes[i].addEventListener('change', function(event){
        
        var eEl = event.currentTarget,
            eElParent = closestParentNode(eEl, 'wrapperItems'),
            aPuntajesParent = eElParent.querySelectorAll('input'),
            ePromedioParent = eElParent.querySelector('#promedio');
        
        var promedio = calcularPromedio(aPuntajesParent);
        ePromedioParent.innerHTML=promedio;
    });
}

/**********************************************************************************/
var ebtnEnviar =  document.querySelectorAll('.btn-primary'),
     eForm = document.querySelector('#frm'),
     eError = document.querySelector('.alert-error');

if (ebtnEnviar.length) {
	for (var i = 0; i < ebtnEnviar.length; i++) {
		ebtnEnviar[i].addEventListener('click',function(evento) {
			evento.preventDefault();
			var eBtn = evento.currentTarget,
				eElParent = closestParentNode(eBtn, 'accordion-detail'),
				eForm = closestParentNode(eBtn, 'form-evaluacion'),
				eRadio = eElParent.querySelectorAll('input[type="radio"]');

			limpiarMensajesError();
			if (eRadio[0].checked || eRadio[1].checked) {
				eForm.submit();
			} else {
				mostrarMensajeError(eRadio[0], 'Debe seleccionar una opción.', 'form-row-ev');
			}			 		       
	    });

	};	
	
}

function validarRadiosChecked(pArregloRadios,pFormulario,pElmtError,pErrorMsj){

	for (var i = 0; i <pArregloRadios.length; i++) {

			if(pArregloRadios[i].checked){

				pFormulario.submit();

			} else{

				pElmtError.innerHTML = pErrorMsj;

			};
		};
}

