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
						<h2>Modificar Carrera</h2>
					</div>
					
					<form id="modificar-carrera" class="mod-bd form-horizontal" method="post" action="" 
						  data-validate="true" novalidate>
						
						<?php
	                 		if (isset($_GET['idCarrera'])){
	                 			$id = $_GET['idCarrera']; 
								$result = getSpecificCarrera($id);
	                 		}
            			?>

						<div class="form-row">
							<label for="codigo-carrera">Código:</label>
							<input id="codigo-carrera" type="text" value="<?php echo utf8_encode($result['carreraId'])?>" 
								   disabled="disabled" class="form-control">
						</div>

						<div class="form-row">
							<label for="nombre-carrera">Nombre:</label>
							<input id="nombre-carrera" type="text" placeholder="Ingrese el nombre de la carrera" 
								   value="<?php echo utf8_encode($result['carreraNombre'])?>" class="form-control" 
								   onkeypress="return soloLetras(event)" required/>
						</div>

						<div class="form-row">
							<label for="director-academico">Director académico:</label>
							<select id="director-academico" required>
	                     		<?php echo '<option value= '.$result['idusuario'].' > 
									'.utf8_encode($result['directorNombre']).' '.utf8_encode($result['directorApellido1']).' </option>'; ?>	
								<?php mostrarDirectores();; ?>
                            </select>
						</div>

						<div class="form-row form-row-button">
							<button id="btn-guardar-modificacion" class="btn btn-primary" type="submit">Guardar</button>
							<a href="modificarCarrera-cancelar.html" class="btn btn-default js-modal" 
								data-modal-id="modal-cancelar">Cancelar</a>
						</div>
					</form>
				</section>
				<div id="modal-cancelar" class="modal js-modal-window">
					<span class="close flaticon-close3 js-modal-close">Close</span>
					<h3>¿Está seguro que desea cancelar la modificación de la carrera?</h3>
					<div class="form-row">
						<a href="consultarCarrerasCarreraAgregada.html" class="btn btn-primary js-modal-aceptar">Si</a>
						<a href="#" class="btn btn-default js-modal-close">No</a>
					</div>
				</div>
			</main>
			
			<footer>
				<p>2014 Universidad Cenfotec. Todos los derechos reservados.</p>
			</footer>
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
        <script src="/cenfotec-proyecto-1/js/configuracion.js"></script>
	</body>
</html>