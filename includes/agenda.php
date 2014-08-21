<?php
	require_once('includes/functions.php');
	require_once('includes/functions-citas.php');
?>

<section class="dash-agenda">
	<a href="/cenfotec-proyecto-1/citas/agenda.php">
		<h3>Agenda</h3>
	</a>

	<ul class="dash-agenda-citas">
		<li>
			<a href="/cenfotec-proyecto-1/citas/agenda.php" class="dash-agenda-cita">
				<img class="dash-agenda-photo" src="/cenfotec-proyecto-1/images/users/juan-carlos-brenes.jpg" width="50" height="50">
				<span class="dash-agenda-fecha">Miércoles 23 de Julio</span>
				<span class="dash-agenda-hora">6:00 p.m.</span>
				<span class="dash-agenda-invitado">Juan Carlos Brenes Álvarez</span>
			</a>
		</li>
		<li>
			<a href="/cenfotec-proyecto-1/citas/agenda.php" class="dash-agenda-cita">
			<img class="dash-agenda-photo" src="/cenfotec-proyecto-1/images/users/susana-fuentes.jpg" width="50" height="50">
				<span class="dash-agenda-fecha">Lunes 28 de Julio</span>
				<span class="dash-agenda-hora">4:00 p.m.</span>
				<span class="dash-agenda-invitado">Susana Fuentes Morales</span>
			</a>
		</li>
		<li>
			<a href="/cenfotec-proyecto-1/citas/agenda.php" class="dash-agenda-cita">
			<img class="dash-agenda-photo" src="/cenfotec-proyecto-1/images/users/luis-guzman.jpg" width="50" height="50">
				<span class="dash-agenda-fecha">Martes 29 de Julio</span>
				<span class="dash-agenda-hora">5:00 p.m.</span>
				<span class="dash-agenda-invitado">Luis Guzmán Valverde</span>
			</a>
		</li>
	</ul>
	<div class="dash-agenda-solicitudes">
		<a href="/cenfotec-proyecto-1/citas/solicitarCita.php">
			<h4>Solicitudes de Cita</h4>
		</a>
		<ul>
			<?php getTresSolicitudes($_SESSION['usuarioActivoId'] )?>
		</ul>
	</div>
</section>