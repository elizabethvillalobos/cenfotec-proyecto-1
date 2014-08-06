<?php
	require_once('../includes/functions.php');
	$currentModule = '';
	$currentSubModule = 'contraseña';
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
				<section>
					<div class="mod-hd">
						<h2>Cambiar contraseña</h2>
					</div>
					<div class="mod-bd">
						<form id="modificar-usuario" class="mod-bd form-horizontal" action="/cenfotec-proyecto-1/configuracion/usuariosConsultar.php" method="post" data-validate="true" novalidate>
						<div class="form-row">
							<label for="usuario-nombre">Contraseña actual:</label>
							<input id="usuario-nombre" type="password" placeholder="Ingrese la contraseña actual" class="form-control" value="" required/>
						</div>

						<div class="form-row">
							<label for="usuario-apellidos">Nueva contraseña:</label>
							<input id="usuario-apellidos" type="password" placeholder="Ingrese la nueva contraseña" class="form-control" value="" required/>
						</div>
						
						<div class="form-row">
							<label for="usuario-apellidos">Nueva contraseña:</label>
							<input id="usuario-apellidos" type="password" placeholder="Confirme la nueva contraseña" class="form-control" value="" required/>
						</div>

						<div class="form-row form-row-button">
							<button id="btn-guardar-usuario" class="btn btn-primary" type="submit">Guardar</button>
						</div>
					</form>
					</div>
				</section>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>
	</body>
</html>