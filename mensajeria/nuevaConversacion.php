<?php session_start(); 
	error_reporting(0);
	require_once('../includes/functions.php');
	require_once('../includes/functions-mensajeria.php');
	$currentModule = 'mensajeria'; 
	$currentSubModule = 'nueva'; 
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo APP_TITLE; ?></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/gic.css">
	</head>
	<body>
		<div class="wrapper">
			<?php include(ROOT.'/includes/header.php'); ?>
			<?php include(ROOT.'/includes/aside-mensajeria.php'); ?>

			<main>
				<section class="nuevaConversacion">
					<div class="mod-hd">
						<h2>Nueva conversación</h2>
					</div>
					<div class="mod-bd">
					<form id="iniciarConversacion" action="#" method="post">		
						<div class="form-row">
							<label for="txtDestinatario">Destinatario:</label>
							<input id="txtDestinatario" class="form-control" type="text" value="" placeholder="Seleccione un destinatario" onkeyup="buscarDestinatario(event)" required/>
							<div id="resDestinatario"></div>
						</div>
						<div class="form-row">
							<label for="txtMensaje">Mensaje:</label>
							<textarea id="txtMensaje" placeholder="Ingrese el mensaje" class="form-control"></textarea>
						</div>
						<div id="enviarRow" class="form-row form-row-button">
							<a id="btnCrearConversacion" class="btn btn-primary">Enviar</a>
						</div>
					</form>
					
				</section>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap-select.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-checkbox.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-radio.js"></script>
        <script src="/cenfotec-proyecto-1/js/gic.js"></script>
		<script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
		<script src="/cenfotec-proyecto-1/js/mensajeria.js"></script>
	</body>
</html>