// ------------------------------------------
// CREACION DE UNA NUEVA SOLICITUD
// ------------------------------------------

// ------------------------------------------
// Variables globales
// ------------------------------------------
var btnEnviar=document.querySelector('#btnEnviar');
var btnCrearSolicitud=document.querySelector('#crearSolicitud');

//cargar date picker
var eDatePickers = $('.datepicker');
if (eDatePickers.length) {
	eDatePickers.datepicker({
		dateFormat: 'dd/mm/yy',
		dayNamesMin: ['Do', 'Lu', 'Ma', 'Mi', 'Ju', 'Vi', 'Sá'],
		hideOnSelect: true,
		prevText: 'Prev',
		nextText: 'Sig',
		minDate: new Date(),
		monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio',
		'Julio', 'Agosto', 'Setiembre', 'Octubre', 'Noviembre', 'Diciembre']
	});
}

//busqueda de cursos
function buscarCurso(evento){
    var resCursos = document.querySelector('#resCursos'),
    input = document.querySelector('#txtCurso');
	autocompletar(resCursos, input, obtenerCursos()[0], obtenerCursos()[1]);
}

var rCursos=document.querySelector('#resCursos');
if(rCursos){
	rCursos.addEventListener('click', function(e) {
		var input = document.querySelector('#txtCurso');
		reemplazarTextoInput(rCursos,input,e.target, "idCurso");		
	});
}
	
//busqueda de invitados
function buscarInvitado(evento){
    var resInvitados = document.querySelector('#resInvitados'),
    input = document.querySelector('#txtInvitado');
	autocompletar(resInvitados, input, obtenerInvitados()[0], obtenerInvitados()[1]);
}

var rInvitados=document.querySelector('#resInvitados');
if(rInvitados){
	rInvitados.addEventListener('click', function(e) {
		var input = document.querySelector('#txtInvitado');
		reemplazarTextoInput(rInvitados,input,e.target, "idInvitado");		
	});
}
	
//obtener cursos
function obtenerCursos() {	
	var resultados=[];
	
	// Solicitar datos al servicio.
	$.ajax({
		url: '../includes/service-cursos.php',
		type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
		data: { // Objeto con los parámetros que utiliza el servicio.
			'query': 'consultarCursosActivos'
		},
		dataType: 'json',
		success: function(response){
			var respuesta=$.parseJSON(response.data);
			var nombres =[];
			var ids = [];
			for (var i=0; i<respuesta.cursos.length; i++)
			{
				nombres.push(respuesta.cursos[i].nombre);
				ids.push(respuesta.cursos[i].id);
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

//obtener profesores
function obtenerInvitados() {	
	var resultados=[];
	
	// Solicitar datos al servicio.
	$.ajax({
		url: '../includes/service-usuarios.php',
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


//enviar formulario
if(btnEnviar!=null){
	btnEnviar.addEventListener('click',function(event){
		if(!inputLlenos('solicitarCita')){
			event.preventDefault();
		}
		else
		{
			if(!hayRadioSeleccionado('rdoModalidad'))
			{
				event.preventDefault();
			}
			else
			{
				if(!hayRadioSeleccionado('rdoTipo'))
				{
					event.preventDefault();
				}
				else
				{
					var idcurso = $('#idCurso').text(),
						idSolcitante = 1,
						idSolicitado = $('#idInvitado').text(),
						asunto = $('#txtAsunto').val(),
						modalidad=getRadioChecked('rdoModalidad'),
						tipo=getRadioChecked('rdoTipo'),
						observaciones=$('textarea#txtObservaciones').val();

					var request = $.ajax({
						url: "../includes/service-citas.php",
						type: "get",
						data: {
							   'query': 'crearSolicitud',
							   'idSolcitante': idSolcitante,
							   'idSolicitado' : idSolicitado,
							   'asunto' : asunto,
							   'modalidad' : modalidad,
							   'tipo' : tipo,
							   'observaciones' : observaciones,
							   'idCurso' : idcurso
							  },
						dataType: 'json',
						success: function(response){ 
							window.location ="solicitudEnviada.php?nombreInvitado="+$('#txtInvitado').val();
						},
						error: function(response){
							var error = document.createElement("p");
							error.className="alert-error flaticon-remove11";
							var msj = document.createTextNode("Ya tiene una solicitud pendiente con ese usuario.");
							error.appendChild(msj);
							var botonesDiv=document.querySelector('.form-row-button');
							botonesDiv.appendChild(error);
							
						}
					});
				}
			}
		}
		
	});
}

//crear nueva solicitud
if(btnCrearSolicitud!=null){
	btnCrearSolicitud.addEventListener('click',function(){
		var url = window.location.pathname;
		var primerDivision = url.split("/");
		primerDivision=primerDivision[primerDivision.length-1];
		if (primerDivision.indexOf("profesor") >= 0)
		{
			window.location = "solicitarCita-profesor.html"
		}
		else
		{
			if (primerDivision.toLowerCase().indexOf("estudiante") >= 0)
			{
				window.location = "solicitarCita-estudiante.html"
			}
			else
			{
				window.location = "solicitarCita.php"
			}
		}
		
		
		
	});
}
//obtener el radio activo
function getRadioChecked(radioName){
	var radios = document.getElementsByName(radioName);
	var radioChecked;
	for (var i=0; i<radios.length; i++) {
		if (radios[i].checked) {
			radioChecked=radios[i].value;
		}
	}
	return radioChecked;
}


var btnAceptar=document.querySelector('#btnAceptar');
if(btnAceptar!=null){
	btnAceptar.addEventListener('click',function(event){
		if(!inputLlenos('solicitarCita')){
			event.preventDefault();
		}
		else
		{
			var today=new Date();
			today.setHours(0);
			today.setMinutes(0);
			today.setSeconds(0);
			var fecha=document.querySelector('#txtFecha');
			if($('#txtFecha').datepicker("getDate")<today)
			{					
				mostrarMensajeError(fecha,"Debe seleccionar una fecha válida");
				event.preventDefault();
			}
			
			var hInicio = new Date (new Date().toDateString() + ' ' + $('#txtHoraInicio').val());
			var hFin = new Date (new Date().toDateString() + ' ' + $('#txtHoraFin').val());
			
			
			if(hFin<hInicio)
			{
				mostrarMensajeError(document.querySelector('#txtHoraFin'),"Debe seleccionar una hora mayor a la hora de inicio");
				event.preventDefault();
			}
			else
			{
				var horaFin = new Date(hFin.getTime() - 30*60000); 
				if(horaFin<hInicio)
				{
					mostrarMensajeError(document.querySelector('#txtHoraFin'),"La cita debe durar mínimo 30 minutos");
					event.preventDefault();
				}
			}
			
		}
	});
}

//verificar si los inputs estan llenos
function inputLlenos(idContainer){
	limpiarMensajesError();
	var estanLlenos=true;
	var myInputs=new Array();
	//select all inputs text
	var inputs = document.getElementById(idContainer).getElementsByTagName('input');	
	for(i=0; i<inputs.length; i++){		
		if((inputs[i].type=="text" || inputs[i].type=="time" )&& inputs[i].getAttribute('id')!="txtCurso")
		{
			myInputs.push(inputs[i]);
		}
	}
	
	for(i=0;i<myInputs.length;i++){
		if(myInputs[i].value.trim()==''){
			mostrarMensajeError(myInputs[i], "Este campo no puede estar vacío.");
			estanLlenos=false;
		}
	}
	return estanLlenos;
}
