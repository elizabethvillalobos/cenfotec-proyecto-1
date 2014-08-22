<?php 
	error_reporting(0);
    
	require_once('../includes/functions.php');
	require_once(ROOT.'/includes/functions-evaluaciones.php');
	
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
				<?php
				mostrarRanking($id);
				?>
            </main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>

		<script src="/cenfotec-proyecto-1/js/common-logic.js"></script>	
        <script src="/cenfotec-proyecto-1/js/evaluacion.js"></script>
	</body>
</html>