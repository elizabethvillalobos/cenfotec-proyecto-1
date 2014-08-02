<?php
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
				<!-- <span id="crearSolicitud" class="flaticon-add73"></span> -->
				<a href="/cenfotec-proyecto-1/citas/solicitudes.php" <?php echo $subModSolicitudes; ?> >Solicitudes de cita</a>
				<ul class="thrd-nav-category accordion-detail">
					<li>
						<a href="/cenfotec-proyecto-1/citas/solicitudes.php">Diego Barillas</a>
					</li>
					<li>
						<span class="listo flaticon-check34"></span>
						<a href="/cenfotec-proyecto-1/citas/solicitudInfo.php">Alejandro Leiva</a>
					</li>
					<li>
						<span class="listo flaticon-check34"></span>
						<a href="#">Olger Cubillo</a>
					</li>
					<li>
						<span class="listo flaticon-check34"></span>
						<a href="#">Rocío Solano</a>
					</li>
					<li>
						<span class="listo flaticon-check34"></span>
						<a href="#">Alejandro Villalobos</a>
					</li>
				</ul>
			</li>
		</ul>
	</nav>
</aside>