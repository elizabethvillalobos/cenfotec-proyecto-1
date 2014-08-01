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

if(ebtnEnviar) {
	for (var i = 0; i < ebtnEnviar.length; i++) {


		ebtnEnviar[i].addEventListener('click',function(evento){

		var aRadios = document.querySelectorAll('input[type="radio"]');

		validarRadiosChecked(aRadios,eForm,eError,'Debe seleccionar una opción');

		evento.preventDefault();
					 		       
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

