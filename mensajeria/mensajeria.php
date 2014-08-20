<?php

	require_once('../includes/functions.php');
	require_once('../includes/functions-mensajeria.php');
	$currentModule = 'mensajeria'; 
	$currentSubModule = 'conversacion'; 
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo APP_TITLE; ?></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/gic.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/pages/mensajeria.css">
	</head>
	<body>
		<div class="wrapper">
			<?php include(ROOT.'/includes/header.php'); ?>
			<?php include(ROOT.'/includes/aside-mensajeria.php'); ?>

			<main>
				<section>
					<!--mostrarSolicitud(idCita,idUsuarioActivo)-->
					<div class="conversacion">
						<?php mostrarConversacion($_SESSION['usuarioActivoId'],$_GET['idUsuarioOtro'])?>		
						<form id="nuevoMensaje" action="#" method="post">		
							<div class="form-row">
								<label for="txtMensaje">Nuevo mensaje:</label>
								<textarea id="txtMensaje" placeholder="Ingrese el mensaje" class="form-control"></textarea>
							</div>
							<div id="enviarRow" class="form-row form-row-button">
								<button id="btnCrearMensaje" class="btn btn-primary">Enviar</button>
							</div>
						</form>
					</div>
					
					
				</section>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>

        <script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-ui.js"></script>
		<script src="/cenfotec-proyecto-1/js/gic.js"></script>
        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
		<script src="/cenfotec-proyecto-1/js/mensajeria.js"></script>
	</body>
</html>