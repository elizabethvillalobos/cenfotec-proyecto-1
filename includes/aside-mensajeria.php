<?php
require_once('../includes/functions-mensajeria.php');

$subModConversacion = '';
$subModNueva = '';

switch ($currentSubModule) {
    case 'conversacion':
        $subModConversacion = 'class="active"';
        break;
    default: 
        $subModNueva = 'class="active"';        
        break;
}
?>

<aside>
	<nav class="secondary-nav">
		<ul class="sec-nav-category">			
			<li class="accordion-item">
				<a href="/cenfotec-proyecto-1/mensajeria/nuevaConversacion.php">Nueva Conversación</a>
			</li>
			<li class="accordion-item expanded">
				<a href="#" class="active">Conversaciones</a>
				<ul class="thrd-nav-category accordion-detail">
					<?php getConversacionesUsuario($_SESSION['usuarioActivoId']) ?>
				</ul>
			</li>
		</ul>
	</nav>
</aside>