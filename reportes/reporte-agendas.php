<?php
	require_once('../includes/functions.php');
	require_once('../includes/functions-reportes.php');
	$currentModule = 'reportes';
	$currentSubModule = 'agenda';
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
					<h2>Reporte de agendas</h2>
					<table id="tblAgendas" class="tblReportes selectable">
						<thead>
							<tr>
								<th class="center">Usuario</th>
								<th class="center">Rol</th>
								<th class="center">Citas pendientes</th>
								<th class="center">Citas finalizadas</th>
								<th class="center">Citas canceladas</th>
							</tr>
						</thead>
						<tbody>
							<?php reporteAgendas(); ?>
						</tbody>
					</table>
				</div>
				<div class="mod-bd">
					
				</div>
			</main>
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>
        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
	</body>
</html>