<?php
    require_once('../includes/functions.php');
    require_once(ROOT.'/includes/functions-usuarios.php');

    $currentModule = 'configuracion';
    $currentSubModule = 'usuarios';
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

			<main class="usuario-modificar">
				<section>
					<div class="mod-hd">
						<h2>Modificar usuario</h2>
					</div>
					<!-- El atributo novalidate es para evitar que el browser 
					haga las validaciones. -->
					<form id="modificar-usuario" class="mod-bd form-horizontal" action="usuarioGuardado.html" method="post" data-validate="true" novalidate>
					
					<?php
                        if(isset($_GET['id'])){
                            $result = getUsuariosModif($_GET['id']);
                        }
                    ?>
						<div class="form-row">
							<label for="usuario-nombre">Nombre:</label>
							<input id="usuario-nombre" onkeypress="return soloLetras(event)" type="text" placeholder="Ingrese el nombre" class="form-control" value="<?php echo utf8_encode($result['nombre'])?>" required/>
						</div>

						<div class="form-row">
							<label for="usuario-apellidos">Primer apellido:</label>
							<input id="usuario-apellido1" onkeypress="return soloLetras(event)" type="text" placeholder="Ingrese el primer" class="form-control" value="<?php echo utf8_encode($result['apellido1'])?>" required/>
						</div>
						
						<div class="form-row">
							<label for="usuario-apellidos">Segundo apellido:</label>
							<input id="usuario-apellido2" onkeypress="return soloLetras(event)" type="text" placeholder="Ingrese el segundo apellido" class="form-control" value="<?php echo utf8_encode($result['apellido2'])?>" required/>
						</div>

						<div class="form-row">
							<label for="usuario-avatar">Avatar:</label>
							<!-- Drop media element -->
                			<div class="media-drop">
			                    <div id="droppedimage">
			                    	<img id="avatar" src="<?php echo utf8_encode($result['imagen'])?>">
			                    </div>
			                    <div id="dropbox" class="media-drop-placeholder" style="width: 200px; height: 200px">
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
							<label for="usuario-email">Correo electrónico:</label>
							<input id="usuario-email" type="email" placeholder="Ingrese el correo electrónico" value="<?php echo utf8_encode($result['id'])?>" class="form-control" data-validate-type="email" />
						</div>

						<div class="form-row">
							<label for="usuario-telefono">Teléfono:</label>
							<input id="usuario-telefono" type="text" placeholder="Ingrese el número telefónico" class="form-control" value="<?php echo utf8_encode($result['telefono'])?>" data-validate-type="phone"/>
						</div>

						<div class="form-row">
							<label for="usuario-skype">Skype Id:</label>
							<input id="usuario-skype" type="text" placeholder="Ingrese la cuenta de Skype" class="form-control" value="<?php echo utf8_encode($result['skypeid'])?>" />
						</div>

						<div class="form-row">
							<label for="usuario-rol">Rol:</label>
							<select id="usuario-rol">
								<option value="">Seleccione una opción</option>
								<?php mostrarRoles() ?>
							</select>
						</div>

						<div class="form-row">
							<label for="usuario-carrera">Carrera:</label>
							<select id="usuario-carrera">
								<option value="">Seleccione una opción</option>
								<?php mostrarCarreras2() ?>
							</select>
						</div>

						<div class="form-row ">
							<label for="usuario-curso">Cursos:</label>
							<select id="usuario-curso">
				                <option value="">Seleccione una opción</option>
								<?php mostrarCursos2() ?>
							</select>
						</div>

						<!-- <div class="form-row">
							<label for="usuario-horario">Horario:</label>
							<input id="usuario-horario" type="email" placeholder="Lunes, Martes y Jueves de 4:00 p.m. a 6:00 p.m." class="form-control" data-validate-type="email"/>
						</div> -->

						<div class="form-row form-row-button">
							<button id="btn-modificar-usuario" class="btn btn-primary" type="submit">Guardar</button>
						</div>
					</form>
				</section>
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