var btnSelectCurso=document.querySelector('#btnSelectCurso');
var btnSelectInvitado=document.querySelector('#btnSelectInvitado');
var btnEnviar=document.querySelector('#btnEnviar');
var btnClickeado;
var btnVolver =document.querySelector('#btnVolver');
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
	//var frmLista=document.querySelector('.frmLista');
	var frmLista=document.querySelector('#listForm');
    frmSolicitud.className = "backContent";
	//frmLista.className = "frmLista frontContent";
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
	//var frmLista=document.querySelector('.frmLista');
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
	var myInputs=new Array();
	//select all input text
	var inputs = document.getElementById('solicitarCita').getElementsByTagName('input');	
	for(i=0; i<inputs.length; i++){		
		if(inputs[i].type=="text")
		{
			myInputs.push(inputs[i]);
		}
	}
	//select all textarea
	inputs = document.getElementById('solicitarCita').getElementsByTagName('textarea');	
	for(i=0; i<inputs.length; i++){		
		myInputs.push(inputs[i]);
	}
	var errorRibbon=document.querySelector('#errorRibbon');
	event.preventDefault();
	if(validarCamposLlenos(inputs,errorRibbon,"Es necesario llenar los campos vacíos"))
	{
		errorRibbon.className = "alert-error flaticon-remove11 showed";		
	}
	else
	{
		
		var pcurso="Curso:="+document.querySelector('#txtCurso').value;
		var pinvitado="Invitado:="+document.querySelector('#txtInvitado').value;
		var pasunto="Asunto:="+document.querySelector('#txtAsunto').value;
		var plugar="Lugar:="+getRadioChecked('rdoLugar');
		var ptipo="Tipo:="+getRadioChecked('rdoTipo');
		var pdescripcion="Descripcion:="+document.querySelector('#txtObservaciones').value;
		var parametros=[pcurso,pinvitado,pasunto,plugar,ptipo,pdescripcion];
		
		window.location = addPararmsURL("mensaje.html",parametros);
		errorRibbon.style.display = 'none';
		errorRibbon.className = "alert-error flaticon-remove11 hidden";
		
	}
});

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

function addPararmsURL(targetPage, parametros){
	var url=targetPage+"?";
	for(i=0; i<parametros.length; i++){
		url+=parametros[i]+"&";
	}
	return url;
}
