<?php session_start(); 
    error_reporting(0);
	require_once('../includes/functions.php');
	require_once('../includes/functions-citas.php');
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
				<!--mostrarSolicitud(idCita,idUsuarioActivo)-->
				<?php mostrarSolicitud($_GET['idCita'],$_SESSION['usuarioActivoId'] )?>

				<div id="modal-rechazar" class="modal js-modal-window">
					<span class="close flaticon-close3 js-modal-close">Close</span>
					<h3>¿Está seguro que desea rechazar la solicitud de cita?</h3>
					<input id="cita-id-finalizacion" type="hidden" value=""/>
					<div class="form-row">
						<button type="button" id="btn-finalizar-cita" class="btn btn-primary js-modal-aceptar">Sí</button>
						<button type="button" class="btn btn-default js-modal-close">No</button>
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