<?php
    require_once('../includes/functions.php');

    $currentModule = 'configuracion';
    $currentSubModule = 'cursos';
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


			<main>
				<div id="carreras-hd">
					<h2 >Desarrollo de Software - Cursos </h2>
					<a href="registrarCurso.html" class="btn btn-default flaticon-add73">Crear curso</a
				</div> 
				<div id="buscarCarreras">
					<input id="q" type="text" value="" placeholder="Buscar cursos" />
					<button id="btnBuscarCarreras" class="flaticon-magnifier12" type="submit"></button>
				</div>
				

				<div id="basic-accordion" class="accordion">
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle collapsed" href="#collapseOne" data-parent="#basic-accordion"
						data-toggle="collapse">Fundamentos de programación</a>
					</div>
						<div id="collapseOne" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="detalleCarrera" action="#" method="post">
									<div class="colorDetalleCurso">
										<fieldset>
											
											<div class="form-row">
												<label for="text1">Código:</label>
												<input id="text1" type="text" placeholder="INF-02" 
												class="form-control1" readonly="readonly"/>
											</div>
											<div class="form-row">
												<label for="text2">Profesor(es):</label>
												<input id="text2" type="text" placeholder="Antonio Luna" 
												class="form-control1" readonly="readonly"/>
											</div>
											<div class="form-row">
												
											</div>
											<div class="form-row form-row-buttonAccionesCurso">
												<input type="button" id="btnHabilitarCurso" class="btn btn-secondaryAction botonActivado" value="Habilitar" >
												<input type="button" id="btnDeshabilitarCurso" class="btn btn-secondaryAction botonDesactivado" value="Deshabilitar" >
												<input type="button" class="btn btn-secondaryAction" id="btnModificar1" value="Modificar" onclick=" location.href='modificarCursoFundamentos.html' ">
											</div>
										</fieldset>
									</div>
								</form>
							</div>	
						</div>
					</div>
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle collapsed" href="#collapseTwo" data-parent="#basic-accordion"
							data-toggle="collapse">Proyecto de ingeniería del software 1</a>
						</div>
						<div id="collapseTwo" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="detalleCarrera" action="#" method="post">
									<div class="colorDetalleCurso">
										<fieldset>
											<div class="form-row">
												<label for="text1">Código:</label>
												<input id="text1" type="text" placeholder="BISOFT-04" class="form-control1" 
												readonly="readonly"/>
											</div>
											<div class="form-row">
												<label for="textoProfe1Curso">Profesor(es)</label>
												<input id="textoProfe1Curso" type="text" placeholder="Pablo Monestel" 
												class="form-control1" readonly="readonly"/>
											</div>
											<div class="form-row">
												<input id="textoProfe2Curso" type="text" placeholder="Alvaro Cordero" 
												class="form-control1" readonly="readonly"/>
												
											</div>
											
											<div class="form-row form-row-buttonAcciones2profes">
												<input type="button" class="btn btn-secondaryAction" id="btnHabilitarCurso2" value="Habilitar" disabled>
												<input type="button" class="btn btn-secondaryAction" id="btnDeshabilitarCurso2" value="Deshabilitar" >
												<input type="button" class="btn btn-secondaryAction" id="btnModificar2" value="Modificar">
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
							data-toggle="collapse">Fundamentos de bases de datos</a>
						</div>
						<div id="collapseThree" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="detalleCarrera" action="#" method="post">
									<div class="colorDetalleCurso">
										<fieldset>
											<div class="form-row">
												<label for="text1">Código:</label>
												<input id="text1" type="text" placeholder="INF-03" class="form-control1" 
												readonly="readonly"/>
											</div>
											<div class="form-row">
												<label for="text2">Profesor(es):</label>
												<input id="text2" type="text" placeholder="Joel Martinez" 
												class="form-control1" readonly="readonly"/>
											</div>
											<div class="form-row">
												
											</div>
											<div class="form-row form-row-buttonAccionesCurso">
												<input type="button" class="btn btn-secondaryAction botonActivado" id="btnHabilitarCurso3"  value="Habilitar" >
												<input type="button" class="btn btn-secondaryAction botonDesactivado" id="btnDeshabilitarCurso3" value="Deshabilitar" >
												<input type="button" class="btn btn-secondaryAction" id="btnModificar3" value="Modificar">
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
							data-toggle="collapse">Estructuras de datos</a>
						</div>
						<div id="collapseFour" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="detalleCarrera" action="#" method="post">
									<div class="colorDetalleCurso">
										<fieldset>
											<div class="form-row">
												<label for="text1">Código:</label>
												<input id="text1" type="text" placeholder="BISOFT-11" class="form-control1" 
												readonly="readonly"/>
											</div>
											<div class="form-row">
												<label for="text2">Profesor(es):</label>
												<input id="text2" type="text" placeholder="Ana Mendez" class="form-control1" readonly="readonly"/>
											</div>
											<div class="form-row form-row-buttonAccionesCurso">
												<input type="button" class="btn btn-secondaryAction js-modal" id="btnHabilitarCurso4" data-modal-id="modal-habilitar4" value="Habilitar" disabled>
												<input type="button" class="btn btn-secondaryAction" id="btnDeshabilitarCurso4" value="Deshabilitar" >
												<input type="button" class="btn btn-secondaryAction" id="btnModificar4" value="Modificar">
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
							data-toggle="collapse">Arquitectura de computadoras</a>
						</div>
						<div id="collapseFive" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="detalleCarrera" action="#" method="post">
									<div class="colorDetalleCurso">
										<fieldset>
											<div class="form-row">
												<label for="text1">Código:</label>
												<input id="text1" type="text" placeholder="INF-04" class="form-control1" 
												readonly="readonly"/>
											</div>
											<div class="form-row">
												<label for="text2">Profesor(es):</label>
												<input id="text2" type="text" placeholder="Minor Tenorio" 
												class="form-control1" readonly="readonly"/>
											</div>
											<div class="form-row">
												
											</div>
											<div class="form-row form-row-buttonAccionesCurso">
												<input type="button" class="btn btn-secondaryAction" id="btnHabilitarCurso5"
												value="Habilitar"disabled>
												<input type="button" class="btn btn-secondaryAction" id="btnDeshabilitarCurso5"
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
							<a class="accordion-toggle collapsed" href="#collapseSix" data-parent="#basic-accordion"
							data-toggle="collapse">Estructura de datos 2</a>
						</div>
						<div id="collapseSix" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="detalleCarrera" action="#" method="post">
									<div class="colorDetalleCurso">
										<fieldset>
											<div class="form-row">
												<label for="text1">Código:</label>
												<input id="text1" type="text" placeholder="BISOFT-20" class="form-control1" 
												readonly="readonly"/>
											</div>
											<div class="form-row">
												<label for="text2">Profesor(es):</label>
												<input id="text2" type="text" placeholder="Norma Neil" 
												class="form-control1" readonly="readonly"/>
											</div>
											<div class="form-row">
												
											</div>
											<div class="form-row form-row-buttonAccionesCurso">
												<input type="button" class="btn btn-secondaryAction" id="btnHabilitarCurso6"
												value="Habilitar" disabled>
												<input type="button" class="btn btn-secondaryAction" id="btnDeshabilitarCurso6"
												value="Deshabilitar">
												<input type="button" class="btn btn-secondaryAction" id="btnModificar3" value="Modificar"  >
											</div>
										</fieldset>
									</div>
								</form>
							</div>	
						</div>
					</div>
					
					<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle collapsed" href="#collapseSeven" data-parent="#basic-accordion"
							data-toggle="collapse">Proyecto de ingeniería del software 2</a>
						</div>
						<div id="collapseSeven" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="detalleCarrera" action="#" method="post">
									<div class="colorDetalleCurso">
										<fieldset>
											<div class="form-row">
												<label for="text1">Código:</label>
												<input id="text1" type="text" placeholder="BISOFT-13" class="form-control1" 
												readonly="readonly"/>
											</div>
											<div class="form-row">
												<label for="text2">Director académico:</label>
												<input id="text2" type="text" placeholder="Luis Aguilar" 
												class="form-control1" readonly="readonly"/>
											</div>
												<div class="form-row form-row-buttonAccionesCurso" action="modificarCurso.html">
												<input type="button" class="btn btn-secondaryAction js-modal" id="btnHabilitarCurso7" value="Habilitar" data-modal-id="modal-habilitar " disabled>
												<input type="button" class="btn btn-secondaryAction js-modal" id="btnDeshabilitarCurso7" value="Deshabilitar" data-modal-id="modal-habilitar1">
												<input type="button" class="btn btn-secondaryAction" id="btnModificar3" 
												value="Modificar">
											</div>
													
										</fieldset>
									</div>
								</form>
							</div>	
						</div>
					</div>
			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>
		<!-- Load JS -->
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/bootstrap.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/bootstrap-select.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-checkbox.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-radio.js"></script>
		<script src="/cenfotec-proyecto-1/js/gic.js"></script>
		<script src="/cenfotec-proyecto-1/js/pruebaConfiguracion2.js"></script>
		<script src="/cenfotec-proyecto-1/js/configuracion.js"></script>
		<script src="/cenfotec-proyecto-1/js/common-logic.js"></script>

	</body>
</html>
