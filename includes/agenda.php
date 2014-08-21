<?php require_once('functions-dashboard.php'); ?>

<section class="dash-agenda">
	<a href="/cenfotec-proyecto-1/citas/agenda.php">
		<h3>Agenda</h3>
	</a>

	<ul class="dash-agenda-citas">
		<?php obtenerUltimasCitas($id, $rolUsr); ?>
	</ul>
	<div class="dash-agenda-solicitudes">
		<a href="/cenfotec-proyecto-1/citas/solicitarCita.php">
			<h4>Solicitudes de Cita</h4>
		</a>
		<ul>
			<li><a href="/cenfotec-proyecto-1/citas/solicitudes.php">Diego Barillas</a></li>
			<li><a href="/cenfotec-proyecto-1/citas/solicitudes.php">Alejandro Leiva</a></li>
			<li><a href="/cenfotec-proyecto-1/citas/solicitudes.php">Olger Cubillo</a></li>
		</ul>
	</div>
</section>