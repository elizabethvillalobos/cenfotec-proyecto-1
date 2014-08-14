var ebtnCrearCurso = document.querySelector('#btnCrearCurso'),
	aInputs = document.querySelectorAll('form .form-control'),
	eError = document.querySelector('.alert-error'),
	regis=false,
	ecodigo = document.querySelector('#txtCodCurso'),
	totalSelected = 0;

window.onload = function () {
	var eCrearCurso = document.getElementById("crear-curso")
	if (eCrearCurso) {
		eCrearCurso.reset();
	}
}	
	
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


function validarDropdown(pIndice){

	var selected = false;


	if( pIndice > 0) {

		selected=true;

	}else {
		var eEl = document.getElementById("director-academico");
		mostrarMensajeError(eEl,"Debe seleccionar un director académico");
	}

	return selected;
}
                    


// Inicializar la validacion de formularios.
var eFormValidar = document.querySelector('form[data-validate="true"]');
if (eFormValidar) {
		
	var eFormBtnSubmit = document.querySelector('form[data-validate="true"]').querySelector('button[type="submit"]');
	eFormBtnSubmit.addEventListener('click', function(event) {
		event.preventDefault();
        limpiarMensajesError();
        if (validarForm(eFormValidar.id)) {
        	
			switch(eFormValidar.id){
				case "crear-curso":
					registrarCurso();
				break;

                case "crear-carrera":                 
                  	var indice = document.getElementById("director-academico").selectedIndex,
                   	   seleccionado = validarDropdown(indice);
                   	if (seleccionado){
                   		registrarCarrera();
                   	}                 	
                   
				break;
                case "crear-usuario":
                    var indice1 = document.getElementById("usuario-rol").selectedIndex,
                        indice2 = document.getElementById("usuario-carrera").selectedIndex;
                          
                	var seleccionado = validarDropdown(indice1);                                     
                	if (seleccionado){
                       seleccionado = validarDropdown(indice2);
                       if (seleccionado){
                            crearUsuario();
                       }
                   }                 	
                break;
			}
		}
		else {
			if (typeof(idProfesor1) != 'undefined' && typeof(idProfesor2) != 'undefined' && typeof(idProfesor3) != 'undefined') {
				if((idProfesor1 == idProfesor2) || (idProfesor1 == idProfesor3)) {
					mostrarMensajeError(document.querySelector('#txtInvitado1'),"No pueden haber profesores repetidos.");
				}
				if((idProfesor2 == idProfesor1) || (idProfesor2 == idProfesor3)) {
					mostrarMensajeError(document.querySelector('#txtInvitado2'),"No pueden haber profesores repetidos.");
				}
				if((idProfesor1 == idProfesor3) || (idProfesor2 == idProfesor3)) {
					mostrarMensajeError(document.querySelector('#txtInvitado3'),"No pueden haber profesores repetidos.");
				}
			}
		}
	});
}

// Modificar usuarios
$('select#usuario-carrera').on('change', function() {
	var $el = $(this);
	switch ($el.val()) {
		case 'carrera-diseno-web':
			$('.cursos-desarrollo').hide()
			$('#usuario-curso-desarrollo').attr('required', false);

			$('.cursos-diseno-web').show()
			$('#usuario-curso-diseno').attr('required', true);
			break;
		case 'carrera-desarrollo':
			$('.cursos-diseno-web').hide()
			$('#usuario-curso-diseno').attr('required', false);

			$('.cursos-desarrollo').show()
			$('#usuario-curso-desarrollo').attr('required', true);
			break;
		case '':
			$('.cursos-diseno-web').hide()
			$('#usuario-curso-diseno').attr('required', false);

			$('.cursos-desarrollo').hide()
			$('#usuario-curso-desarrollo').attr('required', false);
			break;
	}
});


/*validar correo en consfiguracionGeneral/notificaciones Javier*/


var ebtnEnviar = document.querySelector('#btnEvr'),
    eform = document.querySelector('#form-confGrl'),       
    eMsjError = document.querySelector('.alert-error');

if(ebtnEnviar) {
	ebtnEnviar.addEventListener('click',function(event){

		event.preventDefault();

       var aCamposTxt = document.querySelectorAll('.form-control'),
           eMailNotif = document.querySelector('#emailNot').value;		
		 
		 limpiarMensajesError();
		var camposVacios = validarCamposLlenos(aCamposTxt,eMsjError,'debe llenar todos los campos');
		if(camposVacios){
			var mailCorrecto = validarCorreo(eMailNotif, eMsjError, 'El correo no es válido.');
			if (mailCorrecto) {
				eform.submit();
			};			
		}       
	});
}

