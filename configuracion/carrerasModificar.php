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
			
				<aside>
				<nav class="secondary-nav">
					<ul class="sec-nav-category accordion">
                        <li class="accordion-item">
                            <a href="perfil.html">Perfil</a>
                        </li>
                        <li class="accordion-item">
                            <a href="miCuenta.html">Mi cuenta</a>
                        </li>
                        <li class="accordion-item">
                            <a href="consultarCarreras.html" class="active">Carreras y cursos</a>
                        </li>
                        <li class="accordion-item">
                            <a href="consultarUsuario.html">Usuarios</a>
                        </li>
                        <li class="accordion-item">
                            <a href="configuracionGeneral.html">General</a>
                        </li>
                    </ul>
				</nav>
			</aside>

			<main>
				<section class="perfil-editar">
					<div class="mod-hd">
						<h2>Modificar Carrera</h2>
					</div>
					<!-- El atributo novalidate es para evitar que el browser 
					haga las validaciones. -->
					<form id="modificar-carrera" class="mod-bd form-horizontal" action="carrerasModificar-confirmar.php" 
						method="post" data-validate="true" novalidate>
						<div class="form-row">

							<label for="codigo-carrera">Código:</label>
							<input id="codigo-carrera" type="text" placeholder="Ingrese el código" value="DSOF-002" 
								class="form-control" onkeypress="return soloGuion(event)" required/>
						</div>

						<div class="form-row">
							<label for="nombre-carrera">Nombre:</label>
							<input id="nombre-carrera" type="text" placeholder="Ingrese el nombre de la carrera" 
								value="Desarrollo de software" class="form-control" onkeypress="return soloLetras(event)" 
								required/>
						</div>

						<div class="form-row">
							<label for="director-academico">Director académico:</label>
							<select id="director-academico" required>
	                     		<option value="">María Eugenia Ucrós</option>
	                            <option value="Director1">Pablo Monestel</option>
	                            <option value="Director3">Luis Chacón</option>
	                            <option value="Director4">Nelson Brenes</option>
	                            <option value="Director5">Andrea Espinach</option>
	                            <option value="Director5">Luis Montero</option>
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