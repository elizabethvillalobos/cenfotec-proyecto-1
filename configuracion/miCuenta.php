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
						
					</div>
				</section>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>
	</body>
</html>