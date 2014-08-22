<?php
	require_once('includes/functions.php');
	require_once('includes/functions-citas.php');
	require_once('functions-dashboard.php');
?>


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
			<?php getTresSolicitudes($_SESSION['usuarioActivoId'] )?>
		</ul>
	</div>
</section>