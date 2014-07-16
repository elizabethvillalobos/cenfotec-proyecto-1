var btnSelectCurso=document.querySelector('#btnSelectCurso');
var btnSelectInvitado=document.querySelector('#btnSelectInvitado');
var btnEnviar=document.querySelector('#btnEnviar');
var btnClickeado;
var btnVolver =document.querySelector('#btnVolver');
var btnCrearSolicitud=document.querySelector('#crearSolicitud');
var totalSelected=0;


btnSelectCurso.addEventListener('click',function(){
	btnClickeado=btnSelectCurso;
	toggleForms();
});

btnSelectInvitado.addEventListener('click',function(){
	btnClickeado=btnSelectInvitado;
	toggleForms();
});

function toggleForms() {
	totalSelected=0;
	var frmSolicitud=document.querySelector('#solicitarCita');
	var frmLista=document.querySelector('#listForm');
    frmSolicitud.className = "backContent";
	frmLista.className = "frontContent";
	var title=document.querySelector('#lblLegent');
	var ul = document.getElementById("listElements");
	while( ul.firstChild ){
		ul.removeChild( ul.firstChild );
	}
	
	if(btnClickeado==btnSelectCurso){		
		title.innerHTML="Seleccionar Curso";		
		for(i=0;i<20;i++)
		{
			var li = document.createElement("li");
			li.appendChild(document.createTextNode("BISOFT-01"));
			li.setAttribute("value","1");
			li.setAttribute("class","listItem");
			ul.appendChild(li);
		}
	}
	else
	{
		if(btnClickeado==btnSelectInvitado){
			title.innerHTML="Seleccionar Invitado";
			for(i=0;i<20;i++)
			{
				var li = document.createElement("li");
				li.appendChild(document.createTextNode("Alvaro Cordero"));
				li.setAttribute("value","1");
				li.setAttribute("class","listItem");
				ul.appendChild(li);
			}
		}
	}
	var listItems=document.getElementsByClassName('listItem');
	for(var i = 0; i < listItems.length; i++) {
		var listItem = listItems[i];
		listItem.onclick = function() {			
			toggleItem(this,1);
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

btnVolver.addEventListener('click',function(){
	getActiveItems();
	var frmSolicitud=document.querySelector('#solicitarCita');
	var frmLista=document.querySelector('#listForm');
    frmSolicitud.className = "frontContent";
	frmLista.className = "backContent";
});

function getActiveItems() {
	var activeItems=document.querySelectorAll('.activeItem');
	for (i=0; i<activeItems.length; i++)
    {
		if(btnClickeado==btnSelectCurso){		
			var txtCurso =document.querySelector('#txtCurso');	
			txtCurso.value=activeItems[i].innerHTML;
		}
		else
		{
			if(btnClickeado==btnSelectInvitado){
				var txtInvitado =document.querySelector('#txtInvitado');	
				txtInvitado.value=activeItems[i].innerHTML;
			}
		}
	}
}

btnEnviar.addEventListener('click',function(event){
	if(!inputLlenos('solicitarCita')){
		event.preventDefault();
	}
	if(!hayRadioSeleccionado('rdoLugar'))
	{
		event.preventDefault();
	}
	if(!hayRadioSeleccionado('rdoTipo'))
	{
		event.preventDefault();
	}
});
function inputLlenos(idContainer){
	limpiarMensajesError();
	var estanLlenos=true;
	var myInputs=new Array();
	var inputs = document.getElementById(idContainer).getElementsByTagName('input');	
	for(i=0; i<inputs.length; i++){		
		if(inputs[i].type=="text" && inputs[i].getAttribute('id')!="txtCurso")
		{
			myInputs.push(inputs[i]);
		}
	}
	//select all textarea
	inputs = document.getElementById(idContainer).getElementsByTagName('textarea');	
	for(i=0; i<inputs.length; i++){		
		myInputs.push(inputs[i]);
	}
	
	for(i=0;i<myInputs.length;i++){
		if(myInputs[i].value.trim()==''){
			mostrarMensajeError(myInputs[i], "Este campo no puede estar vacío.");
			estanLlenos=false;
		}
	}
	return estanLlenos;
}

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

btnCrearSolicitud.addEventListener('click',function(){
	window.location = "solicitarCita.html"
});
