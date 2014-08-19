<?php
	$subModRanking = '';
	$subModSolicitudes = '';
	$subModAgendas = '';
	$subModUsuariosRegistrados = '';

	switch ($currentSubModule) {
	    case 'solicitudes':
	        $subModSolicitudes = 'class="active"';
	        break;
	    case 'agenda':
	        $subModAgendas = 'class="active"';
	        break;
	    case 'usuariosRegistrados':
	        $subModUsuariosRegistrados = 'class="active"';
	        break;
	    default: 
	        $subModRanking = 'class="active"';        
	        break;
	}
?>

<aside>
	<nav class="secondary-nav">
		<ul class="sec-nav-category">
			<li class="accordion-item">
				<a href="/cenfotec-proyecto-1/reportes/reportes.php" <?php echo $subModRanking; ?>>Ranking</a>
			</li>
			<li class="accordion-item">
				<a href="/cenfotec-proyecto-1/reportes/reporte-solicitudes.php" <?php echo $subModSolicitudes; ?>>Solicitudes</a>
			</li>
			<li class="accordion-item">
				<a href="/cenfotec-proyecto-1/reportes/reporte-agendas.php" <?php echo $subModAgenda; ?>>Agendas</a>
			</li>
			<li class="accordion-item">
				<a href="/cenfotec-proyecto-1/reportes/reporte-usuarios.php" <?php echo $subModUsuariosRegistrados; ?>>Usuarios registrados</a>
			</li>
		</ul>
	</nav>
</aside>