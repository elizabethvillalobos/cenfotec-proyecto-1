<?php  
	require_once('includes/functions.php');
	require_once('includes/functions-mensajeria.php');
?>

<a href="/cenfotec-proyecto-1/mensajeria/mensajeria.php?idUsuarioOtro=" class="dash-mensajes dash-notificacion">
	<span class="dash-notificacion-label">Mensajes Nuevos</span>
	<span class="dash-notificacion-total"><?php getTotalNoLeidos($_SESSION['usuarioActivoId'] )?></span>
</a>