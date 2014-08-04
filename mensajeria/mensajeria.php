<?php
	require_once('../includes/functions.php');
	$currentModule = 'mensajeria'; 
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
							<a href="/cenfotec-proyecto-1/mensajeria/nuevaConversacion.php">Nueva Conversación</a>
						</li>
						<li class="accordion-item expanded">
							<a href="#" class="active">Conversaciones</a>
							<ul class="thrd-nav-category accordion-detail">
								<li><a href="#">Alex Mendez</a></li>
								<li><a href="#">Antonio Luna</a></li>
								<li><a href="#">Pablo Monestel</a></li>	
								<li><a href="#">Vicky Gomez</a></li>	
								<li><a href="#">Pedro Montero</a></li>	
							</ul>
						</li>
						
					</ul>
				</nav>
			</aside>

			<main>
				<div class="mod-hd">
					<h2>Conversaciones</h2>
				</div>
				<div class="mod-bd">
					
				</div>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>

        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
	</body>
</html>