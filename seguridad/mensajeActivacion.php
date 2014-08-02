<!DOCTYPE html>
<html>
	<head>
		<title>Universidad Cenfotec - Gestor Ingeligente de Citas</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../css/gic.css">
		<link rel="stylesheet" href="../css/pages/seguridad.css">		
	</head>
	<body>			
		<? include('../includes/header-light.php'); ?>
		<main class='iniciarSesion'>
			
			<div class="mod-bd">			
				<h2>Gestor Inteligente de Citas</h2>
                <section class="msg-confirm">
                    <div class="mod-hd">
                        <h2 class="flaticon-information38">Mensaje de activación de cuenta</h2>
                    </div>
                    <div class="mod-bd">
                        <p>Este es el código para activar la cuenta: <strong id="codigoActiv"></strong></p>
                        <p>Presione activar cuenta e ingrese el código para poder acceder al sistema (se reconocen las mayúsculas y las minúsculas)</p>   

                        <a href="/cenfotec-proyecto-1/seguridad/activarCuenta.php"  id="btn-activarCuenta" class="btn btn-primary">Activar cuenta</a>
                    </div>
                </section>
			</div>
		</main>
			
		<? include('../includes/footer.php'); ?>
		
		<!-- Load JS -->
		<script src="../js/common-logic.js"></script>
        <script src="../seguridad/iniciarSesion.js"></script>
		<script src="js/vendors/jquery-1.8.3.min.js"></script>
		<script src="js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="js/vendors/bootstrap.min.js"></script>
        <script src="js/vendors/bootstrap-select.js"></script>
		<script src="js/vendors/flatui-checkbox.js"></script>
		<script src="js/vendors/flatui-radio.js"></script>
        <script src="js/gic.js"></script>
        
	</body>
</html>