<?php 
	require_once('../includes/functions.php');
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Universidad Cenfotec - Gestor Ingeligente de Citas</title>
		<meta charset="utf-8">
		<link href="../bootstrap/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="../css/flaticon.css">
		<link rel="stylesheet" href="../css/gic.css">
		<link rel="stylesheet" href="../css/pages/seguridad.css">
	</head>
	<body>
		<?php include(ROOT.'/includes/header-light.php'); ?>

		<main class='activarCuenta'>
			<div class="mod-bd">				
				<h2>Gestor Inteligente de Citas</h2>
				<form id="activacion" action="/cenfotec-proyecto-1/seguridad/iniciarSesion.php" method="post">
					<fieldset class="field">
						<legend>Activación de cuenta</legend>
						
						<div class="form-row">
							<label for="">Código de activación de cuenta:</label>
							<span class="flaticon-lock26 icon"></span>
							<input id="codigoAct" type="text" placeholder="" class="form-control" />
						</div>
						
						<p class="alert-error flaticon-remove11 "></p>
						
						<div class="form-row form-row-button">
							<button id="btnActivar" class="btn btn-primary">Activar cuenta</button>
							
						</div>
					</fieldset>
				</form>
			</div>
		</main>
			
		<?php include(ROOT.'/includes/footer.php'); ?>
		
		<!-- Load JS -->
		<script src="../js/common-logic.js"></script>
        <script src="../seguridad/activarCuenta.js"></script>
		<script src="js/vendors/jquery-1.8.3.min.js"></script>
		<script src="js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="js/vendors/bootstrap.min.js"></script>
        <script src="js/vendors/bootstrap-select.js"></script>
		<script src="js/vendors/flatui-checkbox.js"></script>
		<script src="js/vendors/flatui-radio.js"></script>
        <script src="js/gic.js"></script>
        
	</body>
</html>