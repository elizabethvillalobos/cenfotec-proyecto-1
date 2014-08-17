<?php
    require_once('../includes/functions.php');
    require_once(ROOT.'/includes/functions-carreras.php');

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
				<section class="perfil-editar">
					<div class="mod-hd">
						<h2>Crear carrera</h2>
					</div>
					<!-- El atributo novalidate es para evitar que el browser 
					haga las validaciones. -->
					<form id="crear-carrera" class="mod-bd form-horizontal" method="post" action="" data-validate="true" novalidate>
						<div class="form-row">
							<label for="codigo-carrera">Código:</label>
							<input id="codigo-carrera" type="text" placeholder="Ingrese el código" class="form-control" 
							onkeypress="return soloGuion(event)" required/>
						</div>
						<div class="form-row">
							<label for="nombre-carrera">Nombre:</label>
							<input id="nombre-carrera" type="text" placeholder="Ingrese el nombre" class="form-control" 
								   onkeypress="return soloLetras(event)" required/>
						</div>

						<div class="form-row">
							<label for="director-academico">Director académico:</label>
							<select id="director-academico" name="" required>
	                            <option value="">Seleccione una opción</option>
	                            <?php
						        mostrarDirectores();
						        ?>	                            
                            </select>
						</div>

						<div class="form-row form-row-button">
							<button type="submit" id="btn-guardar-carrera" class="btn btn-primary">Enviar</button>
							<!--<button id="btn-cancelar" class="btn btn-secondary" type="submit">Cancelar</button>-->
							<a href="crearCarrera-cancelar.html" class="btn btn-default js-modal" 
								data-modal-id="modal-cancelar">Cancelar</a>
						</div>
					</form>
				</section>
				<div id="modal-cancelar" class="modal js-modal-window">
					<span class="close flaticon-close3 js-modal-close">Close</span>
					<h3>¿Está seguro que desea cancelar la creación de la carrera?</h3>
					<div class="form-row">
						<a href="consultarCarreras.html" class="btn btn-primary js-modal-aceptar">Si</a>
						<a href="#" class="btn btn-default js-modal-close">No</a>
					</div>
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
        <script src="/cenfotec-proyecto-1/js/flatui.js"></script>
        <script src="/cenfotec-proyecto-1/js/html5uploader.js"></script>
        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
        <!--<script src="/cenfotec-proyecto-1/configuracion/inserts-config-js/insertarCarrera.js"></script>-->
        <script src="/cenfotec-proyecto-1/js/configuracion.js"></script>
	</body>
</html>