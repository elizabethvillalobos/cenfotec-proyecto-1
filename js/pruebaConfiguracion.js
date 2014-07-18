/*Funcion para redireccionar a una pagina*/
function delayer1(){
	window.location = "deshabilitarCarrera-confirmar.html";	
}
/*Funcion para redireccionar a una pagina*/
function delayer2(){
	window.location = "deshabilitarCarrera-cancelar.html";
}
/*Funcion para redireccionar a una pagina*/
function delayer3(){
	window.location = "habilitarCarrera-confirmar.html";
}
/*Funcion para redireccionar a una pagina*/
function delayer4(){
	window.location = "habilitarCarrera-cancelar.html";	
}

/***************************************************************************************************************************/
														/*Primera carrera*/
/***************************************************************************************************************************/
/*Inicializa botones*/
document.getElementById('btnHabilitar').disabled = true;
document.getElementById('btnDeshabilitar').disabled = false;

/*Direcciona a la página que contiene el formulario de modificación de carrera*/
document.getElementById('btnModificar').onclick = function mostrarFormModificar(){
	window.location = "modificarCarrera.html";
}

/*Desactiva el botón Habilitar si es presionado y activa el botón Deshabilitar*/
document.getElementById('btnHabilitar').onclick = function deshabilitarBtnHabilitar(){
	document.getElementById('btnHabilitar').disabled = true;
	document.getElementById('btnDeshabilitar').disabled = false;
}

/*Desactiva el botón Deshabilitar si es presionado y activa el botón Habilitar*/
document.getElementById('btnDeshabilitar').onclick = function deshabilitarBtnDeshabilitar(){
		document.getElementById('btnDeshabilitar').disabled = true;
		document.getElementById('btnHabilitar').disabled = false;		
}

/*Accion del boton aceptar del modal de confirmacion de deshabilitacion de carrera.
Cambia el estado de los botones habilitar y deshabilitar*/
document.getElementById('btnAceptarDeshabilitar').onclick = function modificaEstado(){
	document.getElementById('btnDeshabilitar').disabled = true;
	document.getElementById('btnHabilitar').disabled = false;
	setTimeout('delayer1()',2000);	
}

/*Accion del boton cancelar del modal de cancelacion de deshabilitacion de carrera.
No cambia el estado de los botones habilitar y deshabilitar*/
document.getElementById('btnCancelarDeshabilitar').onclick = function noModificaEstado(){
	document.getElementById('btnDeshabilitar').disabled = false;
	document.getElementById('btnHabilitar').disabled = true;
	setTimeout('delayer2()',2000);	
}

/*Accion del boton aceptar del modal de confirmacion de habilitacion de carrera.
Cambia el estado de los botones habilitar y deshabilitar*/
document.getElementById('btnAceptarHabilitar').onclick = function modificaEstado(){
		document.getElementById('btnDeshabilitar').disabled = false;
		document.getElementById('btnHabilitar').disabled = true;
		setTimeout('delayer3()',2000);
}  
	
/*Accion del boton cancelar del modal de confirmacion de habilitacion de carrera.
No cambia el estado de los botones habilitar y deshabilitar*/
document.getElementById('btnCancelarHabilitar').onclick = function noModificaEstado(){
		document.getElementById('btnDeshabilitar').disabled = true;
		document.getElementById('btnHabilitar').disabled = false;
		setTimeout('delayer4()',2000);
}

/***************************************************************************************************************************/
														/*Segunda carrera*/
/***************************************************************************************************************************/
/*Inicializa botones*/
document.getElementById('btnHabilitar2').disabled = false;
document.getElementById('btnDeshabilitar2').disabled = true;

/*Direcciona a la página que contiene el formulario de modificación de carrera*/
document.getElementById('btnModificar2').onclick = function mostrarFormModificar(){
	window.location = "modificarCarrera.html";
}

/*Desactiva el botón Habilitar si es presionado y activa el botón Deshabilitar*/
document.getElementById('btnHabilitar2').onclick = function deshabilitarBtnHabilitar(){
	document.getElementById('btnHabilitar2').disabled = true;
	document.getElementById('btnDeshabilitar2').disabled = false;
}
/*Desactiva el botón Deshabilitar si es presionado y activa el botón Habilitar*/
document.getElementById('btnDeshabilitar2').onclick = function deshabilitarBtnDeshabilitar(){
	document.getElementById('btnDeshabilitar2').disabled = true;
	document.getElementById('btnHabilitar2').disabled = false;
}


/*Accion del boton aceptar del modal de confirmacion de deshabilitacion de carrera.
Cambia el estado de los botones habilitar y deshabilitar*/
document.getElementById('btnAceptarDeshabilitar2').onclick = function modificaEstado(){
	document.getElementById('btnDeshabilitar2').disabled = true;
	document.getElementById('btnHabilitar2').disabled = false;
	setTimeout('delayer1()',2000);	
}

