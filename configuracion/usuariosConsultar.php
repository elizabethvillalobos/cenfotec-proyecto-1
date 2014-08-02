<?php
    require_once('../includes/functions.php');
    require_once(ROOT.'/includes/functions-usuarios.php');

    $currentModule = 'configuracion';
?>


<!DOCTYPE html>
<html>
	<head>
		<title>Universidad Cenfotec - Gestor Ingeligente de Citas</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../css/gic.css">
		<link rel="stylesheet" href="../css/pages/configuracion.css">
	</head>
	<body>
		<div class="wrapper">
			<?php include(ROOT.'/includes/header.php'); ?>

			<aside>
                <nav class="secondary-nav">
                    <ul class="sec-nav-category accordion">
                        <li class="accordion-item">
                            <a href="consultarCarreras.html">Carreras y cursos</a>
                        </li>
                        <li class="accordion-item">
                            <a href="consultarUsuario.html" class="active">Usuarios</a>
                        </li>
                        <li class="accordion-item">
                            <a href="configuracionGeneral.html">General</a>
                        </li>
                    </ul>
                </nav>
            </aside>

			<main class='usuarios'>
				<div class="mod-hd">
				    <h2>Usuarios</h2>                    
                    <a class="crearUsuario btn btn-default flaticon-add73" href="#">Crear usuario</a>
                </div>
                <div class="mod-bd">
				    
                    <?php mostrarUsuarios(); ?>

					<ul class="accordion ">
                        <li class="accordion-item accordion-usuarios">
                            <a  href="#">Diego Barillas Valverde</a>
                            
                            <ul class="accordion-detail">
                                <section class="perfil">
                                    <div class="mod-hd">
                                        <h2>Diego Barillas Valverde</h2>
                                        <a href="../mensajeria/mensajeria.html" class="enviar-msj flaticon-black218">Enviar mensaje</a>
                                    </div>
                                    <div class="mod-bd">
                                        <img class="perfil-photo" src="../images/users/diego-barillas.jpg" width="130" height="130">

                                        <div class="row">
                                            <span class="label">Rol:</span>
                                            <span class="data">Estudiante</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Carrera:</span>
                                            <span class="data">Desarrollo de software</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Cursos:</span>
                                            <div class="data-wrap">
                                                <span class="data">Proyecto de ingeniería de software 1</span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <span class="label">Correo electrónico:</span>
                                            <span class="data email">dbarillasv@ucenfotec.ac.cr</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Teléfono:</span>
                                            <span class="data">8850-0504</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Skype Id:</span>
                                            <span class="data">diego.barillas</span>
                                        </div>
                                    </div>
                            </section>
                           <div class="acciones-admin">
                               <a class='item-usuario' href="#">Habilitar</a>
                                <a class='item-usuario' href="#">Deshabilitar</a>
                                <a class='item-usuario' href="usuarioModificar.html">Modificar</a>
                                <a class='item-usuario' href="#">Eliminar</a>
                               
                           </div>
                            
                            </ul>
                        </li>
                        <li class="accordion-item accordion-usuarios">
                            <a  href="#">Juan Carlos Brenes Álvarez</a>
                            
                            <ul class="accordion-detail">
                                <section class="perfil">
                                    <div class="mod-hd">
                                        <h2>Juan Carlos Brenes Álvarez</h2>
                                        <a href="../mensajeria/mensajeria.html" class="enviar-msj flaticon-black218">Enviar mensaje</a>
                                    </div>
                                    <div class="mod-bd">
                                        <img class="perfil-photo" src="../images/users/juan-carlos-brenes.jpg" width="130" height="130">

                                        <div class="row">
                                            <span class="label">Rol:</span>
                                            <span class="data">Estudiante</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Carrera:</span>
                                            <span class="data">Desarrollo de software</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Cursos:</span>
                                            <div class="data-wrap">
                                                <span class="data">Estructuras de datos</span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <span class="label">Correo electrónico:</span>
                                            <span class="data email">jbrenesa@ucenfotec.ac.cr</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Teléfono:</span>
                                            <span class="data">8850-0504</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Skype Id:</span>
                                            <span class="data">jc.brenes</span>
                                        </div>
                                    </div>
				            </section>
                           <div class="acciones-admin">
                               <a class='item-usuario' href="#">Habilitar</a>
                                <a class='item-usuario' href="#">Deshabilitar</a>
                                <a class='item-usuario' href="usuarioModificar.html">Modificar</a>
                                <a class='item-usuario' href="#">Eliminar</a>
                               
                           </div>
                            
                            </ul>
                        </li>
                        <li class="accordion-item accordion-usuarios">
                            <a href="#">Susana Fuentes Morales</a>
                            
                            <div class="accordion-detail">
                               <section class="perfil">
                                    <div class="mod-hd">
                                        <h2>Susana Fuentes Morales</h2>
                                        <a href="../mensajeria/mensajeria.html" class="enviar-msj flaticon-black218">Enviar mensaje</a>
                                    </div>
                                    <div class="mod-bd">
                                        <img class="perfil-photo" src="../images/users/susana-fuentes.jpg" width="130" height="130">

                                        <div class="row">
                                            <span class="label">Rol:</span>
                                            <span class="data">Estudiante</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Carrera:</span>
                                            <span class="data">Desarrollo de Software</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Cursos:</span>
                                            <div class="data-wrap">
                                                <span class="data">Fundamentos de programación</span>
                                                <span class="data">Proyecto de ingeniería de software 1</span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <span class="label">Correo electrónico:</span>
                                            <span class="data email">sfuentesm@ucenfotec.ac.cr</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Teléfono:</span>
                                            <span class="data">7002-2414</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Skype Id:</span>
                                            <span class="data">susana.fuentes</span>
                                        </div>
                                    </div>
				            </section>
                           <div class="acciones-admin">
                               <a class='item-usuario' href="#">Habilitar</a>
                                <a class='item-usuario' href="#">Deshabilitar</a>
                                <a class='item-usuario' href="usuarioModificar.html">Modificar</a>
                                <a class='item-usuario' href="#">Eliminar</a>
                               
                           </div>
                            </div>
                        </li>
                        <li class="accordion-item accordion-usuarios">
                            <a href="#">Luis Guzmán Valverde</a>
                            
                            <div class="accordion-detail">
                               <section class="perfil">
                                    <div class="mod-hd">
                                        <h2>Luis Guzmán Valverde</h2>
                                        <a href="../mensajeria/mensajeria.html" class="enviar-msj flaticon-black218">Enviar mensaje</a>
                                    </div>
                                    <div class="mod-bd">
                                        <img class="perfil-photo" src="../images/users/luis-guzman.jpg" width="130" height="130">

                                        <div class="row">
                                            <span class="label">Rol:</span>
                                            <span class="data">Estudiante</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Carrera:</span>
                                            <span class="data">Desarrollo de software</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Cursos:</span>
                                            <div class="data-wrap">
                                                <span class="data">Proyecto de ingeniería de software 1</span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <span class="label">Correo electrónico:</span>
                                            <span class="data email">lguzmanv@ucenfotec.ac.cr</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Teléfono:</span>
                                            <span class="data">8337-9008</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Skype Id:</span>
                                            <span class="data">luis.guzman</span>
                                        </div>
                                    </div>
                                </section>
                                <div class="acciones-admin">
                                   <a class='item-usuario' href="#">Habilitar</a>
                                    <a class='item-usuario' href="#">Deshabilitar</a>
                                    <a class='item-usuario' href="usuarioModificar.html">Modificar</a>
                                    <a class='item-usuario' href="#">Eliminar</a>
                                </div>
                            </div>
                        </li>
                        <li class="accordion-item accordion-usuarios">
                            <a href="#">Marcela Madriz López</a>
                            
                            <div class="accordion-detail">
                               <section class="perfil">
                                    <div class="mod-hd">
                                        <h2>Marcela Madriz López</h2>
                                        <a href="../mensajeria/mensajeria.html" class="enviar-msj flaticon-black218">Enviar mensaje</a>
                                    </div>
                                    <div class="mod-bd">
                                        <img class="perfil-photo" src="../images/users/marcela-madriz.jpg" width="130" height="130">

                                        <div class="row">
                                            <span class="label">Rol:</span>
                                            <span class="data">Estudiante</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Carrera:</span>
                                            <span class="data">Desarrollo de software</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Cursos:</span>
                                            <div class="data-wrap">
                                                <span class="data">Fundamentos de programación</span>
                                                <span class="data">Proyecto de ingeniería de software 1</span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <span class="label">Correo electrónico:</span>
                                            <span class="data email">mmadrizl@ucenfotec.ac.cr</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Teléfono:</span>
                                            <span class="data">8822-3456</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Skype Id:</span>
                                            <span class="data">marcela.madriz</span>
                                        </div>
                                    </div>
                                </section>
                                <div class="acciones-admin">
                                   <a class='item-usuario' href="#">Habilitar</a>
                                    <a class='item-usuario' href="#">Deshabilitar</a>
                                    <a class='item-usuario' href="usuarioModificar.html">Modificar</a>
                                    <a class='item-usuario' href="#">Eliminar</a>
                                </div>
                            </div>
                        </li>
                        <li class="accordion-item accordion-usuarios">
                            <a href="#">Walter Torres García</a>
                            
                            <div class="accordion-detail">
                               <section class="perfil">
                                    <div class="mod-hd">
                                        <h2>Walter Torres García</h2>
                                        <a href="../mensajeria/mensajeria.html" class="enviar-msj flaticon-black218">Enviar mensaje</a>
                                    </div>
                                    <div class="mod-bd">
                                        <img class="perfil-photo" src="../images/users/walter-torres.jpg" width="130" height="130">

                                        <div class="row">
                                            <span class="label">Rol:</span>
                                            <span class="data">Estudiante</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Carrera:</span>
                                            <span class="data">Desarrollo de software</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Cursos:</span>
                                            <div class="data-wrap">
                                                <span class="data">Fundamentos de programación</span>
                                                <span class="data">Proyecto de ingeniería de software 1</span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <span class="label">Correo electrónico:</span>
                                            <span class="data email">wtorresg@ucenfotec.ac.cr</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Teléfono:</span>
                                            <span class="data">6054-8488</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Skype Id:</span>
                                            <span class="data">walter.torres</span>
                                        </div>
                                    </div>
                                </section>
                                <div class="acciones-admin">
                                   <a class='item-usuario' href="#">Habilitar</a>
                                    <a class='item-usuario' href="#">Deshabilitar</a>
                                    <a class='item-usuario' href="usuarioModificar.html">Modificar</a>
                                    <a class='item-usuario' href="#">Eliminar</a>
                                </div>
                            </div>
                        </li>
                        <li class="accordion-item accordion-usuarios">
                            <a href="#">Pablo Monestel</a>
                            <div class="accordion-detail">
                                <section class="perfil">
                                    <div class="mod-hd">
                                        <h2>Pablo Monestel</h2>
                                        <a href="../mensajeria/mensajeria.html" class="enviar-msj flaticon-black218">Enviar mensaje</a>
                                    </div>
                                    <div class="mod-bd">
                                        <img class="perfil-photo" src="../images/users/pablo-monestel.jpg" width="130" height="130">

                                        <div class="row">
                                            <span class="label">Rol:</span>
                                            <span class="data">Director académico</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Carrera:</span>
                                            <span class="data">Desarrollo y diseño web</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Cursos:</span>
                                            <div class="data-wrap">
                                                <span class="data">Proyecto de ingeniería de software 1</span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <span class="label">Horario:</span>
                                            <span class="data">Martes y jueves de 2:00 p.m. a 7:00 p.m.</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Correo electrónico:</span>
                                            <span class="data email">pmonestel@ucenfotec.ac.cr</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Teléfono:</span>
                                            <span class="data">8719-5963</span>
                                        </div>

                                        <div class="row">
                                            <span class="label">Skype Id:</span>
                                            <span class="data">pabs.monestel</span>
                                        </div>
                                    </div>
				            </section>
                           <div class="acciones-admin">
                               <a class='item-usuario' href="#">Habilitar</a>
                                <a class='item-usuario' href="#">Deshabilitar</a>
                                <a class='item-usuario' href="usuarioModificar.html">Modificar</a>
                                <a class='item-usuario' href="#">Eliminar</a>
                               
                           </div>
                            </div>
                        </li>
                    </ul>
				</div>
			</main>
			
            <?php include(ROOT.'/includes/footer.php'); ?>
		</div>

		<!-- Load JS -->
        <script src="../js/vendors/jquery-1.8.3.min.js"></script>
        <script src="../js/vendors/jquery-ui-1.10.3.custom.min.js"></script>
        <script src="../js/vendors/bootstrap.min.js"></script>
        <script src="../js/vendors/bootstrap-select.js"></script>
        <script src="../js/vendors/flatui-checkbox.js"></script>
        <script src="../js/vendors/flatui-radio.js"></script>
        <script src="../js/gic.js"></script>
        <script src="../js/common-logic.js"></script>
	</body>
</html>