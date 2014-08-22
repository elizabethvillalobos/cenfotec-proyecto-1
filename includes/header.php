<?php session_start(); 
    error_reporting(0);
    $id = $_SESSION['usuarioActivoId'];
    $rolUsr = $_SESSION['usuarioActivoRol'];
    $infoSesion = getInfoSesion($id);
	$loggedInUserName = $infoSesion['nombre'];
	$loggedInUserAvatar = $infoSesion['avatar'] ? $infoSesion['avatar'] : 'default-user.png';
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
			<?php if($rolUsr!=7){
            $activo = '';
            if ($currentModule == 'evaluacion'){ $activo = 'active';}
			echo '<li>
				<a href="/cenfotec-proyecto-1/evaluacion/miRanking.php" class="evaluacion flaticon-verification5 '.$activo.' "><span>Evaluación</span></a>
			</li>';
                }
            ?>
			<li>
				<a href="/cenfotec-proyecto-1/mensajeria/mensajeria.php?idUsuarioOtro=" class="mensajeria flaticon-black218 <?php if ($currentModule == 'mensajeria') { echo 'active'; } ?>"><span>Mensajería</span></a>
			</li>
			<?php if($rolUsr==1 || $rolUsr==2 || $rolUsr==3){
                $activo = '';
                if ($currentModule == 'reportes') { $activo = 'active'; }
			echo '<li>
				<a href="/cenfotec-proyecto-1/reportes/reportes.php" class="reportes flaticon-seo2 '.$activo. ' "><span>Reportes</span></a>
			</li>';
                    }    
            ?>
			<?php if($rolUsr==1 || $rolUsr==2 || $rolUsr==3){
                $activo = '';
                if ($currentModule == 'configuracion') { $activo = 'active'; }
			echo '<li>
				<a href="/cenfotec-proyecto-1/configuracion/carrerasConsultar.php" class="configuracion flaticon-machine2 '.$activo.' "><span>Configuración</span></a>
			</li>';
                    }
            ?>    
		</ul>
	</nav>

	<section class="busqueda">
					<input id="q" type="text" value="" placeholder="Buscar personas" class="campo-busqueda" onkeyup="realizarBusqueda(event)" />
<!--					<button id="btnBuscar" class="flaticon-magnifier12" type="submit"></button>-->
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
				<a href="/cenfotec-proyecto-1/seguridad/iniciarSesion.php?kill=1" class="usr-cerrar-sesion">Cerrar sesión</a>
			</li>
		</ul>
	</section>
</header>


<body>
   <script src="/cenfotec-proyecto-1/js/vendors/jquery-1.8.3.min.js"></script>
    <script src="/cenfotec-proyecto-1/js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="/cenfotec-proyecto-1/js/common-logic.js"></script>
    <script src="/cenfotec-proyecto-1/js/busquedaGeneral.js"></script>
</body>
	<input type="hidden" id="usuarioActivoId" value="<?php echo $id; ?>" /> 
	<input type="hidden" id="usuarioActivoRol" value="<?php echo $rolUsr; ?>" /> 
	
</header>
