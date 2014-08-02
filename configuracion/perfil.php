<?php
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
			<?php include('../includes/header.php'); ?>

			<aside>
                <nav class="secondary-nav">
                    <ul class="sec-nav-category accordion">
                        <li class="accordion-item">
                            <a href="perfil.html" class="active">Perfil</a>
                        </li>
                        <li class="accordion-item">
                            <a href="miCuenta.html">Cambiar contraseña</a>
                        </li>
                    </ul>
                </nav>
            </aside>

			<main>
				<section class="perfil">
					<div class="mod-hd">
						<h2>Álvaro Cordero Peña</h2>
						<!-- <a href="../mensajeria/mensajeria.html" class="enviar-msj flaticon-black218">Enviar mensaje</a> -->
						<a href="perfilModificar.html" class="btn btn-primary btn-modificar-perfil">Modificar</a>
					</div>
					<div class="mod-bd">
						<img class="perfil-photo" src="../images/users/default-user.png" width="130" height="130">

						<div class="row">
							<span class="label">Correo electrónico:</span>
							<span class="data email">acordero@ucenfotec.ac.cr</span>
						</div>

						<div class="row">
							<span class="label">Teléfono:</span>
							<span class="data">8800-0101</span>
						</div>

						<div class="row">
							<span class="label">Skype Id:</span>
							<span class="data">al_corpe</span>
						</div>

						<div class="row">
							<span class="label">Rol:</span>
							<span class="data">Profesor</span>
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
							<span class="label">Horario:</span>
							<span class="data">Lunes, martes, miércoles y viernes de 6:00 p.m. a 9:00 p.m.</span>
						</div>
					</div>
				</section>
			</main>
			
			<?php include('../includes/footer.php'); ?>
		</div>

		<!-- Load JS -->
        <script src="../js/common-logic.js"></script>
	</body>
</html>