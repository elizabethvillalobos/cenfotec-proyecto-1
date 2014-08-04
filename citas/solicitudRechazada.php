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
				<section class="msg-confirm">
					<div class="mod-hd">
						<h2 class="flaticon-cancel17">La solicitud de cita de atención ha sido rechazada</h2>
					</div>
					<div class="mod-bd">
						<p>Se ha enviado un mensaje al correo electrónico de <strong>Ernesto Rivera</strong> para notificarle el rechazo de la solicitud.</p>

						<a href="/cenfotec-proyecto-1/citas/solicitudes.php" class="btn btn-default">Volver</a>
					</div>
				</section>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>

		<!-- Load JS -->
        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
		<script src="/cenfotec-proyecto-1/js/solicitarCita.js"></script>
	</body>
</html>