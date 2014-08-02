<?php 
	$currentModule = 'citas';
	$currentSubModule = 'agenda'; 
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Universidad Cenfotec - Gestor Ingeligente de Citas</title>
		<meta charset="utf-8">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
		<link rel="stylesheet" href="../css/gic.css">
		<link rel="stylesheet" href="../css/pages/citas.css">
	</head>
	<body id="page-agenda">
		<div class="wrapper">
			<?php include('../includes/header.php'); ?>
			<?php include('../includes/aside-citas.php'); ?>

			<main>
				<section class="cita cita-23-07-2014 visible">
					<div class="mod-hd">
						<h2>Miércoles 23 de Julio</h2>
						<span class="cita-hora-inicio-fin">6:00 p.m. a 7:00 p.m.</span>
					</div>
					<div class="mod-bd">
						<div class="row">
							<span class="label">Invitado:</span>
							<div class="data-wrap">
								<span class="data cita-invitado">Juan Carlos Brenes Álvarez</span>
								<span class="data">jbrenesa@ucenfotec.ac.cr</span>
								<span class="data">8850-0504</span>
							</div>
						</div>

						<img class="cita-photo" src="../images/users/juan-carlos-brenes.jpg" width="75" height="75">

						<div class="row">
							<span class="label">Asunto a tratar:</span>
							<span class="data">Casos de uso en formato expandido</span>
						</div>

						<div class="row">
							<span class="label">Curso:</span>
							<span class="data">Proyecto de ingeniería de software 1</span>
						</div>

						<div class="row">
							<span class="label">Modalidad:</span>
							<span class="data">Virtual</span>
						</div>

						<div class="row">
							<span class="label">Tipo:</span>
							<span class="data">Grupal</span>
						</div>

						<div class="row">
							<span class="label">Observaciones:</span>
							<span class="data">Profesor, nuestro equipo quiere recibir retroalimentación sobre nuestros casos de uso en formato expandido. Mi id de skype es: juancarlos.brenes</span>
						</div>
						<div class="form-row form-row-button">
							<a href="citaFinalizada.html" class="btn btn-primary js-modal" data-modal-id="modal-finalizar">Finalizar</a>
							<a href="citaCancelada.html" class="btn btn-default js-modal" data-modal-id="modal-cancelar">Cancelar</a>
						</div>
					</div>
				</section>

				<section class="cita cita-24-07-2014">
					<div class="mod-hd">
						<h2>Jueves 24 de Julio</h2>
						<span class="cita-hora-inicio-fin">2:00 p.m. a 3:00 p.m.</span>
					</div>
					<div class="mod-bd">
						<div class="row">
							<span class="label">Invitado:</span>
							<div class="data-wrap">
								<span class="data cita-invitado">Diego Barillas Valverde</span>
								<span class="data">dbarillasv@ucenfotec.ac.cr</span>
								<span class="data">2568-5635</span>
							</div>
						</div>

						<img class="cita-photo" src="../images/users/diego-barillas.jpg" width="75" height="75">

						<div class="row">
							<span class="label">Asunto a tratar:</span>
							<span class="data">Casos de uso</span>
						</div>

						<div class="row">
							<span class="label">Curso:</span>
							<span class="data">Proyecto de ingeniería de software 1</span>
						</div>

						<div class="row">
							<span class="label">Modalidad:</span>
							<span class="data">Virtual</span>
						</div>

						<div class="row">
							<span class="label">Tipo:</span>
							<span class="data">Grupal</span>
						</div>

						<div class="row">
							<span class="label">Observaciones:</span>
							<span class="data">Hola profe, es sobre casos de uso expandidos.</span>
						</div>
						<div class="form-row form-row-button">
							<a href="citaFinalizada.html" class="btn btn-primary js-modal" data-modal-id="modal-finalizar">Finalizar</a>
							<a href="citaCancelada.html" class="btn btn-default js-modal" data-modal-id="modal-cancelar">Cancelar</a>
						</div>
					</div>
				</section>

				<section class="cita cita-28-07-2014">
					<div class="mod-hd">
						<h2>Lunes 28 de Julio</h2>
						<span class="cita-hora-inicio-fin">4:00 p.m. a 5:00 p.m.</span>
					</div>
					<div class="mod-bd">
						<div class="row">
							<span class="label">Invitado:</span>
							<div class="data-wrap">
								<span class="data cita-invitado">Susana Fuentes Morales</span>
								<span class="data">sfuentesm@ucenfotec.ac.cr</span>
								<span class="data">7002-2414</span>
							</div>
						</div>

						<img class="cita-photo" src="../images/users/susana-fuentes.jpg" width="75" height="75">

						<div class="row">
							<span class="label">Asunto a tratar:</span>
							<span class="data">Algoritmos</span>
						</div>

						<div class="row">
							<span class="label">Curso:</span>
							<span class="data">Fundamentos de programación</span>
						</div>

						<div class="row">
							<span class="label">Modalidad:</span>
							<span class="data">Presencial</span>
						</div>

						<div class="row">
							<span class="label">Tipo:</span>
							<span class="data">Individual</span>
						</div>

						<div class="row">
							<span class="label">Observaciones:</span>
							<span class="data">Tengo disponibilidad los lunes y jueves por las tardes.</span>
						</div>

						<div class="form-row form-row-button">
							<a href="citaFinalizada.html" class="btn btn-primary js-modal" data-modal-id="modal-finalizar">Finalizar</a>
							<a href="citaCancelada.html" class="btn btn-default js-modal" data-modal-id="modal-cancelar">Cancelar</a>
						</div>
					</div>
				</section>

				<section class="cita cita-29-07-2014">
					<div class="mod-hd">
						<h2>Martes 29 de Julio, 2014</h2>
						<span class="cita-hora-inicio-fin">5:00 p.m. a 6:00 p.m.</span>
					</div>
					<div class="mod-bd">
						<div class="row">
							<span class="label">Invitado:</span>
							<div class="data-wrap">
								<span class="data cita-invitado">Luis Guzmán Valverde</span>
								<span class="data">lguzmanv@ucenfotec.ac.cr</span>
								<span class="data">8337-9008</span>
							</div>
						</div>

						<img class="cita-photo" src="../images/users/luis-guzman.jpg" width="75" height="75">

						<div class="row">
							<span class="label">Asunto a tratar:</span>
							<span class="data">Revisión de la ERS</span>
						</div>

						<div class="row">
							<span class="label">Curso:</span>
							<span class="data">Proyecto de ingeniería de software 1</span>
						</div>

						<div class="row">
							<span class="label">Modalidad:</span>
							<span class="data">Presencial</span>
						</div>

						<div class="row">
							<span class="label">Tipo:</span>
							<span class="data">Grupal</span>
						</div>

						<div class="row">
							<span class="label">Observaciones:</span>
							<span class="data">Profesor, queremos recibir sus comentarios sobre la ERS. Gracias.</span>
						</div>

						<div class="form-row form-row-button">
							<a href="citaFinalizada.html" class="btn btn-primary js-modal" data-modal-id="modal-finalizar">Finalizar</a>
							<a href="citaCancelada.html" class="btn btn-default js-modal" data-modal-id="modal-cancelar">Cancelar</a>
						</div>
					</div>
				</section>

				<section class="cita cita-30-07-2014">
					<div class="mod-hd">
						<h2>Miércoles 30 de Julio, 2014</h2>
						<span class="cita-hora-inicio-fin">1:00 p.m. a 2:00 p.m.</span>
					</div>
					<div class="mod-bd">
						<div class="row">
							<span class="label">Invitado:</span>
							<div class="data-wrap">
								<span class="data cita-invitado">Walter Torres García</span>
								<span class="data">wtorresg@ucenfotec.ac.cr</span>
								<span class="data">6054-8488</span>
							</div>
						</div>

						<img class="cita-photo" src="../images/users/walter-torres.jpg" width="75" height="75">

						<div class="row">
							<span class="label">Asunto a tratar:</span>
							<span class="data">Revisión de casos de uso en formato expandido</span>
						</div>

						<div class="row">
							<span class="label">Curso:</span>
							<span class="data">Proyecto de ingeniería de software 1</span>
						</div>

						<div class="row">
							<span class="label">Modalidad:</span>
							<span class="data">Presencial</span>
						</div>

						<div class="row">
							<span class="label">Tipo:</span>
							<span class="data">Grupal</span>
						</div>

						<div class="row">
							<span class="label">Observaciones:</span>
							<span class="data">Quiero recibir una tutoría sobre herencia, métodos privados y públicos.</span>
						</div>

						<div class="form-row form-row-button">
							<a href="citaFinalizada.html" class="btn btn-primary js-modal" data-modal-id="modal-finalizar">Finalizar</a>
							<a href="citaCancelada.html" class="btn btn-default js-modal" data-modal-id="modal-cancelar">Cancelar</a>
						</div>
					</div>
				</section>

				<section class="cita cita-31-07-2014">
					<div class="mod-hd">
						<h2>Jueves 31 de Julio, 2014</h2>
						<span class="cita-hora-inicio-fin">2:00 p.m. a 3:00 p.m.</span>
					</div>
					<div class="mod-bd">
						<div class="row">
							<span class="label">Invitado:</span>
							<div class="data-wrap">
								<span class="data cita-invitado">Marcela Madriz López</span>
								<span class="data">mmadrizl@ucenfotec.ac.cr</span>
								<span class="data">8822-3456</span>
							</div>
						</div>

						<img class="cita-photo" src="../images/users/marcela-madriz.jpg" width="75" height="75">

						<div class="row">
							<span class="label">Asunto a tratar:</span>
							<span class="data">Diagramas de flujo</span>
						</div>

						<div class="row">
							<span class="label">Curso:</span>
							<span class="data">Fundamentos de programación</span>
						</div>

						<div class="row">
							<span class="label">Modalidad:</span>
							<span class="data">Presencial</span>
						</div>

						<div class="row">
							<span class="label">Tipo:</span>
							<span class="data">Individual</span>
						</div>

						<div class="row">
							<span class="label">Observaciones:</span>
							<span class="data">Hola! Necesito una tutoría sobre diagramas de flujo. Los miércoles es el día que más me conviene.</span>
						</div>

						<div class="form-row form-row-button">
							<a href="citaFinalizada.html" class="btn btn-primary js-modal" data-modal-id="modal-finalizar">Finalizar</a>
							<a href="citaCancelada.html" class="btn btn-default js-modal" data-modal-id="modal-cancelar">Cancelar</a>
						</div>
					</div>
				</section>


				<section class="cita no-cita">
					<p class="flaticon-information38">No hay citas agendadas.</p>
				</section>


				<div id="modal-finalizar" class="modal js-modal-window">
					<span class="close flaticon-close3 js-modal-close">Close</span>
					<h3>¿Está seguro que desea finalizar la cita de atención?</h3>
					<div class="form-row">
						<a href="citaFinalizada.html" class="btn btn-primary js-modal-aceptar">Sí</a>
						<a href="#" class="btn btn-default js-modal-close">No</a>
					</div>
				</div>
				<div id="modal-cancelar" class="modal js-modal-window">
					<span class="close flaticon-close3 js-modal-close">Close</span>
					<h3>¿Está seguro que desea cancelar la cita de atención?</h3>
					<div class="form-row">
						<a href="citaCancelada.html" class="btn btn-primary js-modal-aceptar">Sí</a>
						<a href="#" class="btn btn-default js-modal-close">No</a>
					</div>
				</div>
			</main>
			
			<?php include('../includes/footer.php'); ?>
		</div>

		<!-- Load JS -->
		<script src="../js/vendors/jquery-1.8.3.min.js"></script>
		<script src="../js/vendors/jquery-ui.js"></script>
		<script src="../js/gic.js"></script>
        <script src="../js/common-logic.js"></script>
        <script src="../js/citas.js"></script>
	</body>
</html>