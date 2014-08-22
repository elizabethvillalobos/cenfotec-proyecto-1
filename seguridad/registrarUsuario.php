<?php
    require_once('../includes/functions.php');
    require_once(ROOT.'/includes/functions-usuarios.php');
    require_once(ROOT.'/includes/functions-seguridad.php');
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
		<?php include('../includes/header-light.php'); ?>
		<main class='registrarUsuario'>
			
			<div class="mod-bd">
				<form id="form-registro"  class="form-horizontal" action="/cenfotec-proyecto-1/seguridad/mensajeActivacion.php" method="post">
					<fieldset class="field">
						<legend>Registro</legend>
						
						<div class="form-row">
							<label for="">Correo electrónico:</label>
							<span class="flaticon-black218 icon"></span>
							<input id="email" type="mail" placeholder="" class="form-control" />
						</div>
						<div class="form-row ">
							<label for="">Nombre:</label>
							<span class="flaticon-male12 icon"></span>
							<input id="nombre" type="text" placeholder="" class="form-control" onkeypress="return soloLetras(event)"/>
						</div>
						<div class="form-row ">
							<label for="">Primer apellido:</label>
							<span class="flaticon-male12 icon"></span>
							<input id="apellido1" type="text" placeholder="" class="form-control" onkeypress="return soloLetras(event)"/>
						</div>
						<div class="form-row ">
							<label for="">Segundo apellido:</label>
							<span class="flaticon-male12 icon"></span>
							<input id="apellido2" type="text" placeholder="" class="form-control" onkeypress="return soloLetras(event)"/>
						</div>
						<div class="form-row ">
							<label for="">Contraseña:</label>
							<span class="flaticon-lock26 icon"></span>
							<input id="contrasena" type="password" placeholder="" class="form-control" />
						</div>
						<div class="form-row ">
							<label for="">Confirmar contraseña:</label>
							<span class="flaticon-lock26 icon"></span>
							<input id="confirmContrasena" type="password" placeholder="" class="form-control" />
						</div>
						
						<p class="alert-error flaticon-remove11 "></p>
						
						<div class="form-row form-row-button">
							<button id="btnRegistrar" class="btn btn-primary" >Registrar</button>
							
						</div>
					</fieldset>
				</form>
			</div>
		</main>
			
		<?php include('../includes/footer.php'); ?>
	</div>
		
		<!-- Load JS -->
		<script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
		<script src="/cenfotec-proyecto-1/js/registrarUsuario.js"></script>
		<script src="/cenfotec-proyecto-1/js/configuracion.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap-select.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-checkbox.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-radio.js"></script>
        <script src="/cenfotec-proyecto-1/js/gic.js"></script>
	</body>
</html>