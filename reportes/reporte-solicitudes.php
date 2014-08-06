<?php
	require_once('../includes/functions.php');
	$currentModule = 'reportes';
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

			<aside>
				<nav class="secondary-nav">
					<ul class="sec-nav-category">
						<li class="accordion-item">
							<a href="reportes.php">Ranking</a>
						</li>
						<li class="accordion-item">
							<a href="reporte-solicitudes.php" class="active">Solicitudes</a>
						</li>
						<li class="accordion-item">
							<a href="reporte-agendas.php">Agendas</a>
						</li>
						<li class="accordion-item">
							<a href="reporte-usuarios.php">Usuarios registrados</a>
						</li>
					</ul>
				</nav>
			</aside>

			<main>
				<div class="mod-hd">
					<h2>Reporte de solicitudes</h2>
					<table id="tblSolicitudes" class="tblReportes selectable">
						<thead>
							<tr>
								<th class="center">Usuario</th>
								<th class="center">Rol</th>
								<th class="center">Realizadas</th>
								<th class="center">Aceptadas</th>
								<th class="center">Rechazadas</th>
								<th class="center">Expiradas</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Diego Barillas Valverde</td>
								<td>Estudiante</td>
								<td class="center">10</td>
								<td class="center">10</td>
								<td class="center">0</td>
								<td class="center">0</td>
							</tr>
							<tr>
								<td>Pablo Monestel</td>
								<td>Coordinador Académico</td>
								<td class="center">-</td>
								<td class="center">8</td>
								<td class="center">1</td>
								<td class="center">0</td>
							</tr>
							<tr>
								<td>Antonio Luna</td>
								<td>Profesor</td>
								<td class="center">-</td>
								<td class="center">8</td>
								<td class="center">2</td>
								<td class="center">0</td>
							</tr>
							<tr>
								<td>Miguel Coto</td>
								<td>Estudiante</td>
								<td class="center">5</td>
								<td class="center">5</td>
								<td class="center">0</td>
								<td class="center">0</td>
							</tr>
							<tr>
								<td>Alexander Corrales Solís</td>
								<td>Estudiante</td>
								<td class="center">5</td>
								<td class="center">5</td>
								<td class="center">3</td>
								<td class="center">0</td>
							</tr>
							<tr>
								<td>Andrea Arroyo Cascante</td>
								<td>Asistente de curso</td>
								<td class="center">3</td>
								<td class="center">1</td>
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