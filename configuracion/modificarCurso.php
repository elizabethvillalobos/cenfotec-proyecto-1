<?php
    require_once('../includes/functions.php');
    require_once(ROOT.'/includes/functions-cursos.php');

    $currentModule = 'configuracion';
    $currentSubModule = 'cursos';
    $carreraId = $_GET['idCarrera'];
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
			<section class="modificar-curso">
				<?php
                    if(isset($_GET['idCurso'])){
                        $result = getCursoParaModificar($_GET['idCurso']);
                    }
                ?>
				<div class="mod-hd">
					<h2>Modificar un curso - <?php echo $result['cursoNombre'] ?></h2>
				</div>
				<form id="modificar-curso" class="mod-bd form-horizontal" action="" method="post" data-validate="true" novalidate>
					<div class="form-row">
						<label for="codigo-curso">Código:</label>
						<input id="codigo-curso" type="text" value="<?php echo $result['cursoId']?>" class="form-control" 
						onkeypress="return soloGuion(event)" disabled required/>
					</div>

					<div class="form-row">
						<label for="nombre-curso">Nombre:</label>
						<input id="nombre-curso" type="text" value="<?php echo $result['cursoNombre']?>" class="form-control" 
						onkeypress="return soloLetrasYnumeros(event)" required/>
					</div>

					<div class="form-row">
						<label for="txtInvitado1">Profesor(es):</label>
						<input type="hidden" id="profesor-id-1" />
						<input id="txtInvitado1" class="form-control nombreProfe" type="text" value="<?php echo $result['profesor1'] ?>" 
							   placeholder="Seleccione un profesor" onkeyup="buscarProfesor(this.id)" autocomplete="off" required/>
						<div id="resInvitado1"></div>
					</div>
					<div class="form-row">
						<label></label>
						<input type="hidden" id="profesor-id-2" />
						<input id="txtInvitado2" class="form-control nombreProfe" type="text" value="<?php echo $result['profesor2'] ?>" 
							   placeholder="Seleccione un profesor" onkeyup="buscarProfesor(this.id)" autocomplete="off"/>
						<div id="resInvitado2"></div>
					</div>
					<div class="form-row">
						<label></label>
						<input type="hidden" id="profesor-id-3" />
						<input id="txtInvitado3" class="form-control nombreProfe" type="text" value="<?php echo $result['profesor3'] ?>" 
							   placeholder="Seleccione un profesor" onkeyup="buscarProfesor(this.id)" autocomplete="off"/>
						<div id="resInvitado3"></div>
					</div>

					<div class="form-row form-row-button">
						<button id="btn-modificar-curso" class="btn btn-primary" type="submit">Guardar</button>
						<button id="btn-cancelar" class="btn btn-secondary" onclick="location.href='/cenfotec-proyecto-1/configuracion/consultarCursos.php?idCarrera=<?php echo $carreraId; ?>'">Cancelar</button>
					</div>

					<div id="listForm" class="backContent">
						<fieldset class="frmLista">
							<legend id="lblLegent"></legend>
							<ul id="listElements">								
							</ul>
							<button id="btnVolver" class="btn btn-primary">Volver</button>
						</fieldset>
					</div>
				</form>
			</section>
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
	<script src="/cenfotec-proyecto-1/js/configuracion.js"></script>
</body>
</html>