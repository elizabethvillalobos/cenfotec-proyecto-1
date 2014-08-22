<?php
	require_once('../includes/functions.php');
	require_once('../includes/functions-reportes.php');
	$currentModule = 'reportes';
	$currentSubModule = 'solicitudes';
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
					<?php
	                 	if (isset($_GET['usuarioId'])){
	                 		$usuarioId = $_GET['usuarioId'];
	                 		$nombre = getNombre($usuarioId); 
	                 	}else{
	                 		echo "No isset";
	                 	}
            		?>
					<h2 id="titulo"></h2>
					<script type="text/javascript">
						document.getElementById("titulo").innerHTML = "Solicitudes - " + "<?php echo $nombre?>"; 
					</script>
					<table class="tblReporte">
						<thead>
							<tr>
								<th class="center">Asunto</th>
								<th class="center">Usuario</th>
								<th class="center">Fecha-Hora</th>
								<th class="center">Observaciones</th>
								<th class="center">Estado</th>
							</tr>
						</thead>
						<tbody>
							<?php reporteEspecifico($usuarioId); ?>							
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