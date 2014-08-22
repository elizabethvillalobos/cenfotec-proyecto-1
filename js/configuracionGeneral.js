ebtnModificarCorreo=document.querySelector('#btnEvr');
if(ebtnModificarCorreo){
ebtnModificarCorreo.addEventListener('click',function () {
	

	var correoNotificacion = $('#emailNot').val();
	var hayError = false;
		if(correoNotificacion == ""){
    	mostrarMensajeError(document.querySelector('#emailNot'),"El nombre de la carrera no puede ser igual al código.");
		hayError=true;
    } 
    if(!hayError){
	var request = $.ajax({
		url: "/cenfotec-proyecto-1/includes/functions-configuracionGeneral.php",
		type: "get",
		data: {
                'query' : 'modificarCorreo',
			   'pcorreoNotificacion':correoNotificacion
			  },
		datatype: 'json',
		success: function(data){    
			
			console.log('exitooooo');

		}
	});
}
});
}

ebtnModificarCaracteres=document.querySelector('#modificarCaracteres');
if(ebtnModificarCaracteres){
ebtnModificarCaracteres.addEventListener('click',function () {
	

	var caracterMaximo = $('#caracterMaximo').val();
	var hayError = false;
		if(caracterMaximo == ""){
    	mostrarMensajeError(document.querySelector('#caracterMaximo'),"El nombre de la carrera no puede ser igual al código.");
		hayError=true;
    } 
    if(!hayError){
	var request = $.ajax({
		url: "/cenfotec-proyecto-1/includes/functions-configuracionGeneral.php",
		type: "get",
		data: {
                'query' : 'modificarCaracter',
			   'pcaracterMaximo':caracterMaximo
			  },
		datatype: 'json',
		success: function(data){    
			
			console.log('exitooooo');

		}
	});
}
});
}

ebtnModificarDias=document.querySelector('#guardarDias');
if(ebtnModificarDias){
ebtnModificarDias.addEventListener('click',function () {
	

	var diasExpiracion = $('#dias').val();
	var hayError = false;
		if(diasExpiracion == ""){
    	mostrarMensajeError(document.querySelector('#dias'),"");
		hayError=true;
    } 
    if(!hayError){
	var request = $.ajax({
		url: "/cenfotec-proyecto-1/includes/functions-configuracionGeneral.php",
		type: "get",
		data: {
                'query' : 'modificarDias',
			   'pdias':diasExpiracion
			  },
		datatype: 'json',
		success: function(data){    
			
			console.log('exitooooo');

		}
	});
}
});
}

