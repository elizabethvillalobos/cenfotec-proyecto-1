<?php
    require_once('../includes/functions.php');
    $currentModule = 'configuracion';
    $currentSubModule = 'general';
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
<<<<<<< HEAD:configuracion/configuracionGeneral.php
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
					<span class="usr-greeting">Bienvenido, Álvaro!</span>
					<img class="usr-photo" src="../images/users/default-user.png" width="40" height="40">
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
						<li class="accordion-item">
                            <a href="perfil.php">Perfil</a>

                        </li>
                        <li class="accordion-item">
                            <a href="#">Mi cuenta</a>
                        </li>
                        <li class="accordion-item">

                            <a href="consultarCarreras.php">Carreras y cursos</a>
 						</li>
                        <li class="accordion-item">
                            <a href="consultarUsuario.php">Usuarios</a>
                        </li>
                        <li class="accordion-item">
                            <a href="configuracionGeneral.php" class="active">General</a>
                        </li>

					</ul>
				</nav>
			</aside>

=======
			<?php include(ROOT.'/includes/header.php'); ?>
            <?php include(ROOT.'/includes/aside-configuracion.php'); ?>
>>>>>>> origin/master:configuracion/configuracionGeneral.php

			<main id="mainCG">
				<ul class="accord">
                        <li class="accordion-item expanded">
                            <a href="#">Citas</a>
                            <ul class="accordion-detail">
                            	<div>
<<<<<<< HEAD:configuracion/configuracionGeneral.php
                            		<form class="frmC" action="configuracionGeneralConfirm.php" method="post">
=======
                            		<form class="frmC" action="/cenfotec-proyecto-1/configuracion/configuracionGeneralConfirm.php" method="post">
>>>>>>> origin/master:configuracion/configuracionGeneral.php

	                            		<div id="divTxtCit">
	                            			<label class="lbl">Dias de expiración de solicitud:</label>
		                            	</div>

		                            	<div id="divNbr">
		                            		<input class="nbr" type="number" name="puntaje" min="1" max="31" value="30">
		                            	</div>

		                            	<div  id="divBtnEvr">
											<button class="btn btn-primary" type="submit">Aplicar</button>
			                                
							            </div>

	                                </form>
                            	</div>
                            </ul>
                        </li>
                        <li class="accordion-item expanded">
                            <a href="#">Mensajería</a>
                            <div class="accordion-detail">

                            	<div>
                            		<form class="frmC" action="configuracionGeneralConfirm.php" method="post">

	                            		<div id="divTxtCit">
	                            			<label class="lbl">Máximo carateres por mensaje:</label>
		                            	</div>

		                            	<div id="divNbr">
		                            		<input class="nbr" type="number" name="puntaje" min="1" max="31" value="30">
		                            	</div>

		                            	<div  id="divBtnEvr">
											<button class="btn btn-primary" type="submit">Aplicar</button>
			                                
							            </div>

	                                </form>
                            	</div>                                

                            </div>
                        </li>
                        <li class="accordion-item expanded">
                            <a href="#">Notificaciones</a>
                            <div class="accordion-detail">

                            	<div>
                            		<form class="frmC" id="form-confGrl" action="configuracionGeneralConfirm.php" method="post" >

	                            		<div id="divTxtMail">
	                            			<label class="lbl">Servidor smtp:<input id="emailNot" type="text" placeholder="smtp" class="form-control" /></label>
	                            			
		                            	</div>

		                            	<div id="divMail">
		                            		<label class="lbl">Puerto:</label>
		                            		<input id="emailNot" type="text" placeholder="puerto" class="form-control" />
		                            		<p class="alert-error"></p>		                            		
		                            	</div>

		                            	<div id="divMail">
		                            		<label class="lbl">Smtp seguridad:</label>
		                            		<input id="emailNot" type="text" placeholder="ssl" class="form-control" />
		                            		<p class="alert-error"></p>		                            		
		                            	</div>

		                            	<div id="divMail">
		                            		<label class="lbl">Usuario:</label>
		                            		<input id="emailNot" type="text" placeholder="mail@ucenfotec.ac.cr" class="form-control" />
		                            		<p class="alert-error"></p>		                            		
		                            	</div>

		                            	<div id="divMail">
		                            		<label class="lbl">Clave:</label>
		                            		<input id="emailNot" type="text" placeholder="clave" class="form-control" />
		                            		<p class="alert-error"></p>		                            		
		                            	</div>

		                            	


		                            	<div  id="divBtnEvr">
											<button id="btnEvr"class="btn btn-primary" type="submit">Aplicar</button>			                                   
							            </div>							            
	                                </form>
                            	</div> 
                            	                               

                            </div>
                        </li>
                    </ul>
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