/*Accion del boton cancelar del modal de cancelacion de deshabilitacion de carrera.
No cambia el estado de los botones habilitar y deshabilitar*/
document.getElementById('btnCancelarDeshabilitar2').onclick = function noModificaEstado(){
	document.getElementById('btnHabilitar2').disabled = true;
	document.getElementById('btnDeshabilitar2').disabled = false;
	setTimeout('delayer2()',2000);	
}

/*Accion del boton aceptar del modal de confirmacion de habilitacion de carrera.
Cambia el estado de los botones habilitar y deshabilitar*/
document.getElementById('btnAceptarHabilitar2').onclick = function modificaEstado(){
		document.getElementById('btnDeshabilitar2').disabled = false;
		document.getElementById('btnHabilitar2').disabled = true;
		setTimeout('delayer3()',2000);
}  
	
/*Accion del boton cancelar del modal de confirmacion de habilitacion de carrera.
No cambia el estado de los botones habilitar y deshabilitar*/
document.getElementById('btnCancelarHabilitar2').onclick = function noModificaEstado(){
		document.getElementById('btnDeshabilitar2').disabled = true;
		document.getElementById('btnHabilitar2').disabled = false;
		setTimeout('delayer4()',2000);
}

/***************************************************************************************************************************/
														/*Tercera carrera*/
/***************************************************************************************************************************/
/*Inicializa botones*/
document.getElementById('btnHabilitar3').disabled = true;
document.getElementById('btnDeshabilitar3').disabled = false;

/*Direcciona a la página que contiene el formulario de modificación de carrera*/
document.getElementById('btnModificar3').onclick = function mostrarFormModificar(){
	window.location = "modificarCarrera.html";
}

/*Desactiva el botón Habilitar si es presionado y activa el botón Deshabilitar*/
document.getElementById('btnHabilitar3').onclick = function deshabilitarBtnHabilitar(){
	document.getElementById('btnHabilitar3').disabled = true;
	document.getElementById('btnDeshabilitar3').disabled = false;
}
/*Desactiva el botón Deshabilitar si es presionado y activa el botón Habilitar*/
document.getElementById('btnDeshabilitar3').onclick = function deshabilitarBtnDeshabilitar(){
	document.getElementById('btnDeshabilitar3').disabled = true;
	document.getElementById('btnHabilitar3').disabled = false;
}

/*Accion del boton aceptar del modal de confirmacion de deshabilitacion de carrera.
Cambia el estado de los botones habilitar y deshabilitar*/
document.getElementById('btnAceptarDeshabilitar3').onclick = function modificaEstado(){
	document.getElementById('btnDeshabilitar3').disabled = true;
	document.getElementById('btnHabilitar3').disabled = false;
	setTimeout('delayer1()',2000);	
}

/*Accion del boton cancelar del modal de cancelacion de deshabilitacion de carrera.
No cambia el estado de los botones habilitar y deshabilitar*/
document.getElementById('btnCancelarDeshabilitar3').onclick = function noModificaEstado(){
	document.getElementById('btnHabilitar3').disabled = true;
	document.getElementById('btnDeshabilitar3').disabled = false;
	setTimeout('delayer2()',2000);	
}

/*Accion del boton aceptar del modal de confirmacion de habilitacion de carrera.
Cambia el estado de los botones habilitar y deshabilitar*/
document.getElementById('btnAceptarHabilitar3').onclick = function modificaEstado(){
		document.getElementById('btnDeshabilitar3').disabled = false;
		document.getElementById('btnHabilitar3').disabled = true;
		setTimeout('delayer3()',2000);
}  
	
/*Accion del boton cancelar del modal de confirmacion de habilitacion de carrera.
No cambia el estado de los botones habilitar y deshabilitar*/
document.getElementById('btnCancelarHabilitar3').onclick = function noModificaEstado(){
		document.getElementById('btnDeshabilitar3').disabled = true;
		document.getElementById('btnHabilitar3').disabled = false;
		setTimeout('delayer4()',2000);
}

/***************************************************************************************************************************/
														/*Cuarta carrera*/
/***************************************************************************************************************************/
/*Inicializa botones*/
document.getElementById('btnHabilitar4').disabled = false;
document.getElementById('btnDeshabilitar4').disabled = true;

/*Direcciona a la página que contiene el formulario de modificación de carrera*/
document.getElementById('btnModificar4').onclick = function mostrarFormModificar(){
	window.location = "modificarCarrera.html";
}

