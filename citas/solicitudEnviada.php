<?php
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
		<div class="wrapper">
			<?php include(ROOT.'/includes/header.php'); ?>
			<?php include(ROOT.'/includes/aside-citas.php'); ?>

			<main>
				<section class="msg-confirm">
					<div class="mod-hd">
						<h2 class="flaticon-cancel17"><?php echo urldecode($_GET['titulo']) ?></h2>
					</div>
					<div class="mod-bd">
						<p>Se ha enviado un mensaje al correo electrónico de <strong><?php echo urldecode($_GET['nombreInvitado']) ?></strong> para notificarle sobre la acción realizada.</p>
						
						<a href="solicitudes.php?idCita=0" class="btn btn-default">Volver</a>
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