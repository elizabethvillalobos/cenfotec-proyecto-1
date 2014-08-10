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
							<a href="#">Ranking</a>
						</li>
						<li class="accordion-item">
							<a href="#">Solicitudes</a>
						</li>
						<li class="accordion-item">
							<a href="#">Citas</a>
						</li>
						<li class="accordion-item">
							<a href="#">Agendas</a>
						</li>
						<li class="accordion-item">
							<a href="#">Usuarios registrados</a>
						</li>
					</ul>
				</nav>
			</aside>

			<main>
				<div class="mod-hd">
<<<<<<< HEAD
					<h2>Reporte de ranking</h2>
					<table class="tblReporte">
						<thead>
							<tr>
								<th class="center">Posición</th>
								<th class="center">Usuario</th>
								<th class="center">Rol</th>
								<th class="center">Total de Citas</th>
								<th class="center">Puntuación Total</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="center">1</td>
								<td>Diego Barillas Valverde</td>
								<td>Estudiante</td>
								<td class="center">10</td>
								<td class="center">10</td>
							</tr>
							<tr>
								<td class="center">2</td>
								<td>Pablo Monestel</td>
								<td>Coordinador Académico</td>
								<td class="center">5</td>
								<td class="center">10</td>
							</tr>
							<tr>
								<td class="center">3</td>
								<td>Antonio Luna</td>
								<td>Profesor</td>
								<td class="center">10</td>
								<td class="center">9</td>
							</tr>
							<tr>
								<td class="center">4</td>
								<td>Miguel Coto</td>
								<td>Estudiante</td>
								<td class="center">2</td>
								<td class="center">8</td>
							</tr>
							<tr>
								<td class="center">5</td>
								<td>Alexander Corrales Solís</td>
								<td>Estudiante</td>
								<td class="center">1</td>
								<td class="center">8</td>
							</tr>
							<tr>
								<td class="center">6</td>
								<td>Andrea Arroyo Cascante</td>
								<td>Asistente de curso</td>
								<td class="center">5</td>
								<td class="center">5</td>
							</tr>
							
						</tbody>
					</table>
=======
					<h2>Reportes</h2>
>>>>>>> 79520edb557ec8a7a48f6c01747c93061a20b7b1
				</div>
				<div class="mod-bd">
					
				</div>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>

        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
	</body>
</html>