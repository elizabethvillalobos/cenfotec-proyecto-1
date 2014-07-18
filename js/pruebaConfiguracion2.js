document.getElementById('btnDeshabilitarCurso').disabled = true;
document.getElementById('btnHabilitarCurso').disabled = false;

document.getElementById('btnDeshabilitarCurso').onclick = function deshabilitarCurso(){
	document.getElementById('btnHabilitarCurso').disabled = false;
	document.getElementById('btnDeshabilitarCurso').disabled = true;
	eEliminar.style.display='none';
}

document.getElementById('btnHabilitarCurso').onclick = function habilitarCurso(){
	document.getElementById('btnHabilitarCurso').disabled = true;
	document.getElementById('btnDeshabilitarCurso').disabled = false;

}