/*Desactiva el botón Habilitar si es presionado y activa el botón Deshabilitar*/
document.getElementById('btnHabilitar4').onclick = function deshabilitarBtnHabilitar(){
	document.getElementById('btnHabilitar4').disabled = true;
	document.getElementById('btnDeshabilitar4').disabled = false;
}
/*Desactiva el botón Deshabilitar si es presionado y activa el botón Habilitar*/
document.getElementById('btnDeshabilitar4').onclick = function deshabilitarBtnDeshabilitar(){
	document.getElementById('btnDeshabilitar4').disabled = true;
	document.getElementById('btnHabilitar4').disabled = false;
}

/*Accion del boton aceptar del modal de confirmacion de deshabilitacion de carrera.
Cambia el estado de los botones habilitar y deshabilitar*/
document.getElementById('btnAceptarDeshabilitar4').onclick = function modificaEstado(){
	document.getElementById('btnDeshabilitar4').disabled = true;
	document.getElementById('btnHabilitar4').disabled = false;
	setTimeout('delayer1()',2000);	
}

/*Accion del boton cancelar del modal de cancelacion de deshabilitacion de carrera.
No cambia el estado de los botones habilitar y deshabilitar*/
document.getElementById('btnCancelarDeshabilitar4').onclick = function noModificaEstado(){
	document.getElementById('btnHabilitar4').disabled = true;
	document.getElementById('btnDeshabilitar4').disabled = false;
	setTimeout('delayer2()',2000);	
}

/*Accion del boton aceptar del modal de confirmacion de habilitacion de carrera.
Cambia el estado de los botones habilitar y deshabilitar*/
document.getElementById('btnAceptarHabilitar4').onclick = function modificaEstado(){
		document.getElementById('btnDeshabilitar4').disabled = false;
		document.getElementById('btnHabilitar4').disabled = true;
		setTimeout('delayer3()',2000);
}  
	
/*Accion del boton cancelar del modal de confirmacion de habilitacion de carrera.
No cambia el estado de los botones habilitar y deshabilitar*/
document.getElementById('btnCancelarHabilitar4').onclick = function noModificaEstado(){
		document.getElementById('btnDeshabilitar4').disabled = true;
		document.getElementById('btnHabilitar4').disabled = false;
		setTimeout('delayer4()',2000);
}

/***************************************************************************************************************************/
														/*Quinta carrera*/
/***************************************************************************************************************************/
/*Inicializa botones*/
document.getElementById('btnHabilitar5').disabled = true;
document.getElementById('btnDeshabilitar5').disabled = false;

/*Direcciona a la página que contiene el formulario de modificación de carrera*/
document.getElementById('btnModificar5').onclick = function mostrarFormModificar(){
	window.location = "modificarCarrera.html";
}

/*Desactiva el botón Habilitar si es presionado y activa el botón Deshabilitar*/
document.getElementById('btnHabilitar5').onclick = function deshabilitarBtnHabilitar(){
	document.getElementById('btnHabilitar5').disabled = true;
	document.getElementById('btnDeshabilitar5').disabled = false;
}
/*Desactiva el botón Deshabilitar si es presionado y activa el botón Habilitar*/
document.getElementById('btnDeshabilitar5').onclick = function deshabilitarBtnDeshabilitar(){
	document.getElementById('btnDeshabilitar5').disabled = true;
	document.getElementById('btnHabilitar5').disabled = false;
}

/*Accion del boton aceptar del modal de confirmacion de deshabilitacion de carrera.
Cambia el estado de los botones habilitar y deshabilitar*/
document.getElementById('btnAceptarDeshabilitar5').onclick = function modificaEstado(){
	document.getElementById('btnDeshabilitar5').disabled = true;
	document.getElementById('btnHabilitar5').disabled = false;
	setTimeout('delayer1()',2000);	
}

/*Accion del boton cancelar del modal de cancelacion de deshabilitacion de carrera.
No cambia el estado de los botones habilitar y deshabilitar*/
document.getElementById('btnCancelarDeshabilitar5').onclick = function noModificaEstado(){
	document.getElementById('btnHabilitar5').disabled = true;
	document.getElementById('btnDeshabilitar5').disabled = false;
	setTimeout('delayer2()',2000);	
}

/*Accion del boton aceptar del modal de confirmacion de habilitacion de carrera.
Cambia el estado de los botones habilitar y deshabilitar*/
document.getElementById('btnAceptarHabilitar5').onclick = function modificaEstado(){
		document.getElementById('btnDeshabilitar5').disabled = false;
		document.getElementById('btnHabilitar5').disabled = true;
		setTimeout('delayer3()',2000);
}  
	
/*Accion del boton cancelar del modal de confirmacion de habilitacion de carrera.
No cambia el estado de los botones habilitar y deshabilitar*/
document.getElementById('btnCancelarHabilitar5').onclick = function noModificaEstado(){
		document.getElementById('btnDeshabilitar5').disabled = true;
		document.getElementById('btnHabilitar5').disabled = false;
		setTimeout('delayer4()',2000);
}
