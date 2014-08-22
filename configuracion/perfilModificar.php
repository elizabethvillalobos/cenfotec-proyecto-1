<?php
    require_once('../includes/functions.php');
    require_once('../includes/functions-micuenta.php');
    $currentSubModule = 'perfil';
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
			<?php include(ROOT.'/includes/aside-miCuenta.php'); ?>

			<main>
				<section class="perfil-modificar">
					<div class="mod-hd">
						<h2>Modificar perfil</h2>
					</div>
					<form id="modificar-perfil" class="mod-bd form-horizontal" action="" method="post" data-validate="true" novalidate>
						<p><span class="requerido">*</span> Campos requeridos</p>
						
						<?php cargarModificarPerfil($id) ?>

						<div class="form-row form-row-button">
							<button id="btn-guardar-perfil" class="btn btn-primary" type="submit">Guardar</button>
							<button id="btn-cancelar-perfil" class="btn btn-secondary" type="button">Cancelar</button>
						</div>
					</form>
				</section>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>

		<!-- Load JS -->
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/jquery.html5uploader-1.1.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap-select.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/exif.js"></script>
        <script src="/cenfotec-proyecto-1/js/flatui.js"></script>
        <script src="/cenfotec-proyecto-1/js/html5uploader.js"></script>
        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
        <script src="/cenfotec-proyecto-1/js/micuenta.js"></script>
        <script src="/cenfotec-proyecto-1/js/configuracion.js"></script>
	</body>
</html>