<?php
	require_once('../includes/functions.php');
    require_once(ROOT.'/includes/functions-usuarios.php');
    require_once(ROOT.'/includes/functions-seguridad.php');
    
    $aIds = getIdUsuarios();
    $aContrasenas = getPWUsuarios();
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
					<form  name="inicioSesion" id="login" action="/cenfotec-proyecto-1/index.php" method="post">
						<fieldset class="field">
							<legend>Inicio</legend>
							
							<div class="form-row">
								<label for="">Correo electrónico:</label>
								<span class="flaticon-black218 icon"></span>
								<input id="email" type="mail" placeholder="" class="form-control" />
							</div>
							<div class="form-row ">
								<label for="">Contraseña:</label>
								<span class="flaticon-lock26 icon"></span>
								<input id="contrasena" type="password" placeholder=""  class="form-control" />
							</div>
							
							<p class="alert-error flaticon-remove11 "></p>
							
							<div class="form-row form-row-button">
								<button class="btn btn-primary">Iniciar sesión</button>
								
							</div>
							
							<div class="links">
							    <a href="/cenfotec-proyecto-1/seguridad/registrarUsuario.php" id="aRegistrar">Registrarse</a>
							    <a href="/cenfotec-proyecto-1/seguridad/olvideContrasena.php" id="aOlvide">Olvidé mi contraseña</a>
							</div>
						</fieldset>
					</form>

				</div>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>
		
		<!-- Load JS -->
		<script type="text/javascript">
            var aIdsUsuarios=<?php echo json_encode($aIds);?>;
            var aPWUsuarios=<?php echo json_encode($aContrasenas);?>;
            
            /*for(var i=0;i<aPWUsuarios.length;i++){
                alert(aPWUsuarios[i]);
            }
            */
        </script>
        <script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
        <script src="/cenfotec-proyecto-1/seguridad/iniciarSesion.js"></script>
	</body>
</html>