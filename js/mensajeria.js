//busqueda de cursos
function buscarDestinatario(evento){
    var resDestinatario = document.querySelector('#resDestinatario'),
    input = document.querySelector('#txtDestinatario');
	autocompletar(resDestinatario, input, obtenerDestinatarios()[0], obtenerDestinatarios()[1]);
}

var rDestinatarios=document.querySelector('#resDestinatario');
if(rDestinatarios){
	rDestinatarios.addEventListener('click', function(e) {
		var input = document.querySelector('#txtDestinatario');
		reemplazarTextoInput(rDestinatarios,input,e.target, "idDestinatario");		
	});
}

//obtener destinatarios
function obtenerDestinatarios() {	
	var resultados=[];
	
	// Solicitar datos al servicio.
	$.ajax({
		url: '../includes/service-usuarios.php',
		type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
		data: { // Objeto con los parámetros que utiliza el servicio.
			'query': 'consultarDestinatarios',
			'idRemitente': location.search.split("=")[1]
		},
		dataType: 'json',
		success: function(response){
			var respuesta=$.parseJSON(response.data);
			var nombres =[];
			var ids = [];
			for (var i=0; i<respuesta.destinatarios.length; i++)
			{
				nombres.push(respuesta.destinatarios[i].nombre);
				ids.push(respuesta.destinatarios[i].id);
			}
			resultados.push(nombres);
			resultados.push(ids);
		},
		error: function(response){
			resultados=null;
		},
		async: false
	});
	return resultados;
};


//enviar formulario
var btnEnviar=document.querySelector('#btnEnviar');
if(btnEnviar!=null){
	btnEnviar.addEventListener('click',function(event){
		event.preventDefault();
		limpiarMensajesError();
		var noHayErrores=true;
		var txtDestinatario = document.querySelector('#txtDestinatario');
		if(txtDestinatario.value.trim()==''){
			mostrarMensajeError(txtDestinatario, "Este campo no puede estar vacío.");
			noHayErrores =false;
		}
		
		var txtMensaje = document.querySelector('#txtMensaje');
		if(txtMensaje.value.trim()==''){
			mostrarMensajeError(txtMensaje, "Este campo no puede estar vacío.");
			noHayErrores =false;
		}
		
		if(noHayErrores){
			// crear conversacion
			$.ajax({
				url: '../includes/service-mensajeria.php',
				type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
				data: { // Objeto con los parámetros que utiliza el servicio.
					'query': 'crearConversacion',
					'idReceptor': location.search.split("=")[1],
					'mensaje': txtMensaje.value,
					'horaFecha': new Date().toLocaleString()
				},
				dataType: 'json',
				success: function(response){
					alert("Success");
				},
				error: function(response){
					resultados=null;
				},
				async: false
			});
		}
	});
}

