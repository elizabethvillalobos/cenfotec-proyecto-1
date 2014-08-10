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
			<header>
				<a href="../index.php" class="home">
					<h1 class="logo">Gestor Inteligente de Citas</h1>
				</a>

				<!-- Menu principal -->
			<nav class="main-nav">
					<ul>
						<li>
							<a href="../citas/citas.php" class="citas flaticon-calendar68"><span>Citas</span></a>
						</li>
						<li>
							<a href="../evaluacion/miRanking.php" class="evaluacion  flaticon-verification5"><span>Evaluación</span></a>
						</li>
						<li>
							<a href="../mensajeria/mensajeria.php" class="mensajeria flaticon-black218"><span>Mensajería</span></a>
						</li>
						<li>
							<a href="../reportes/reportes.php" class="reportes flaticon-seo2"><span>Reportes</span></a>
						</li>
						<li>
							<a href="configuracion/perfil.php" class="configuracion active flaticon-machine2"><span>Configuración</span></a>
						</li>
					</ul>
				</nav>

				<section class="busqueda">
					<input id="q" type="text" value="" placeholder="Buscar personas" />
					<button id="btnBuscar" class="flaticon-magnifier12" type="submit"></button>
				</section>

				<section class="usr-info">
					<span class="usr-greeting">Bienvenido, Carlos!</span>
					<img class="usr-photo" src="../images/users/administrador.jpg" width="40" height="40">
					<ul>
						<li>
							<a href="../configuracion/perfil.php" class="usr-editar-perfil">Mi cuenta</a>
						</li>
						<li>
							<a href="../seguridad/iniciarSesion.php" class="usr-cerrar-sesion">Cerrar sesión</a>
						</li>
					</ul>
				</section>
			</header>

			<aside>
				<nav class="secondary-nav">
					<ul class="sec-nav-category">
						<li>
							<a href="#" class="active">Configuración</a>
							<ul class="thrd-nav-category">
								<li><a href="perfil.php">Mi cuenta</a></li>
								<li><a href="#">Mi cuenta</a></li>
								<li><a href="consultarCarreras.php" class="">Carreras y cursos</a></li>
								<li><a href="consultarUsuario.php">Usuarios</a></li>
								<li><a href="configuracionGeneral.php" class="active">General</a></li>
							</ul>
						</li>
					</ul>
				</nav>
			</aside>

			<main id="mainCG">
				 <section class="msg-confirm">
                        <div class="mod-hd">
                            <h2 class="flaticon-machine2">¡Configuración realizada con éxito!</h2>
                        </div>
                        <div class="mod-bd">
                            <p>Se han establecido correctamente los parametros.</p>

                            <a href="configuracionGeneral.php" class="btn btn-default">Volver</a>
                        </div>
                    </section>
                 </main>   
			<footer>
				<p>2014 Universidad Cenfotec. Todos los derechos reservados.</p>
			</footer>
		</div>
		<!-- Load JS-->
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap.min.js"></script>
        <script src="/cenfotec-proyecto-1/js/vendors/bootstrap-select.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-checkbox.js"></script>
		<script src="/cenfotec-proyecto-1/js/vendors/flatui-radio.js"></script>
        <script src="/cenfotec-proyecto-1/js/gic.js"></script>
        <script src="/cenfotec-proyecto-1/js/configuracion.js"></script>
        <script src="/cenfotec-proyecto-1/js/common-logic.js"></script> 
	</body>
</html>