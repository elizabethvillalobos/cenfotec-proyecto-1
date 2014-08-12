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
					<div id="cursos-container">  </div>
					<script id="template-curso" type="text/x-handlebars-template">
						{{#each cursos}}

						<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle collapsed" href="#collapseTwo" data-parent="#basic-accordion"
							data-toggle="collapse">{{nombre}}</a>
						</div>
						<div id="collapseTwo" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="detalleCarrera" action="#" method="post">
									<div class="colorDetalleCurso">
										<fieldset>
											<div class="form-row">
												<label for="text1">Código:</label>
												<input id="text1" type="text" placeholder="{{idcurso}}" class="form-control1" 
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
				{{/each}}
				</script>

			</main>
			
			<?php include(ROOT.'/includes/footer.php'); ?>
		</div>
		<!-- Load JS -->
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/handlebars-v1.3.0.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/bootstrap.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/bootstrap-select.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-checkbox.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-radio.js"></script>
		<script src="/cenfotec-proyecto-1/js/gic.js"></script>

		<script src="/cenfotec-proyecto-1/js/configuracion.js"></script>
		<script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
		<script >consultarCursos()</script>
	</body>
</html>
