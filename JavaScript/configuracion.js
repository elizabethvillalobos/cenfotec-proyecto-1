var ebtnCrear = document.querySelector('#btnCrearCurso'),
	eTextbox1 = document.querySelector('#txtCodCurso'),
	eTextbox2 = document.querySelector('#txtNomCurso'),
	eMsjError = document.querySelector('#MsjError');
	
/* validar crear curso */

ebtnCrear.addEventListener('click',function(e){


	
	e.preventDefault();
	validarTexBoxt(eTextbox1,MsjError, 'El código de curso no puede estar vacío, digite un código válido.');
    validarTexBoxt(eTextbox2,MsjError, 'El nombre del curso no puede estar vacío, digite un nombre de curso válido');

	});

	function validarTexBoxt(peTextbox1,pElementoError, pMsjError){

		if (eTextbox1.value == '' ){
			pElementoError.innerHTML=pMsjError;
			MsjError.className += "alert-error flaticon-remove11";
		} else if (eTextbox2.value == '' ){
			pElementoError.innerHTML=pMsjError;
			MsjError.className += "alert-error flaticon-remove11";
		} 


	};

	