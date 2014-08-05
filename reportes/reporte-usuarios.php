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
							<a href="reporte-solicitudes.php">Solicitudes</a>
						</li>
						<li class="accordion-item">
							<a href="reporte-agendas.php">Agendas</a>
						</li>
						<li class="accordion-item">
							<a href="reporte-usuarios.php" class="active">Usuarios registrados</a>
						</li>
					</ul>
				</nav>
			</aside>

			<main>
				<div class="mod-hd">
					<h2>Reporte de usuarios</h2>
					<table class="reporte">
						<thead>
							<tr>
								<th class="center">Usuario</th>
								<th class="center">Rol</th>
								<th class="center">Carrera</th>
								<th class="center">Correo electrónico</th>
								<th class="center">Total de citas</th>
								<th class="center">Estado</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Alexander Corrales Solís</td>
								<td>Estudiante</td>
								<td>Ingeniería del Software</td>
								<td>acorraless@ucenfotec.ac.cr</td>
								<td class="center">10</td>
								<td>Inactivo</td>
							</tr>
							<tr>
								<td>Andrea Arroyo Cascante</td>
								<td>Asistente de curso</td>
								<td>Ingeniería del Software</td>
								<td>aarroyoc@ucenfotec.ac.cr</td>
								<td class="center">1</td>
								<td>Inactivo</td>
							</tr>
							<tr>
								<td>Antonio Luna</td>
								<td>Profesor</td>
								<td>Ingeniería del Software</td>
								<td>aluna@ucenfotec.ac.cr</td>
								<td class="center">6</td>
								<td>Activo</td>
							</tr>
							<tr>
								<td>Diego Barillas Valverde</td>
								<td>Estudiante</td>
								<td>Ingeniería del Software</td>
								<td>dbarillasv@ucenfotec.ac.cr</td>
								<td class="center">10</td>
								<td>Activo</td>
							</tr>
							<tr>
								<td>Miguel Coto</td>
								<td>Estudiante</td>
								<td>Ingeniería del Software</td>
								<td>mcoto@ucenfotec.ac.cr</td>
								<td class="center">5</td>
								<td>Activo</td>
							</tr>
							<tr>
								<td>Pablo Monestel</td>
								<td>Coordinador Académico</td>
								<td>Desarrollo Web</td>
								<td>pmonestel@ucenfotec.ac.cr</td>
								<td class="center">8</td>
								<td>Activo</td>
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