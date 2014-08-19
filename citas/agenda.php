<?php 
	session_start(); 

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

				<!-- Elemento a utilizar por Handlebars para imprimir las mensajes de confirmacion.-->
				<div id="msg-container"></div>

				<!-- Handlebars template -->
				<script id="template-cita" type="text/x-handlebars-template">
				{{#each citas}}
  					<section class="cita cita-pendiente visible">
  						<input id="cita-id-{{ citaId }}" class="cita-id" type="hidden" value="{{ citaId }}" />
  						<div class="mod-hd">
							<h2>{{ fecha }}</h2>
							<span class="cita-hora-inicio-fin">{{ horaInicio }} a {{ horaFin }}</span>
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
								<button type="button" class="btn btn-primary btn-finalizar js-modal" data-modal-id="modal-finalizar">Finalizar cita</a>
								<button type="button" class="btn btn-default btn-cancelar js-modal" data-modal-id="modal-cancelar">Cancelar cita</a>
							</div>
						</div>
					</section>
				{{/each}}
				</script>

				<section class="cita no-cita">
					<p class="flaticon-information38">No hay citas agendadas para la fecha seleccionada.</p>
				</section>

				<!-- Modal de finalizar cita -->
				<div id="modal-finalizar" class="modal js-modal-window">
					<span class="close flaticon-close3 js-modal-close">Close</span>
					<h3>¿Está seguro que desea finalizar la cita de atención?</h3>
					<input id="cita-id-finalizacion" type="hidden" value=""/>
					<div class="form-row">
						<button type="button" id="btn-finalizar-cita" class="btn btn-primary js-modal-aceptar">Sí</button>
						<button type="button" class="btn btn-default js-modal-close">No</button>
					</div>
				</div>


				<!-- Modal de cancelar cita -->
				<div id="modal-cancelar" class="modal js-modal-window">
					<span class="close flaticon-close3 js-modal-close">Close</span>

					<form id="cancelar-cita" action="#" method="post" data-validate="true" novalidate>
						<h3>¿Está seguro que desea cancelar la cita de atención?</h3>
						<input id="cita-id-cancelacion" type="hidden" value=""/>
						<div class="form-row">
							<label for="motivo-cancelacion">Motivo de la cancelación:</label>
							<textarea id="motivo-cancelacion" class="form-control" required></textarea>
						</div>
						<div class="form-row">
							<button type="button" id="btn-cancelar-cita" class="btn btn-primary js-modal-aceptar">Sí</button>
							<button type="button" class="btn btn-default js-modal-close">No</button>
						</div>
					</form>
				</div>

				<!-- Handlebars template - Cancelar cita -->
				<script id="template-msg-cancelar" type="text/x-handlebars-template">
					<section id="msg-cancelar" class="msg-confirm">
						<div class="mod-hd">
							<h2 class="flaticon-cancel17">La cita de atención se ha cancelado.</h2>
						</div>
						<div class="mod-bd">
							<p>Se ha enviado un mensaje al correo electrónico de <strong>{{ nombreSolicitado }}</strong> para notificarle que la cita fue cancelada.</p>
						</div>
					</section>
				</script>

				<!-- Handlebars template - Finalizar cita -->
				<script id="template-msg-finalizar" type="text/x-handlebars-template">
					<section id="msg-cancelar" class="msg-confirm">
						<div class="mod-hd">
							<h2 class="flaticon-cancel17">La cita de atención se ha finalizado.</h2>
						</div>
						<div class="mod-bd">
							<p>¿Desea evaluar esta cita?</p>

							<a href="/cenfotec-proyecto-1/evaluacion/evaluarCita.php?idCita={{ citaId }}" class="btn btn-primary">Evaluar</a>
							<a href="/cenfotec-proyecto-1/citas/agenda.php" class="btn btn-default">Volver</a>
						</div>
					</section>
				</script>
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