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
		<div id="solicitudesEstudiantes" class="wrapper">
			<?php include(ROOT.'/includes/header.php'); ?>
			<?php include(ROOT.'/includes/aside-citas.php'); ?>

			<main>
				<section class="cita">
					<div class="mod-hd">
						<h2>Fecha pendiente</h2>
						<span class="cita-hora-inicio-fin">Hora pendiente</span>
					</div>
					<div class="mod-bd">
						<div class="row">
							<span class="label">Invitado:</span>
							<div class="data-wrap">
								<span class="data cita-invitado">Pablo Monestel</span>
								<span class="data">amonestel@ucenfotec.ac.cr</span>
								<span class="data">8489-5012</span>
							</div>
						</div>

						<img class="cita-photo" src="../images/users/pablo-monestel.jpg" width="75" height="75">

						<div class="row">
							<span class="label">Asunto a tratar:</span>
							<span class="data">Ayuda con definición de páginas</span>
						</div>

						<div class="row">
							<span class="label">Curso:</span>
							<span class="data">Proyecto de ingeniería de software 1</span>
						</div>

						<div class="row">
							<span class="label">Observaciones:</span>
							<span class="data">Hola profe, usted puede ayudarme con lo que le pregunté al final de la clase?</span>
						</div>
					</div>
				</section>

				<div id="modal-cancelar" class="modal js-modal-window">
					<span class="close flaticon-close3 js-modal-close">Close</span>
					<h3>¿Está seguro que desea cancelar la cita de atención?</h3>
					<div class="form-row">
						<a href="/cenfotec-proyecto-1/citas/solicitudRechazada.php" class="btn btn-primary js-modal-aceptar">Sí</a>
						<a href="#" class="btn btn-default js-modal-close">No</a>
					</div>
				</div>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>

		<!-- Load JS -->
        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
		<script src="/cenfotec-proyecto-1/js/solicitarCita.js"></script>
	</body>
</html>