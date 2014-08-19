<?php
	require_once('../includes/functions.php');
	$currentModule = 'reportes';
	$currentSubModule = 'usuariosRegistrados';
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
					<h2>Reporte de usuarios</h2>
					<table class="reporte">
						<thead>
							<tr>
								<th class="center">Usuario</th>
								<th class="center">Rol</th>
								<th class="center">Carrera</th>
								<th class="center">Correo electrónico</th>
								<th class="center">Estado</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>Alexander Corrales Solís</td>
								<td>Estudiante</td>
								<td>Ingeniería del Software</td>
								<td>acorraless@ucenfotec.ac.cr</td>
								<td>Inactivo</td>
							</tr>
							<tr>
								<td>Andrea Arroyo Cascante</td>
								<td>Asistente de curso</td>
								<td>Ingeniería del Software</td>
								<td>aarroyoc@ucenfotec.ac.cr</td>
								<td>Inactivo</td>
							</tr>
							<tr>
								<td>Antonio Luna</td>
								<td>Profesor</td>
								<td>Ingeniería del Software</td>
								<td>aluna@ucenfotec.ac.cr</td>
								<td>Activo</td>
							</tr>
							<tr>
								<td>Diego Barillas Valverde</td>
								<td>Estudiante</td>
								<td>Ingeniería del Software</td>
								<td>dbarillasv@ucenfotec.ac.cr</td>
								<td>Activo</td>
							</tr>
							<tr>
								<td>Miguel Coto</td>
								<td>Estudiante</td>
								<td>Ingeniería del Software</td>
								<td>mcoto@ucenfotec.ac.cr</td>
								<td>Activo</td>
							</tr>
							<tr>
								<td>Pablo Monestel</td>
								<td>Coordinador Académico</td>
								<td>Desarrollo Web</td>
								<td>pmonestel@ucenfotec.ac.cr</td>
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