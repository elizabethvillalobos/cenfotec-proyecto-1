
function realizarBusqueda(evento){
    var resUsuarios = document.querySelector('#resultados'),
    input = document.querySelector('#q');
	autocompletarUsrs(resUsuarios, input, obtenerInvitados()[0], obtenerInvitados()[1]);
}

function obtenerInvitados() {	
	var resultados=[];
	
	// Solicitar datos al servicio.
	$.ajax({
		url: '/cenfotec-proyecto-1/includes/service-usuarios.php',
		type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
		data: { // Objeto con los parámetros que utiliza el servicio.
			query: 'consultarInvitados'
		},
		dataType: 'json',
		success: function(response){
			var respuesta=$.parseJSON(response.data);
			var nombres =[];
			var ids = [];
			for (var i=0; i<respuesta.invitados.length; i++)
			{
				nombres.push(respuesta.invitados[i].nombre);
				ids.push(respuesta.invitados[i].id);
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