/*validar correo en notificaciones*/    




// Inicializar la validacion.
// var eFormValidar = document.querySelector('form[data-validate="true"]');
// if (eFormValidar) {
// 	var eFormBtnSubmit = document.querySelector('form[data-validate="true"]').querySelector('button[type="submit"]');
// 	if (eFormBtnSubmit) {
// 		eFormBtnSubmit.addEventListener('click', function(event) {
// 			event.preventDefault();
// 			limpiarMensajesError();
// 			if (validarForm(eFormValidar.id)) {
// 				eFormValidar.submit();
// 			}
// 		});
// 	}
// }


function buscarProfesor(evento) {
    var $invitado = $(evento.currentTarget),
    	$resInvitados = $invitado.parent().find('#' + $invitado.attr('id') + '-results');
	autocompletar($resInvitados[0], $invitado[0], obtenerProfesores()[0], obtenerProfesores()[1]);
}

var rInvitados1=document.querySelector('#txtInvitado1-results');
if (rInvitados1) {
	rInvitados1.addEventListener('click', function(e) {
		var input = document.querySelector('#txtInvitado1');
		reemplazarTextoInput(rInvitados1,input,e.target, "idProfesor1");		
	});
}

var rInvitados2=document.querySelector('#txtInvitado2-results');
if (rInvitados2) {
	rInvitados2.addEventListener('click', function(e) {
		var input = document.querySelector('#txtInvitado2');
		reemplazarTextoInput(rInvitados2,input,e.target, "idProfesor2");		
	});
}


var rInvitados3=document.querySelector('#txtInvitado3-results');
if (rInvitados3) {
	rInvitados3.addEventListener('click', function(e) {
		var input = document.querySelector('#txtInvitado3');
		reemplazarTextoInput(rInvitados3,input,e.target, "idProfesor3");		
	});
}

