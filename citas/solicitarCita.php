<?php 
	require_once('../includes/functions.php');
	$currentModule = 'citas';
	$currentSubModule = 'solicitudes'; 
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo APP_TITLE; ?></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/gic.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/pages/citas.css">
	</head>
	<body>
		<div class="wrapper">
			<?php include(ROOT.'/includes/header.php'); ?>
			<?php include(ROOT.'/includes/aside-citas.php'); ?>

			<main>
				<section class="cita">
					<div class="mod-hd">
						<h2>Solicitar cita de atención</h2>
					</div>
					<div class="mod-bd">
					<form id="solicitarCita" class="frontContent" action="#" method="post">						
						<div class="form-row">
							<label for="txtCurso">Curso (opcional):</label>
							<input id="txtCurso" class="form-control" type="text" value="" placeholder="Seleccione un curso" onkeyup="buscarCurso(event)" required/>
							<div id="resCursos"></div>
						</div>													
						<div class="form-row">
							<label for="txtInvitado">Invitado:</label>
							<input id="txtInvitado" class="form-control" type="text" value="" placeholder="Seleccione un invitado" onkeyup="buscarInvitado(event)" required/>
							<div id="resInvitados"></div>
						</div>
						<div class="form-row">
							<label for="txtAsunto">Asunto a tratar:</label>
							<input id="txtAsunto" type="text" placeholder="Ingrese el asunto a tratar en la cita" class="form-control" />
						</div>								
						<div class="form-row form-row-radio">
							<label>Modalidad:</label>
							<label class="radio">
								<input type="radio" name="rdoModalidad" value="1" data-toggle="radio" checked>Presencial
							</label>
							<label class="radio">
								<input type="radio" name="rdoModalidad" value="2" data-toggle="radio">Virtual
							</label>
						</div>
						<div class="form-row form-row-radio">
							<label>Tipo:</label>
							<label class="radio">
								<input type="radio" name="rdoTipo" value="1" data-toggle="radio" checked>Individual
							</label>
							<label class="radio">
								<input type="radio" name="rdoTipo" value="2" data-toggle="radio">Grupal
							</label>
						</div>
						<div class="form-row">
							<label for="txtObservaciones">Observaciones (opcional):</label>
							<textarea id="txtObservaciones" placeholder="Ingrese comentarios adicionales de la cita" class="form-control" maxlength="300"></textarea>
						</div>
						<div id="enviarRow" class="form-row form-row-button">
							<a id="btnEnviar" class="btn btn-primary">Enviar</a>
						</div>
					</form>
					
					<div id="listForm" class="backContent">
						<fieldset class="frmLista">
							<legend id="lblLegent"></legend>
							<ul id="listElements">								
							</ul>
							<button id="btnVolver" class="btn btn-primary">Volver</button>
						</fieldset>
					</div>
				</section>
			</main>
			
			<footer>
				<p>2014 Universidad Cenfotec. Todos los derechos reservados.</p>
			</footer>
		</div>
		
		<!-- Load JS -->
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap-select.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-checkbox.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-radio.js"></script>
        <script src="/cenfotec-proyecto-1/js/gic.js"></script>
		<script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
		<script src="/cenfotec-proyecto-1/js/solicitarCita.js"></script>
	</body>
</html>