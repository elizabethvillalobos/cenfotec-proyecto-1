<?php
    require_once('../includes/functions.php');
    $currentModule = '';
    $currentSubModule = 'perfil';
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
			<?php include(ROOT.'/includes/aside-miCuenta.php'); ?>

			<main>
				<section class="perfil-modificar">
					<div class="mod-hd">
						<h2>Modificar perfil</h2>
					</div>
					<!-- El atributo novalidate es para evitar que el browser 
					haga las validaciones. -->
					<form id="editar-modificar" class="mod-bd form-horizontal" action="/cenfotec-proyecto-1/configuracion/perfilGuardado.php" method="post" data-validate="true" novalidate>
						<div class="form-row">
							<label for="perfil-nombre">Nombre:</label>
							<input id="perfil-nombre" type="text" placeholder="Ingrese el nombre" class="form-control" value="Álvaro" required/>
						</div>

						<div class="form-row">
							<label for="perfil-apellido-1">Primer apellido:</label>
							<input id="perfil-apellido-1" type="text" placeholder="Ingrese el primer apellido" class="form-control" value="Cordero" required/>
						</div>

						<div class="form-row">
							<label for="perfil-apellido-2">Segundo apellido:</label>
							<input id="perfil-apellido-2" type="text" placeholder="Ingrese el segundo apellido" class="form-control" value="Peña" required/>
						</div>

						<div class="form-row">
							<label for="perfil-avatar">Avatar:</label>
							<!-- Drop media element -->
                			<div class="media-drop">
			                    <div id="droppedimage">
			                    	<img src="../images/users/default-user.png">
			                    </div>
			                    <div id="dropbox" class="media-drop-placeholder" style="width: 200px; height: 200px;">
			                        <span class="media-drop-placeholder-title">Arrastrar imagen aquí</span>
			                        <span class="media-drop-placeholder-or">o</span>

			                        <div class="media-drop-placeholder-uploadbutton">
			                            <input id="realUploadBtn" name="media-drop-placeholder-file" type="file" accept="image/*" tabindex="-1"/>
			                            <button id="uploadBtn" type="button" class="btn" tabindex="-1">Buscar archivo&hellip;</button>
			                        </div>
			                    </div>
			                    <!-- Error message placeholder. -->
	                			<p class="help-block error errormessages"></p>

	                			<button id="resetupload" type="button" class="btn btn-default">Subir nueva imagen</button>
	                		</div>
						</div>

						<div class="form-row">
							<label for="perfil-email">Correo electrónico:</label>
							<input id="perfil-email" type="email" placeholder="Ingrese el correo electrónico" class="form-control" data-validate-type="email" value="acordero@ucenfotec.ac.cr" required/>
						</div>

						<div class="form-row">
							<label for="perfil-telefono">Teléfono:</label>
							<input id="perfil-telefono" type="text" placeholder="Ingrese el número telefónico" class="form-control" value="8800-0101" data-validate-type="phone" />
						</div>

						<div class="form-row">
							<label for="perfil-skype">Skype id:</label>
							<input id="perfil-skype" type="text" placeholder="Ingrese la cuenta de Skype" class="form-control" value="al_corpe" />
						</div>

						<div class="form-row">
							<label for="perfil-rol">Rol:</label>
							<span class="data">Profesor</span>
						</div>

						<!-- <div class="form-row">
							<label for="perfil-carrera">Carrera:</label>
							<span class="data">Desarrollo de Software</span>
						</div>

						<div class="form-row">
							<label for="perfil-cursos">Cursos:</label>
							<span class="data">Proyecto de ingeniería del software 1</span>
						</div>

						<div class="form-row">
							<label for="perfil-horario">Horario:</label>
							<span class="data">Lunes, Martes y Jueves de 4:00 p.m. a 6:00 p.m.</span>
						</div> -->

						<div class="form-row form-row-button">
							<button id="btn-guardar-perfil" class="btn btn-primary" type="submit">Guardar</button>
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