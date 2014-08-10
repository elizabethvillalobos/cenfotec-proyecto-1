<?php 
	require_once('../includes/functions.php');
	$currentModule = 'citas';
	$currentSubModule = 'agenda'; 
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
	<body id="page-agenda">
		<div class="wrapper">
			<?php include(ROOT.'/includes/header.php'); ?>
			<?php include(ROOT.'/includes/aside-citas.php'); ?>

			<main>
				<!-- Elemento a utilizar por Handlebars para imprimir las citas.-->
				<div id="citas-container"></div>

				<!-- Handlebars template -->
				<script id="template-cita" type="text/x-handlebars-template">
  					<section class="cita visible">
  						<div class="mod-hd">
							<h2>{{ fechaInicio }}</h2>
							<span class="cita-hora-inicio-fin">6:00 p.m. a 7:00 p.m.</span>
						</div>
						<div class="mod-bd">
							<div class="row">
								<img class="cita-photo" src="{{ imagenSolicitado }}" width="75" height="75">
								<span class="label">Invitado:</span>
								<div class="data-wrap">
									<span class="data cita-invitado">{{ nombreSolicitado }}</span>
									<span class="data">{{ correoSolicitado }}</span>
									{{#if telefonoSolicitado }}
										<span class="data">{{ telefonoSolicitado }}</span>
									{{/if}}
								</div>
							</div>
							<div class="row">
								<span class="label">Asunto a tratar:</span>
								<span class="data">{{ asunto }}</span>
							</div>

							<div class="row">
								<span class="label">Curso:</span>
								<span class="data">{{ curso }}</span>
							</div>

							<div class="row">
								<span class="label">Modalidad:</span>
								<span class="data">{{ modalidad }}</span>
							</div>

							<div class="row">
								<span class="label">Tipo:</span>
								<span class="data">{{ tipo }}</span>
							</div>

							<div class="row">
								<span class="label">Observaciones:</span>
								<span class="data">{{ observaciones }}</span>
							</div>
							<div class="form-row form-row-button">
								<button type="button" class="btn btn-primary js-modal" data-modal-id="modal-finalizar">Finalizar</a>
								<button type="button" class="btn btn-default js-modal" data-modal-id="modal-cancelar">Cancelar</a>
							</div>
						</div>
					</section>
				</script>


				<section class="cita no-cita">
					<p class="flaticon-information38">No hay citas agendadas para la fecha seleccionada.</p>
				</section>

				<div id="modal-finalizar" class="modal js-modal-window">
					<span class="close flaticon-close3 js-modal-close">Close</span>
					<h3>¿Está seguro que desea finalizar la cita de atención?</h3>
					<div class="form-row">

						<a href="/cenfotec-proyecto-1/citas/citaFinalizada.php" class="btn btn-primary js-modal-aceptar">Sí</a>

						<a href="citaFinalizada.php" class="btn btn-primary js-modal-aceptar">Sí</a>

						<a href="#" class="btn btn-default js-modal-close">No</a>
					</div>
				</div>
				<div id="modal-cancelar" class="modal js-modal-window">
					<span class="close flaticon-close3 js-modal-close">Close</span>
					<h3>¿Está seguro que desea cancelar la cita de atención?</h3>
					<div class="form-row">

						<a href="/cenfotec-proyecto-1/citas/citaCancelada.php" class="btn btn-primary js-modal-aceptar">Sí</a>

						<a href="citaCancelada.php" class="btn btn-primary js-modal-aceptar">Sí</a>

						<a href="#" class="btn btn-default js-modal-close">No</a>
					</div>
				</div>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>

		<!-- Load JS -->
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-ui.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/handlebars-v1.3.0.js"></script>
		<script src="/cenfotec-proyecto-1/js/gic.js"></script>
        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
        <script src="/cenfotec-proyecto-1/js/citas.js"></script>
	</body>
</html>