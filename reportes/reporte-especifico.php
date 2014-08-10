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
							<a href="reportes.php" class="active">Ranking</a>
						</li>
						<li class="accordion-item">
							<a href="reporte-solicitudes.php">Solicitudes</a>
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
					<h2>Solicitudes - Diego Barillas Valverde</h2>
					<table class="tblReporte">
						<thead>
							<tr>
								<th class="center">Asunto</th>
								<th class="center">Usuario</th>
								<th class="center">Fecha</th>
								<th class="center">Hora</th>
								<th class="center">Observaciones</th>
								<th class="center">Estado</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Teoría de bases de datos</td>
								<td>Antonio Luna</td>
								<td class="center">04/08/14</td>
								<td class="center">2:00pm - 3:00pm</td>
								<td class="center">Profe, no me quedó clara la materia!</td>
								<td class="center">Pendiente</td>
							</tr>
							<tr>
								<td>Desarrollo de página web</td>
								<td>Pablo Monestel</td>
								<td class="center">02/08/14</td>
								<td class="center">4:00pm - 4:30pm</td>
								<td class="center">-</td>
								<td class="center">Aceptada</td>
							</tr>
							<tr>
								<td>ERS</td>
								<td>Álvaro Cordero</td>
								<td class="center">01/08/14</td>
								<td class="center">2:00pm - 2:45pm</td>
								<td class="center">Es sobre lo que le pregunte por skype ayer</td>
								<td class="center">Expirada</td>
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
	</body>
</html>