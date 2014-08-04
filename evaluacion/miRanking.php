<?php 
	require_once('../includes/functions.php');
	$currentModule = 'evaluacion';
	$currentSubModule = 'miRanking'; 
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo APP_TITLE; ?></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/gic.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/pages/evaluacion.css">
	</head>
	<body>
		<div class="wrapper">
			<?php include(ROOT.'/includes/header.php'); ?>
			<?php include(ROOT.'/includes/aside-evaluacion.php'); ?>
			
			<main>
				<div id="rankDiv">
					
					<div id="user">
							<h1><span>Mi ranking</span></h1>
				    </div>

					<div id ="puntuacion">
						
						<h1><span class="circulo">4.7</span>Puntuación</h1>
					</div>

					<div id="cantidad">
						<span id="">Citas asistidas: 10 de 10</span>
					</div>
					
				</div>

				<table>
					<thead>
						<tr>
							<th>Criterio a evaluar</th>
							<th></th>
							<th class="center"></th>
							<th class="center">Promedio</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Puntualidad</td>
							<td></td>
							<td class="center"></td>
							<td class="center">5</td>
						</tr>
						<tr>
							<td>Cordialidad y respeto</td>
							<td></td>
							<td class="center"></td>
							<td class="center">5</td>
						</tr>
						<tr>
							<td>Colaboración</td>
							<td></td>
							<td class="center"></td>
							<td class="center">5</td>
						</tr>
						<tr>
							<td>Satisfacción</td>
							<td></td>
							<td class="center"></td>
							<td class="center">4</td>
						</tr>
						<tr>
							<td>Promedio obtenido</td>
							<td></td>
							<td class="center"></td>
							<td class="center">4.7</td>
						</tr>
					</tbody>
				</table>
            </main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>

		<script src="/cenfotec-proyecto-1/js/common-logic.js"></script>	
        <script src="/cenfotec-proyecto-1/js/evaluacion.js"></script>
	</body>
</html>