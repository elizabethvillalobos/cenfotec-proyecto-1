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
		<main class='iniciarSesion'>
			
			<div class="mod-bd">			
				<h2>Gestor Inteligente de Citas</h2>
                <section class="msg-confirm">
                    <div class="mod-hd">
                        <h2 class="flaticon-information38">Mensaje de recuperación de contraseña</h2>
                    </div>
                    <div class="mod-bd">
                        
                        <p>La contraseña de su cuenta fue enviada al correo que suministró, favor revisar su bandeja de entrada para recuperar su contraseña.</p>   

                        <a href="/cenfotec-proyecto-1/seguridad/recordarContrasena.php"  id="btn-activarCuenta" class="btn btn-primary">Regresar</a>
                    </div>
                </section>
			</div>
		</main>
			
		<? include('../includes/footer.php'); ?>
		
		<!-- Load JS -->
		<script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
        <script src="/cenfotec-proyecto-1/seguridad/iniciarSesion.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap-select.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-checkbox.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-radio.js"></script>
        <script src="/cenfotec-proyecto-1/js/gic.js"></script>
        
	</body>
</html>