function toggleForms() {
	totalSelected=0;
	var frmCarrera=document.querySelector('#crear-curso');
	var frmLista=document.querySelector('#listForm');
    frmCarrera.className = "backContent";
	frmLista.className = "frontContent";
	var title=document.querySelector('#lblLegent');
	var ul = document.getElementById("listElements");
	while( ul.firstChild ) {
		ul.removeChild( ul.firstChild );
	}
	

	title.innerHTML="Seleccionar Profesor";		
	var listaProfes = ["Antonio Luna","Juan Vargas", "Pablo Monestel", "Álvaro Cordero", "Joel Martinez","Ana Mendez","Minor Tenorio","Normal Neil","Esteban Castro", "Nicole Pacheco","Kenny Moraga", "Katherine Guevara", "Adrián Arias", "Daniel Solano", "Francisco Miranda", "Pablo Marín", "Josue Zamora", "Brandon Carmona"];
	for(i=0;i<listaProfes.length;i++)
	{
		var li = document.createElement("li");
		li.appendChild(document.createTextNode(listaProfes[i]));

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
		var frmCarrera=document.querySelector('#crear-curso');
		var frmLista=document.querySelector('#listForm');
	    frmCarrera.className = "frontContent mod-bd form-horizontal";
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

function soloLetrasYnumeros(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = " áéíóúabcdefghijklmnñopqrstuvwxyz1234567890";
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
    } else {
        return true;
    }
}

function consultarCursos(){
	var idCarrera = location.search.split("idCarrera=")[1];
	var request = $.ajax({
		url: "../includes/service-cursos.php",
		type: "get",
		data: {
			   'query': 'consultarCurso',
			   'pidCarrera': idCarrera			   
			  },
		dataType: 'json',
		success: function(response){ 
		console.log($.parseJSON(response.data));   
			imprimirCursos($.parseJSON(response.data));
		},
		error: function(response) {
			console.log(response);
		}
	});	
}


function imprimirCursos(aCursos){
	var source = $("#template-curso").html(),
	template = Handlebars.compile(source);
  	$("#cursos-container").html(template(aCursos));
}

//agregar nuevo curso
function registrarCurso() {
	var codigo = $('#codigo-curso').val(),
	  nombre = $('#nombre-curso').val(),
	  idCarrera = $('#carrera-curso').val(),
	  idProfesor1 = $('#idProfesor1').text(),
	  idProfesor2 = $('#idProfesor2').text(),
<<<<<<< HEAD
	  idProfesor3 = $('#idProfesor3').text();

	var request = $.ajax({
		url: "../includes/service-cursos.php",
		type: "get",
		data: {
			   'query': 'registrarCurso',
			   'pcodigo': codigo,
			   'pnombre' : nombre,
			   'pidCarrera' : idCarrera,
			   'pidProfesor1' : idProfesor1,
			   'pidProfesor2' : idProfesor2,
			   'pidProfesor3' : idProfesor3
			  },
		dataType: 'json',
		success: function(response){    
			window.location ="registarCurso-Confirmar.html";
		},
		error: function(response){
			var error = document.createElement("p");
			error.className="alert-error flaticon-remove11";
			var msj = document.createTextNode("Este curso ya se encuentra almacenado.");
			error.appendChild(msj);
			var botonesDiv=document.querySelector('.form-row-button');
			botonesDiv.appendChild(error);
			
		}
	});
=======
	  idProfesor3 = $('#idProfesor3').text(),
	  idCarrera = $('#idCarrera').text();
	if(idProfesor1!=""){
		var request = $.ajax({
			url: "../includes/service-cursos.php",
			type: "get",
			data: {
				   'query': 'registrarCurso',
				   'pcodigo': codigo,
				   'pnombre' : nombre,
				   'pidCarrera' : idCarrera,
				   'pidProfesor1' : idProfesor1,
				   'pidProfesor2' : idProfesor2,
				   'pidProfesor3' : idProfesor3,
				   'pidCarrera' : idCarrera
				  },
			dataType: 'json',
			success: function(response){    
				window.location ="registarCurso-Confirmar.html";
			},
			error: function(response){
				var error = document.createElement("p");
				error.className="alert-error flaticon-remove11";
				var msj = document.createTextNode("Este curso ya se encuentra almacenado.");
				error.appendChild(msj);
				var botonesDiv=document.querySelector('.form-row-button');
				botonesDiv.appendChild(error);
				
			}
		});
	}
>>>>>>> 6db316653914b9a6566f79e08ca4c86ed2e43520
};



//Filtros de mostrar usuarios

$('.usuarios-filtro').on('click', function(e) {
    var rol;
    
    switch($(e.currentTarget).text()){
        case 'Rector':
            rol=2;
            break;
        case 'Director académico':
            rol=3;
            break;
        case 'Profesor':
            rol=4;
            break;
        case 'Estudiante':
            rol=5;
            break;
        case 'Asistente':
            rol=6;
            break;
        case 'Mercadeo':
            rol=7;
            break;
    }; 

});

//obtener profesores
function obtenerProfesores() {	
	var resultados=[];
	
	// Solicitar datos al servicio.
	$.ajax({
		url: '../includes/service-usuarios.php',
		type: 'get', // Se utiliza get por vamos a obtener datos, no a postearlos.
		data: { // Objeto con los parámetros que utiliza el servicio.
			query: 'consultarProfesores'
		},
		dataType: 'json',
		success: function(response){
			var respuesta=$.parseJSON(response.data);
			var nombres =[];
			var ids = [];
			for (var i=0; i<respuesta.profesores.length; i++)
			{
				nombres.push(respuesta.profesores[i].nombre);
				ids.push(respuesta.profesores[i].id);
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

//crear usuario
function crearUsuario() {
	var nombre = $('#usuario-nombre').val(),
		apellido1 = $('#usuario-apellido1').val(),
		apellido2 = $('#usuario-apellido2').val(),
        avatar = $('#droppedimage img').attr('src'),
        idUsr = $('#usuario-email').val(),
        contrasena = $('#usuario-contrasena').val(),
        telefono = $('#usuario-telefono').val(),
        skype = $('#usuario-skype').val(),
        rol = $('#usuario-rol').val(),
        carrera = $('#usuario-carrera').val(),
        curso = $('#usuario-curso').val();

	var request = $.ajax({
		url: "/cenfotec-proyecto-1/includes/functions-usuarios.php",
		type: "post",
		data: {
                'call' : 'insertarUsuario',
			   'pnombre': nombre,
			   'papellido1' : apellido1,
			   'papellido2' : apellido2,
                'pavatar' : avatar,
                'pidUsr' : idUsr,
                'pcontrasena': contrasena,
                'ptelefono': telefono,
                'pskype': skype,
                'prol': rol,
                'pcarrera': carrera,
                'pcurso': curso
			  },
		dataType: 'json',
		success: function(response){    
			
		}
	});
}
