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
					<h2>Reportes</h2>
				</div>
				<div class="mod-bd">
					
				</div>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>

        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
	</body>
</html>