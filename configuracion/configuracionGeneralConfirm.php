<?php
    require_once('../includes/functions.php');
    require_once(ROOT.'/includes/functions-configuracionGeneral.php');

    $currentModule = 'configuracion';
    $currentSubModule = 'general';
?>



<!DOCTYPE html>
<html>
	<head>
		<title><?php echo APP_TITLE; ?></title>
		<meta charset="utf-8">
		<link href="/cenfotec-proyecto-1/css/bootstrap/css/bootstrap.css" rel="stylesheet">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/gic.css">
		<link rel="stylesheet" href="/cenfotec-proyecto-1/css/pages/configuracion.css">
		
	</head>
	<body>
		<div class="wrapper">
			<?php include(ROOT.'/includes/header.php'); ?>
			<?php include(ROOT.'/includes/aside-configuracion.php'); ?>


			<main id="mainCG">
				 <section class="msg-confirm">
                        <div class="mod-hd">
                            <h2 class="flaticon-machine2">¡Configuración realizada con éxito!</h2>
                        </div>
                        <div class="mod-bd">
                            <p>Se han establecido correctamente los parametros.</p>

                            <a href="configuracionGeneral.php" class="btn btn-default">Volver</a>
                        </div>
                    </section>
                 </main>   
				<?php include(ROOT.'/includes/footer.php'); ?>
		</div>
		<!-- Load JS-->
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap-select.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-checkbox.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-radio.js"></script>
        <script src="/cenfotec-proyecto-1/js/gic.js"></script>
        <script src="/cenfotec-proyecto-1/js/configuracion.js"></script>
        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script> 
	</body>
</html>