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
					<h2>Modificar un curso - Nombre del curso</h2>
				</div>
					<!-- El atributo novalidate es para evitar que el browser 
					haga las validaciones. -->
					<form id="modificar-curso" class="mod-bd form-horizontal" action="registarCurso-Confirmar.html" method="post" 
					data-validate="true" novalidate>

					<?php
                        if(isset($_GET['idCurso'])){
                            $result = getCursoParaModificar($_GET['idCurso']);
                        }
                    ?>


					<div class="form-row">
						<label for="codigo-curso">Código:</label>
						<input id="codigo-curso" type="text" value="<?php echo utf8_encode($result['cursoId'])?>" class="form-control" 
						onkeypress="return soloGuion(event)" required/>
					</div>

					<div class="form-row">
						<label for="nombre-curso">Nombre:</label>
						<input id="nombre-curso" type="text" value="<?php echo utf8_encode($result['cursoNombre'])?>" class="form-control" 
						onkeypress="return soloLetrasYnumeros(event)" required/>
					</div>

					<div class="form-row">
						<label for="txtInvitado1">Profesor(es):</label>
						<input type="hidden" id="profesor-id-1" />
						<input id="txtInvitado1" class="form-control nombreProfe" type="text" value="<?php echo utf8_encode($result['usuarioNombre'])?> <?php echo utf8_encode($result['usuarioApellido1'])?> <?php echo utf8_encode($result['usuarioApellido2'])?>" placeholder="Seleccione un profesor" onkeyup="buscarProfesor(event)" autocomplete="off" required/>
						<div id="txtInvitado1-results"></div>
					</div>
					<div class="form-row">
						<label></label>
						<input type="hidden" id="profesor-id-2" />
						<input id="txtInvitado2" class="form-control nombreProfe" type="text" value="<?php echo utf8_encode($result['usuarioNombre'])?> <?php echo utf8_encode($result['usuarioApellido1'])?> <?php echo utf8_encode($result['usuarioApellido2'])?>" placeholder="Seleccione un profesor" onkeyup="buscarProfesor(event)" autocomplete="off"/>
						<div id="txtInvitado2-results"></div>

					</div>
					<div class="form-row">
						<label></label>
						<input type="hidden" id="profesor-id-3" />
						<input id="txtInvitado3" class="form-control nombreProfe" type="text" value="" placeholder="Seleccione un profesor" onkeyup="buscarProfesor(event)" autocomplete="off" />
						<div id="txtInvitado3-results"></div>
					</div>

					<div class="form-row form-row-button">
						<button id="btn-modificar-curso" class="btn btn-primary" type="submit">Guardar</button>
						<!--<button id="btn-cancelar" class="btn btn-secondary" type="submit">Cancelar</button>-->
						<a class="btn btn-default js-modal" 
						data-modal-id="modal-cancelar">Cancelar</a>
					</div>
				</form>
			</section>
			<div id="modal-cancelar" class="modal js-modal-window">
				<span class="close flaticon-close3 js-modal-close">Close</span>
				<h3>¿Está seguro que desea cancelar la modificación del curso?</h3>
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
</body>
</html>