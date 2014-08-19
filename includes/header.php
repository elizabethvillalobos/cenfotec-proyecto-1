<?php session_start(); 
    $id = $_SESSION['usuarioActivoId'];
    $infoSesion = getInfoSesion($id);
	$loggedInUserName = $infoSesion['nombre'];
	$loggedInUserAvatar = $infoSesion['avatar'];
?>

<header>
	<a href="/cenfotec-proyecto-1/" class="home">
		<h1 class="logo">Gestor Inteligente de Citas</h1>
	</a>

	<!-- Menu principal -->
	<nav class="main-nav">
		<ul>
			<li>
				<a href="/cenfotec-proyecto-1/citas/agenda.php" class="citas flaticon-calendar68 <?php if ($currentModule == 'citas') { echo 'active'; } ?>"><span>Citas</span></a>
			</li>
			<li>
				<a href="/cenfotec-proyecto-1/evaluacion/miRanking.php" class="evaluacion flaticon-verification5 <?php if ($currentModule == 'evaluacion') { echo 'active'; } ?>"><span>Evaluación</span></a>
			</li>
			<li>
				<a href="/cenfotec-proyecto-1/mensajeria/mensajeria.php" class="mensajeria flaticon-black218 <?php if ($currentModule == 'mensajeria') { echo 'active'; } ?>"><span>Mensajería</span></a>
			</li>
			<li>
				<a href="/cenfotec-proyecto-1/reportes/reportes.php" class="reportes flaticon-seo2 <?php if ($currentModule == 'reportes') { echo 'active'; } ?>"><span>Reportes</span></a>
			</li>
			<li>
				<a href="/cenfotec-proyecto-1/configuracion/carrerasConsultar.php" class="configuracion flaticon-machine2 <?php if ($currentModule == 'configuracion') { echo 'active'; } ?>"><span>Configuración</span></a>
			</li>
		</ul>
	</nav>

	<section class="busqueda">
					<input id="q" type="text" value="" placeholder="Buscar personas" class="campo-busqueda" onkeyup="realizarBusqueda(event)" />
					<button id="btnBuscar" class="flaticon-magnifier12" type="submit"></button>
       <div id="resultados">
           
       </div>
        </section>

	<section class="usr-info">
		<span class="usr-greeting">Bienvenido, <?php echo $loggedInUserName; ?>!</span>
        <img class="usr-photo" src="/cenfotec-proyecto-1/images/users/<?php echo $loggedInUserAvatar; ?>" width="40" height="40">
		<ul>
			<li>
				<a href="/cenfotec-proyecto-1/configuracion/perfil.php" class="usr-editar-perfil">Mi cuenta</a>
			</li>
			<li>
				<a href="/cenfotec-proyecto-1/seguridad/iniciarSesion.php" class="usr-cerrar-sesion">Cerrar sesión</a>
			</li>
		</ul>
	</section>
</header>