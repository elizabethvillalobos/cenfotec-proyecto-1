<?php
	require_once('../includes/functions.php');
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo APP_TITLE; ?></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/gic.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/pages/seguridad.css">	
	</head>
	<body>
		<?php include(ROOT.'/includes/header-light.php'); ?>
		<main class='iniciarSesion'>
				
				<div class="mod-bd">
				
					<h2>Gestor Inteligente de Citas</h2>
					<form  name="inicioSesion" id="recuperarContra" action="mensajeRecuperacion.php" method="post">
						<fieldset class="field">
							<legend>Recuperar Contraseña</legend>
							
							<div class="form-row">
								<label for="">Correo electrónico:</label>
								<span class="flaticon-black218 icon"></span>
								<input id="email" type="mail" placeholder="" class="form-control" />
							</div>
							
							
							<p class="alert-error flaticon-remove11 "></p>
							
							<div class="form-row form-row-button">
								<button id="btn-recuperar" class="btn btn-primary">Recuperar Contraseña</button>
								
							</div>
														
							<div class="links">
							    <a href="/cenfotec-proyecto-1/seguridad/registrarUsuario.php" id="aRegistrar">Registrarse</a>
							    <a href="/cenfotec-proyecto-1/seguridad/iniciarsesion.php" id="aOlvide">Iniciar Sesión</a>
							</div>
						</fieldset>
					</form>

				</div>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>
		
		<!-- Load JS -->
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
        <script src="/cenfotec-proyecto-1/js/recordarContrasena.js"></script>
	</body>
</html>