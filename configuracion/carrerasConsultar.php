<?php
    require_once('../includes/functions.php');

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
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle collapsed" href="#collapseTwo" data-parent="#basic-accordion"
							data-toggle="collapse">Desarrollo de software</a>
						</div>
						<div id="collapseTwo" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="detalleCarrera" action="#" method="post">
									<div class="colorDetalleCarrera">
									<fieldset>
										<div class="form-row">
											<label for="text1">Código:</label>
											<input id="text1" type="text" placeholder="DSOF-002" class="form-control1" 
												readonly="readonly"/>
										</div>
										<div class="form-row">
											<label for="text2">Director académico:</label>
											<input id="text2" type="text" placeholder="María Eugenia Ucrós" 
												class="form-control1" readonly="readonly"/>
										</div>
										<div class="form-row">
											<a href="consultarCursosDesarrollo.html" class="flaticon-list40">Ver cursos</a>
										</div>
										<div class="form-row form-row-buttonAcciones">
											<input type="button" class="btn btn-secondaryAction" id="btnHabilitar2"
												value="Habilitar">
											<input type="button" class="btn btn-secondaryAction" id="btnDeshabilitar2"
												value="Deshabilitar">
											<input type="button" class="btn btn-secondaryAction" id="btnModificar2" 
												value="Modificar" >
										</div>
									</fieldset>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle collapsed" href="#collapseOne" data-parent="#basic-accordion"
							data-toggle="collapse">Desarrollo y diseño web</a>
						</div>
						<div id="collapseOne" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="detalleCarrera" action="#" method="post">
									<div class="colorDetalleCarrera">
									<fieldset>
										<div class="form-row">
											<label for="text1">Código:</label>
											<input id="text1" type="text" placeholder="DWEB-001" class="form-control1" 
												readonly="readonly"/>
										</div>
										<div class="form-row">
											<label for="text2">Director académico:</label>
											<input id="text2" type="text" placeholder="Pablo Monestel" 
												class="form-control1" readonly="readonly"/>
										</div>
										<div class="form-row">
											<a href="consultarCursosDiseñoWeb.html" class="flaticon-list40">Ver cursos</a>
										</div>
										<div class="form-row form-row-buttonAcciones">
											<input type="button" class="btn btn-secondaryAction" id="btnHabilitar"
												value="Habilitar">
											<input type="button" class="btn btn-secondaryAction" id="btnDeshabilitar"
												value="Deshabilitar">
											<input type="button" class="btn btn-secondaryAction" id="btnModificar" 
												value="Modificar">
										</div>
									</fieldset>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle collapsed" href="#collapseThree" data-parent="#basic-accordion"
							data-toggle="collapse">Integración de tecnologías</a>
						</div>
						<div id="collapseThree" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="detalleCarrera" action="#" method="post">
									<div class="colorDetalleCarrera">
									<fieldset>
										<div class="form-row">
											<label for="text1">Código:</label>
											<input id="text1" type="text" placeholder="ITEC-003" class="form-control1" 
												readonly="readonly"/>
										</div>
										<div class="form-row">
											<label for="text2">Director académico:</label>
											<input id="text2" type="text" placeholder="Luis Chacón" 
												class="form-control1" readonly="readonly"/>
										</div>
										<div class="form-row">
											<a href="consultarCursosDesarrollo.html" class="flaticon-list40">Ver cursos</a>
										</div>
										<div class="form-row form-row-buttonAcciones">
											<input type="button" class="btn btn-secondaryAction" id="btnHabilitar3"
												value="Habilitar">
											<input type="button" class="btn btn-secondaryAction" id="btnDeshabilitar3"
												value="Deshabilitar">
											<input type="button" class="btn btn-secondaryAction" id="btnModificar3" 
												value="Modificar">
										</div>
									</fieldset>
									</div>
								</form>
							</div>
						</div>
					</div>

					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle collapsed" href="#collapseFour" data-parent="#basic-accordion"
							data-toggle="collapse">Telemática</a>
						</div>
						<div id="collapseFour" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="detalleCarrera" action="#" method="post">
									<div class="colorDetalleCarrera">
									<fieldset>
										<div class="form-row">
											<label for="text1">Código:</label>
											<input id="text1" type="text" placeholder="TMAT-004" class="form-control1" 
												readonly="readonly"/>
										</div>
										<div class="form-row">
											<label for="text2">Director académico:</label>
											<input id="text2" type="text" placeholder="Nelson Brenes" 
												class="form-control1" readonly="readonly"/>
										</div>
										<div class="form-row">
											<a href="consultarCursosDesarrollo.html" class="flaticon-list40">Ver cursos</a>
										</div>
										<div class="form-row form-row-buttonAcciones">
											<input type="button" class="btn btn-secondaryAction" id="btnHabilitar4"
												value="Habilitar">
											<input type="button" class="btn btn-secondaryAction" id="btnDeshabilitar4"
												value="Deshabilitar">
											<input type="button" class="btn btn-secondaryAction" id="btnModificar4" 
												value="Modificar">
										</div>
									</fieldset>
									</div>
								</form>
							</div>
						</div>
					</div>

					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle collapsed" href="#collapseFive" data-parent="#basic-accordion"
							data-toggle="collapse">Inglés</a>
						</div>
						<div id="collapseFive" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="detalleCarrera" action="#" method="post">
									<div class="colorDetalleCarrera">
									<fieldset>
										<div class="form-row">
											<label for="text1">Código:</label>
											<input id="text1" type="text" placeholder="CSEG-005" class="form-control1" 
												readonly="readonly"/>
										</div>
										<div class="form-row">
											<label for="text2">Director académico:</label>
											<input id="text2" type="text" placeholder="Andrea Espinach" 
												class="form-control1" readonly="readonly"/>
										</div>
										<div class="form-row">
											<a href="consultarCursosDesarrollo.html" class="flaticon-list40">Ver cursos</a>
										</div>
										<div class="form-row form-row-buttonAcciones">
											<input type="button" class="btn btn-secondaryAction" id="btnHabilitar5"
												value="Habilitar">
											<input type="button" class="btn btn-secondaryAction" id="btnDeshabilitar5"
												value="Deshabilitar">
											<input type="button" class="btn btn-secondaryAction" id="btnModificar5" 
												value="Modificar">
										</div>
									</fieldset>
									</div>
								</form>
							</div>
						</div>
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
        <script src="/cenfotec-proyecto-1/js/gic.js"></script>
        <script src="/cenfotec-proyecto-1/js/html5uploader.js"></script>
        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
        <script src="/cenfotec-proyecto-1/js/configuracion.js"></script>
        <script src="/cenfotec-proyecto-1/js/pruebaConfiguracion.js"></script>
	</body>
</html>