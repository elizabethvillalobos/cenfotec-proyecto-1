<?php
	require_once('../includes/functions.php');
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
				<section class="perfil">
					<div class="mod-hd">
						<h2>Carla Rojas Solorzano</h2>
						
                        <a href="../citas/solicitarCita.php" class="enviar-msj flaticon-calendar68">Solicitar cita</a>
                        <a href="../mensajeria/mensajeria.html" class="enviar-msj flaticon-black218">Enviar mensaje</a> 
                        

					</div>
					<div class="mod-bd">
						<img class="perfil-photo" src="/cenfotec-proyecto-1/images/users/default-user.png" width="130" height="130">
						

						<div class="row">
							<span class="label">Correo electrónico:</span>
							<span class="data email">crojass@ucenfotec.ac.cr</span>
						</div>

						<div class="row">
							<span class="label">Teléfono:</span>
							<span class="data">8830-9187</span>
						</div>

						<div class="row">
							<span class="label">Skype Id:</span>
							<span class="data">carlosrojas98</span>
						</div>

						<div class="row">
							<span class="label">Rol:</span>
							<span class="data">Estudiante</span>
						</div>

						<div class="row">
							<span class="label">Carrera:</span>
							<span class="data">Desarrollo de software</span>
						</div>

						<div class="row">
							<span class="label">Cursos:</span>
							<div class="data-wrap">
								<span class="data">Fundamentos de programación</span>
								<span class="data">Proyecto de ingeniería de software 1</span>
							</div>
						</div>

					</div>
				</section>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>

		<!-- Load JS -->
        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
	</body>
</html>