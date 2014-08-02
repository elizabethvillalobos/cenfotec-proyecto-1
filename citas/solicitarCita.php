<!DOCTYPE html>
<html>
	<head>
		<title>Universidad Cenfotec - Gestor Ingeligente de Citas</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../css/gic.css">
		<link rel="stylesheet" href="../css/pages/citas.css">
	</head>
	<body>
		<div class="wrapper">
			<?php include('../includes/header.php'); ?>
			<?php include('../includes/aside-citas.php'); ?>

			<main>
				<section class="cita">
					<div class="mod-hd">
						<h2>Solicitar cita de atención</h2>
					</div>
					<div class="mod-bd">
					<form id="solicitarCita" class="frontContent" action="#" method="post">						
						<div class="form-row">
							<label for="txtCurso">Curso (opcional):</label>
							<input id="txtCurso" type="text" placeholder="Seleccione un curso" class="inputExplore form-control" disabled/>
							<button type="button" id="btnSelectCurso"class="btn btn-default evaluacion flaticon-magnifier12 btnIcon"></button>
						</div>													
						<div class="form-row">
							<label for="txtInvitado">Invitado:</label>
							<input id="txtInvitado" type="text" placeholder="Seleccione un profesor" class="inputExplore form-control" disabled/>
							<button type="button" id="btnSelectInvitado" class="btn btn-default evaluacion flaticon-magnifier12 btnIcon"></button>
						</div>
						<div class="form-row">
							<label for="txtAsunto">Asunto a tratar:</label>
							<input id="txtAsunto" type="text" placeholder="Ingrese el asunto a tratar en la cita" class="form-control" />
						</div>								
						<div class="form-row form-row-radio">
							<label>Modalidad:</label>
							<label class="radio">
								<input type="radio" name="rdoLugar" value="1" data-toggle="radio" checked>Presencial
							</label>
							<label class="radio">
								<input type="radio" name="rdoLugar" value="2" data-toggle="radio">Virtual
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
							<textarea id="txtObservaciones" placeholder="Ingrese comentarios adicionales de la cita" class="form-control"></textarea>
						</div>
						<div id="enviarRow" class="form-row form-row-button">
							<a href="solicitudEnviada.html" id="btnEnviar" class="btn btn-primary">Enviar</a>
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
		<script src="../js/vendors/jquery-1.8.3.min.js"></script>
		<script src="../js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="../js/vendors/bootstrap.min.js"></script>
        <script src="../js/vendors/bootstrap-select.js"></script>
		<script src="../js/vendors/flatui-checkbox.js"></script>
		<script src="../js/vendors/flatui-radio.js"></script>
        <script src="../js/gic.js"></script>
		<script src="../js/common-logic.js"></script>
		<script src="../js/solicitarCita.js"></script>
	</body>
</html>