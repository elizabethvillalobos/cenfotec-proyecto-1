<?php
    require_once('../includes/functions.php'); 

    $currentModule = 'configuracion';
    $currentSubModule = 'cursos';
    $carrera = $_GET['idCarrera'];
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
					 <h2> Lista de cursos</h2>
		
					<div id="buscarCursos">
						<input id="criterioCurso" class="campo-busqueda" type="text" value="" placeholder="Buscar cursos" />
						<button id="btnBuscarCursos" class="flaticon-magnifier12" type="submit"></button>
					</div>	

					<a href="/cenfotec-proyecto-1/configuracion/registrarCurso.php?idCarrera=<?php echo $carrera; ?>" id="crear-curso" class="btn btn-default flaticon-add73">Crear curso</a>
				<div class="mod-bd" > 
				<div id="basic-accordion" class="accordion">
					<div id="cursos-container">  </div>
					<script id="template-curso" type="text/x-handlebars-template">
						{{#each cursos}}

						<div class="accordion-group">
						<div class="accordion-heading">
							<a class="accordion-toggle collapsed" href="#{{idcurso}}" data-parent="#basic-accordion"
							data-toggle="collapse">{{nombre}} </a>
						</div>
						<div id="{{idcurso}}" class="accordion-body collapse">
							<div class="accordion-inner">
								<form class="detalleCarrera" action="#" method="post">
									<div class="colorDetalleCurso">
										<fieldset>
											<div class="form-row">
												<label for="text1">Código:</label>
												<input id="text1" type="text" placeholder="{{idcurso}}" class="form-control1" 
												readonly="readonly"/>
												
											</div>
											<label for="textoProfe1Curso">Profesor(es)</label>
											<div id="wrapperProfesCursos">

												{{#each profesores}}
												<div class="form-row">
													<input id="textoProfe1Curso" type="text" placeholder="{{ profesorNombre }}" 
													class="form-control1" readonly="readonly"/>
												</div>
												{{/each}}
											
											</div>
											<div class="form-row form-row-buttonAcciones2profes" id="{{idcurso}}">
												<input type="button" class="btn btn-secondaryAction" id="btnHabilitarCurso" value="Habilitar" {{ activo }}>
												<input type="button" class="btn btn-secondaryAction" id="btnDeshabilitarCurso" value="Deshabilitar" {{ inactivo }}>
												<input type="button" class="btn btn-secondaryAction" onclick="location.href='/cenfotec-proyecto-1/configuracion/modificarCurso.php?idCurso={{idcurso}}&amp;idCarrera=<?php echo $carrera; ?>'" id="btnModificarCurso" value="Modificar">
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
		<script src="/cenfotec-proyecto-1/js/actualizarEstadoCurso.js"></script>
		<script src="/cenfotec-proyecto-1/js/configuracion.js"></script>
		<script src="/cenfotec-proyecto-1/js/common-logic.js"></script>

		<script>consultarCursos(); </script>
<!--		<script>buscarCursos(); </script>-->
	</body>
</html>
