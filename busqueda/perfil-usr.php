<?php
	require_once('../includes/functions.php');
    require_once(ROOT.'/includes/functions-usuarios.php');
    if(isset($_GET['idBusqueda'])){
        //session_start();   
        $id = $_GET['idBusqueda'];
        $row = getUsuariosModif($id);
    }    
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
						<h2><?php echo utf8_encode($row['nombre']).' ' .utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']) ?></h2>
						
                        <?php echo '<a href="../citas/solicitarCita.php?idInvitado='.utf8_encode($row['id']).'" class="enviar-msj flaticon-calendar68">Solicitar cita</a>'; ?>
                        <?php echo '<a href="../mensajeria/mensajeria.php?idUsuarioOtro='.utf8_encode($row['id']).'" class="enviar-msj flaticon-black218">Enviar mensaje</a>'; ?> 
                        

					</div>
					<div class="mod-bd">
						<img class="perfil-photo" src="/cenfotec-proyecto-1/images/users/default-user.png" width="130" height="130">
						

						<div class="row">
							<span class="label">Correo electrónico:</span>
							<span class="data email"><?php echo utf8_encode($row['id'])?></span>
						</div>

						<div class="row">
							<span class="label">Teléfono:</span>
							<span class="data"><?php echo utf8_encode($row['telefono'])?></span>
						</div>

						<div class="row">
							<span class="label">Skype Id:</span>
							<span class="data"><?php echo utf8_encode($row['skypeid'])?></span>
						</div>

						<div class="row">
							<span class="label">Rol:</span>
							<span class="data"><?php echo utf8_encode($row['Rol'])?></span>
						</div>

						<div class="row">
							<span class="label">Carrera:</span>
							<span class="data"><?php echo utf8_encode($row['carrera'])?></span>
						</div>

						<!--<div class="row">
							<span class="label">Cursos:</span>
							<div class="data-wrap">
								<span class="data">Fundamentos de programación</span>
								<span class="data">Proyecto de ingeniería de software 1</span>
							</div>
						</div>-->

					</div>
				</section>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>

		<!-- Load JS -->
        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
	</body>
</html>