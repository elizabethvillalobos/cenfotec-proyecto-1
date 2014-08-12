<?php
    require_once('../includes/functions.php');

    $currentModule = 'configuracion';
    $currentSubModule = 'cursos';
?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo APP_TITLE; ?></title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/cenfotec-proyecto-1/css/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="/cenfotec-proyecto-1/css/gic.css">
	<link rel="stylesheet" href="/cenfotec-proyecto-1/css/pages/configuracion.css">
</head>
<body>
	<div class="wrapper">
		<?php include(ROOT.'/includes/header.php'); ?>
		<?php include(ROOT.'/includes/aside-configuracion.php'); ?>
		
		<main>
			<section class="perfil-editar">
				<div class="mod-hd">
					<h2>Desarrollo y Diseño Web - Crear un nuevo curso</h2>
					<span id="idCarrera"class="hidden">1</span>
				</div>
					<!-- El atributo novalidate es para evitar que el browser 
					haga las validaciones. -->
					<form id="crear-curso" class="mod-bd form-horizontal" action="registarCurso-Confirmar.html" method="post" 
					data-validate="true" novalidate>
					<div class="form-row">
						<label for="codigo-curso">Código:</label>
						<input id="codigo-curso" type="text" placeholder="Ingrese el código" class="form-control" 
						onkeypress="return soloGuion(event)" required/>
					</div>

					<div class="form-row">
						<label for="nombre-curso">Nombre:</label>
						<input id="nombre-curso" type="text" placeholder="Ingrese el nombre" class="form-control" 
						onkeypress="return soloLetrasYnumeros(event)" required/>
					</div>
					<div class="form-row">
						<label for="txtInvitado1">Profesor(es):</label>
						<input id="txtInvitado1" class="form-control nombreProfe" type="text" value="" placeholder="Seleccione un profesor" onkeyup="buscarProfesor1(event)" required/>
						<div id="resInvitados1"></div>
					</div>
					<div class="form-row">
						<label></label>
						<input id="txtInvitado2" class="form-control nombreProfe" type="text" value="" placeholder="Seleccione un profesor" onkeyup="buscarProfesor2(event)"/>
						<div id="resInvitados2"></div>
					</div>
					<div class="form-row">
						<label></label>
						<input id="txtInvitado3" class="form-control nombreProfe" type="text" value="" placeholder="Seleccione un profesor" onkeyup="buscarProfesor3(event)"/>
						<div id="resInvitados3"></div>
					</div>

					<div class="form-row form-row-button">
						<button id="btn-guardar-curso" class="btn btn-primary" type="submit">Guardar</button>
						<!--<button id="btn-cancelar" class="btn btn-secondary" type="submit">Cancelar</button>-->
						<a class="btn btn-default js-modal" 
						data-modal-id="modal-cancelar">Cancelar</a>
					</div>
				</form>
			</section>
			<div id="modal-cancelar" class="modal js-modal-window">
				<span class="close flaticon-close3 js-modal-close">Close</span>
				<h3>¿Está seguro que desea cancelar la creación de la carrera?</h3>
				<div class="form-row">
					<a href="consultarCursosDesarrollo.html" class="btn btn-primary js-modal-aceptar">Si</a>
					<a href="#" class="btn btn-default js-modal-close">No</a>
				</div>
			
			</div>
			<div id="listForm" class="backContent">
				<fieldset class="frmLista">
					<legend id="lblLegent"></legend>
					<ul id="listElements">								
					</ul>
					<button id="btnVolver" class="btn btn-primary">Volver</button>
				</fieldset>
			</div>
		</main>
		
		<?php include(ROOT.'/includes/footer.php'); ?>
	</div>

	<!-- Load JS -->
	<script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
	<script src="/cenfotec-proyecto-1/js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
	<script src="/cenfotec-proyecto-1/js/vendors/jquery.html5uploader-1.1.js"></script>
	<script src="/cenfotec-proyecto-1/js/vendors/bootstrap.min.js"></script>
	<script src="/cenfotec-proyecto-1/js/vendors/bootstrap-select.js"></script>
	<script src="/cenfotec-proyecto-1/js/flatui.js"></script>
	<script src="/cenfotec-proyecto-1/js/html5uploader.js"></script>
	<script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
	<script src="/cenfotec-proyecto-1/js/configuracion.js"></script>
	<script src="/cenfotec-proyecto-1/js/pruebaConfiguracion2d.js"></script>
	<script >consultarCursos()</script>
</body>
</html>