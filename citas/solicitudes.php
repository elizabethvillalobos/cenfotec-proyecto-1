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
		<div id="solicitudes" class="wrapper">
			<?php include(ROOT.'/includes/header.php'); ?>
			<?php include(ROOT.'/includes/aside-citas.php'); ?>

			<main>
				<section class="cita">
					<div class="mod-hd">
						<h2>Diego Barillas Valverde</h2>
						<span class="cita-hora-inicio-fin">Solicitud pendiente</span>
					</div>
					<div class="mod-bd">
						<div class="row">
							<span class="label">Solicitante:</span>
							<div class="data-wrap">
								<span class="data cita-invitado">Diego Barillas Valverde</span>
								<span class="data">dbarillasv@ucenfotec.ac.cr</span>
								<span class="data">2568-5635</span>
							</div>
						</div>

						<img class="cita-photo" src="../images/users/diego-barillas.jpg" width="75" height="75">

						<div class="row">
							<span class="label">Asunto a tratar:</span>
							<span class="data">Casos de uso</span>
						</div>

						<div class="row">
							<span class="label">Curso:</span>
							<span class="data">Programación orientada a objetos</span>
						</div>

						<div class="row">
							<span class="label">Lugar:</span>
							<span class="data">Cenfotec</span>
						</div>

						<div class="row">
							<span class="label">Tipo:</span>
							<span class="data">Individual</span>
						</div>

						<div class="row">
							<span class="label">Observaciones:</span>
							<span class="data">Hola profe, es sobre casos de uso expandidos.</span>
						</div>
						
						
						<h3>Asignación de fecha y hora</h3>
						<form id="solicitarCita" class="form-horizontal" action="#" method="post">
                            <div class="form-row">
                                <label for="txtFecha">Fecha:</label>
                                <input id="txtFecha" type="text" placeholder="Ingrese la fecha" class="form-control datepicker" />
                            </div>

                            <div class="form-row">
                                <label for="txtHoraInicio">Hora de inicio:</label>
                                <input id="txtHoraInicio" type="time" pattern="^([0-1]?[0-9]|2[0-4]):([0-5][0-9])(:[0-5][0-9])?$" class="form-control form-control-time" required />
                            </div>

                            <div class="form-row ">
                                <label for="txtHoraFin">Hora de fin:</label>
                                <input id="txtHoraFin" type="time" class="form-control form-control-time" />
                            </div>							
							
                            <div class="form-row form-row-button">
								<a href="/cenfotec-proyecto-1/citas/solicitudPropuesta.php" id="btnAceptar" class="btn btn-primary">Aceptar</a>
								<a href="/cenfotec-proyecto-1/citas/solicitudRechazada.php" id="btnRechazar" class="btn btn-default js-modal" data-modal-id="modal-cancelar">Rechazar</a>
							</div>                  
						</form>
					</div>
				</section>
				
				<div id="modal-cancelar" class="modal js-modal-window">
					<span class="close flaticon-close3 js-modal-close">Close</span>
					<h3>¿Está seguro que desea rechazar la solicitud de cita de atención?</h3>
					<div class="form-row">
						<a href="/cenfotec-proyecto-1/citas/solicitudRechazada.php" class="btn btn-primary js-modal-aceptar">Sí</a>
						<a href="#" class="btn btn-default js-modal-close">No</a>
					</div>
				</div>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>

		<script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-ui.js"></script>
		<script src="/cenfotec-proyecto-1/js/gic.js"></script>
        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
		<script src="/cenfotec-proyecto-1/js/solicitarCita.js"></script>
	</body>
</html>