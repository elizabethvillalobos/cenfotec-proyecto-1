<?php
	require_once('../includes/functions.php');
	$currentModule = 'evaluacion';
	$currentSubModule = 'evaluacionesPendientes'; 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Universidad Cenfotec - Gestor Ingeligente de Citas</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../css/gic.css">
		<link rel="stylesheet" href="../css/pages/evaluacion.css">
	</head>
	<body>
		<div class="wrapper">
			<?php include(ROOT.'/includes/header.php'); ?>
			<?php include(ROOT.'/includes/aside-evaluacion.php'); ?>

			<main>
				<section class="msg-confirm">
                        <div class="mod-hd">
                            <h2 class="flaticon-verification5">¡La evaluación se completó exitosamente!</h2>
                        </div>
                        <div class="mod-bd">
                            <p>Se ha guardado exitosamente la información.</p>

                            <a href="/cenfotec-proyecto-1/evaluacion/evaluarCita.php" class="btn btn-default">Volver</a>
                        </div>
                    </section>
            </main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>
	</body>
</html>