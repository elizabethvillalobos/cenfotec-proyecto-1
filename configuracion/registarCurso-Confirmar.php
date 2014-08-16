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
			<section class="msg-confirm">
				<div class="mod-hd">
					<h2 class="flaticon-male12">Curso creado</h2>
				</div>
				<div class="mod-bd">
					<p>El curso <span id="nombreCursoGuardado"></span> ha sido creado con éxito.</p>

					<a href="carrerasConsultar.php" class="btn btn-default" id="btnVolverCarrera">Volver</a>
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
		<script src="/cenfotec-proyecto-1/js/vendors/jquery.html5uploader-1.1.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/bootstrap.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/bootstrap-select.js"></script>
		<script src="/cenfotec-proyecto-1/js/flatui.js"></script>
		<script src="/cenfotec-proyecto-1/js/html5uploader.js"></script>
		<script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
		<script src="/cenfotec-proyecto-1/js/configuracion.js"></script>
	</body>
</html>