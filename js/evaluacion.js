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
     eForm = document.querySelector('#frm');

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
				modificarEvaluacion(eElParent);
				// eForm.submit();
			} else {
				mostrarMensajeError(eRadio[0], 'Debe seleccionar una opción.', 'msj-ev');
			}			 		       
	    });

	};	
	
}

function modificarEvaluacion(pForm){
	var radioSi = $(pForm).find('#rdSi').val(),
      	radioNo = $(pForm).find('#rdNo').val(),
      	nota2 = $(pForm).find('#not2').val(),
      	nota3 = $(pForm).find('#not3').val(),
      	nota4 = $(pForm).find('#not4').val(),
      	nota5 = $(pForm).find('#not5').val(),
        idCita = getQueryVariable('idCita');
console.log(idCita);
    	var request = $.ajax({
    		url: "../includes/service-evaluaciones.php",
    		type: "get",
    		data: {
      				'query': 'modificarEvaluacion',
              'idCita': idCita,
      				'pradioSi': radioSi,
      				'pradioNo': radioNo,
      				'pnota2': nota2,
      				'pnota3': nota3,
      				'pnota4': nota4,      				
      				'pnota5': nota5
    		},
    		dataType: 'json',
    		success: function(response) { 
    			window.location = "/cenfotec-proyecto-1/evaluacion/evaluarCitaConfirm.php";
    		},
    		error: function(response){
          console.log('error');
				  console.log(response);
			 } 
  		});
    
};
