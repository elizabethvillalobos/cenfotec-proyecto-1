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
                            <a href="consultarCarrerasCarreraModificada.html" class="active">Carreras y cursos</a>
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
				<section class="msg-confirm">
					<div class="mod-hd">
						<h2 class="flaticon-male12">Carrera modificada</h2>
					</div>
					<div class="mod-bd">
						<p>La carrera Desarrollo de Software se ha modificado con éxito.</p>

						<a href="consultarCarrerasCarreraModificada.html" class="btn btn-default">Volver</a>
					</div>
				</section>
			</main>
			
			<footer>
				<p>2014 Universidad Cenfotec. Todos los derechos reservados.</p>
			</footer>
		</div>

		<!-- Load JS -->
		<script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
	</body>
</html>