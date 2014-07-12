var ebtnCrear = document.querySelector('#btnCrearCurso'),
	eTextbox1 = document.querySelector('.textbox1'),
	eTextbox2 = document.querySelector('.textbox2'),
	eMsjError = document.querySelector('#MsjError');

/* validar crear curso */

ebtnCrear.addEventListener('click',function(){


	
	
	validarTexBoxt(eTextbox1,MsjError, 'el espacio esta mal puesto');
    //validarTexBoxt(eTextbox2,eMsjError, 'el espacio 2 esta mal puesto');

	

	});

	function validarTexBoxt(peTextbox1,pElementoError, pMsjError){

		if (eTextbox1.value == '' ){

		

		pElementoError.innerHTML=pMsjError;
		
			
	} 

                  }