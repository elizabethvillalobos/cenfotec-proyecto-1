<?php
	require_once('../includes/functions.php');
	require_once('../includes/functions-reportes.php');
	$currentModule = 'reportes';
	$currentSubModule = 'solicitudes';
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo APP_TITLE; ?></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/gic.css">
	</head>
	<body>
		<div class="wrapper">
			<?php include(ROOT.'/includes/header.php'); ?>
			<?php include(ROOT.'/includes/aside-reportes.php'); ?>

			<main>
				<div class="mod-hd">
					<h2>Reporte de solicitudes</h2>
					<table id="tblSolicitudes" class="tblReportes selectable">
						<thead>
							<tr>
								<th class="center">Usuario</th>
								<th class="center">Rol</th>
								<th class="center">Pendientes</th>
								<th class="center">Aceptadas</th>
								<th class="center">Rechazadas</th>
								<th class="center">Expiradas</th>
							</tr>
						</thead>
						<tbody>
							<?php reporteSolicitudes(); ?>
						</tbody>
					</table>
				</div>
				<div class="mod-bd">
					
				</div>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>
	</body>
</html>