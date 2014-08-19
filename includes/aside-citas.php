<?php
require_once('../includes/functions-citas.php');

$subModAgenda = '';
$subModSolicitudes = '';

switch ($currentSubModule) {
    case 'solicitudes':
        $subModSolicitudes = 'class="active"';
        break;
    default: 
        $subModAgenda = 'class="active"';        
        break;
}
?>

<aside>
	<nav class="secondary-nav">
		<ul class="sec-nav-category">
			<li class="accordion-item <?php if ($currentSubModule == 'agenda') { echo ' expanded'; } ?>">
				<a href="/cenfotec-proyecto-1/citas/agenda.php" <?php echo $subModAgenda; ?>>Agenda</a>
				<?php if ($currentSubModule == 'agenda') { ?>
					<div id="agenda" class="accordion-detail">
						<input id="agenda-fecha" type="text" class="datepicker" />
					</div>
				<?php } ?>
			</li>
			<li class="accordion-item <?php if ($currentSubModule == 'solicitudes') { echo ' expanded'; } ?>">
				<?php if ($currentSubModule == 'solicitudes') { ?>
					<span id="crearSolicitud" class="flaticon-add73"></span>
					<a href="/cenfotec-proyecto-1/citas/solicitudes.php?idCita=0" <?php echo $subModSolicitudes; ?> >Solicitudes de cita</a>
					<ul class="thrd-nav-category accordion-detail">
						<!--getSolicitudesUsuario(1) -->
						<?php getSolicitudesUsuario("evillalobosm@ucenfotec.ac.cr") ?>
					</ul>
				<?php } else { ?>
					<a href="/cenfotec-proyecto-1/citas/solicitudes.php?idCita=0">Solicitudes de cita</a>
				<?php } ?>
			</li>
		</ul>
	</nav>
</aside>