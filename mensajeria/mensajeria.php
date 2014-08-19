<?php

	require_once('../includes/functions.php');
	require_once('../includes/functions-mensajeria.php');
	$currentModule = 'conversacion'; 
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
			<?php //include(ROOT.'/includes/aside-mensajeria.php'); ?>

			<main>
				<section>
					<!--mostrarSolicitud(idCita,idUsuarioActivo)-->
					<?php// mostrarConversacion($_GET['idConversacion'],'acordero@ucenfotec.ac.cr')?>
					
					<div class="conversacion">
						<div class="mod-hd">
							<h2>Antonio Luna</h2>
						</div>
						<div class="mod-bd mensajes">
							<div class="form-row">
								<span>Jose Cerdas</span>
								<p>Hola profe necesito que me ayude</p>
								<p>Lorem Ipsum es simplemente el texto de relleno de las imprentas y archivos de texto. Lorem Ipsum ha sido el texto de relleno estándar de las industrias desde el año 1500, cuando un impresor (N. del T. persona que se dedica a la imprenta) desconocido usó una galería de textos y los mezcló de tal manera que logró hacer un libro de textos especimen. No sólo sobrevivió 500 años, sino que ta</p>
							</div>
							<div class="form-row noLeido">
								<span>Antonio Luna</span>
								<p>Y que quiere que haga yo?</p>
							</div>
							<div class="form-row noLeido">
								<span>Jose Cerdas</span>
								<p>Que me explique todo de nuevo</p>
							</div>
						</div>
						<form id="nuevoMensaje" action="#" method="post">		
							<div class="form-row">
								<label for="txtMensaje">Nuevo mensaje:</label>
								<textarea id="txtMensaje" placeholder="Ingrese el mensaje" class="form-control"></textarea>
							</div>
							<div id="enviarRow" class="form-row form-row-button">
								<button id="btnEnviar" class="btn btn-primary">Enviar</button>
							</div>
						</form>
					</div>
					
					
				</section>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>

        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
	</body>
</html>