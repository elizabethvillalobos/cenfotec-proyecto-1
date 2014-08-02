<? $currentModule = 'mensajeria'; ?>

<!DOCTYPE html>
<html>
	<head>
		<title>Universidad Cenfotec - Gestor Ingeligente de Citas</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../css/gic.css">
	</head>
	<body>
		<div class="wrapper">
			<? include('../includes/header.php'); ?>

			<aside>
				<nav class="secondary-nav">
					<ul class="sec-nav-category">
						<li class="accordion-item">
							<a href="#" class="active">Nueva Conversación</a>
						</li>
						<li class="accordion-item">
							<a href="/cenfotec-proyecto-1/mensajeria/mensajeria.php">Conversaciones</a>
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
					<h2>Nueva Conversación</h2>
				</div>
				<div class="mod-bd">
					
				</div>
			</main>
			
			<? include('../includes/footer.php'); ?>
		</div>
		<script src="../js/common-logic.js"></script>
	</body>
</html>