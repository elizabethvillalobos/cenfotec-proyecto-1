<?php
    require_once('../includes/functions.php');
    require_once('../includes/functions-carreras.php');

    $currentModule = 'configuracion';
    $currentSubModule = 'carreras';
?>

<!DOCTYPE html>
<html>
	<head>
		<title><?php echo APP_TITLE; ?></title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/gic.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/pages/configuracion.css">
	</head>
	<body>
		<div class="wrapper">
			<?php include(ROOT.'/includes/header.php'); ?>
			<?php include(ROOT.'/includes/aside-configuracion.php'); ?>

			<main>
				<div id="carreras-hd">
					<h2>Lista de carreras </h2>
					<a  href="/cenfotec-proyecto-1/configuracion/carrerasCrear.php" class="btn btn-default flaticon-add73">Crear carrera</a>
				</div> 
				<div id="buscarCarreras">
					<input id="q" type="text" value="" placeholder="Buscar carreras" />
					<button id="btnBuscarCarreras" class="flaticon-magnifier12" type="submit"></button>
				</div>
			
				<div id="basic-accordion" class="accordion">
					<?=displayCarreras();?>	
				</div>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>
		
		<!-- Load JS -->
        <script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/jquery.html5uploader-1.1.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap-select.js"></script>
        <script src="/cenfotec-proyecto-1/js/gic.js"></script>
        <script src="/cenfotec-proyecto-1/js/html5uploader.js"></script>
        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
        <script src="/cenfotec-proyecto-1/js/configuracion.js"></script>
        <script src="/cenfotec-proyecto-1/js/pruebaConfiguracion.js"></script>
	</body>
</html>