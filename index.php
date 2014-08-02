<?php 
	require_once('includes/functions.php');
	$currentModule = ''; 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Universidad Cenfotec - Gestor Ingeligente de Citas</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="css/gic.css">
		<link rel="stylesheet" href="css/pages/dashboard.css">
	</head>
	<body>
		<div class="wrapper">
			<?php include(ROOT.'/includes/header.php'); ?>

			<main class="dashboard">
				<? include('includes/agenda.php'); ?>

				<? include('includes/mi-ranking.php'); ?>
				
				<? include('includes/mensajes-nuevos.php'); ?>

				<? include('includes/evaluaciones-pendientes.php'); ?>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>
	</body>
</html>