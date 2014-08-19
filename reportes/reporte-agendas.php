<?php
	require_once('../includes/functions.php');
	$currentModule = 'reportes';
	$currentSubModule = 'agendas';
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
								<th class="center">Citas Pendientes</th>
								<th class="center">Citas Finalizadas</th>
								<th class="center">Citas Canceladas</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><a href="/cenfotec-proyecto-1/reportes/reporte-especifico.php?idUsuario=">Diego Barillas Valverde</a></td>
								<td>Estudiante</td>
								<td class="center">4</td>
								<td class="center">6</td>
								<td class="center">0</td>
							</tr>
							<tr>
								<td><a href="/cenfotec-proyecto-1/reportes/reporte-especifico.php?idUsuario=">Pablo Monestel</a></td>
								<td>Coordinador Académico</td>
								<td class="center">4</td>
								<td class="center">5</td>
								<td class="center">0</td>
							</tr>
							<tr>
								<td><a href="/cenfotec-proyecto-1/reportes/reporte-especifico.php?idUsuario=">Antonio Luna</a></td>
								<td>Profesor</td>
								<td class="center">3</td>
								<td class="center">4</td>
								<td class="center">1</td>
							</tr>
							<tr>
								<td><a href="/cenfotec-proyecto-1/reportes/reporte-especifico.php?idUsuario=">Miguel Coto</a></td>
								<td>Estudiante</td>
								<td class="center">3</td>
								<td class="center">2</td>
								<td class="center">1</td>
							</tr>
							<tr>
								<td><a href="/cenfotec-proyecto-1/reportes/reporte-especifico.php?idUsuario=">Alexander Corrales Solís</a></td>
								<td>Estudiante</td>
								<td class="center">1</td>
								<td class="center">1</td>
								<td class="center">1</td>
							</tr>
							<tr>
								<td><a href="/cenfotec-proyecto-1/reportes/reporte-especifico.php?idUsuario=">Andrea Arroyo Cascante</a></td>
								<td>Asistente de curso</td>
								<td class="center">0</td>
								<td class="center">1</td>
								<td class="center">1</td>
							</tr>
							
						</tbody>
					</table>
				</div>
				<div class="mod-bd">
					
				</div>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>

        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
		<script src="/cenfotec-proyecto-1/js/reportes.js"></script>
	</body>
</html>