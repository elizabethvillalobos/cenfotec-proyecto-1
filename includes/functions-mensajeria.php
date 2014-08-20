<?php
	
	// Función que crea una conversacion
	function insertConversacion($idEmisor, $idReceptor, $mensaje, $horaFecha) {
		
		$query = "INSERT INTO `gic`.`mensajes` (`idEmisor`, `idReceptor`, `mensaje`, `horaFecha`, `leido`) VALUES ('$idEmisor', '$idReceptor, '$mensaje', '$horaFecha', '0');";
		return do_query($query);
		
	}
	// Función que muestra las conversaciones de un usuario
	function getConversacionesUsuario($idUsuario) {
		
		$query = "SELECT msjs.otroContacto,tusrs.nombre,tusrs.apellido1,tusrs.apellido2, msjs.noLeidos FROM ".
"(SELECT conversaciones.otroContacto,noLeidos.noLeidos ".
"FROM (".
    "SELECT DISTINCT otroContacto ".
    "FROM ( ".
        "SELECT tm.id, tm.idEmisor,temisor.nombre AS nombreEmisor, temisor.apellido1 AS apellido1Emisor,temisor.apellido2 AS apellido2Emisor, tm.idReceptor,treceptor.nombre AS nombreReceptor,treceptor.apellido1 AS apellido1Receptor,treceptor.apellido2 AS apellido2Receptor, tm.leido, tm.mensaje, CASE WHEN temisor.id='$idUsuario' THEN treceptor.id WHEN treceptor.id='$idUsuario' THEN temisor.id ELSE 'No match' END AS otroContacto ".
        "FROM mensajes AS tm   ".      
        "LEFT OUTER JOIN tusuarios AS temisor ON temisor.id=tm.idEmisor ".
        "LEFT OUTER JOIN tusuarios AS treceptor ON treceptor.id=tm.idReceptor ".
        "WHERE tm.idEmisor='$idUsuario' OR tm.idReceptor= '$idUsuario' )AS con ) AS conversaciones ".
        "LEFT OUTER JOIN (".
            "SELECT otroContacto, leido, COUNT(*) AS noLeidos ".
            "FROM ( ".
                "SELECT tm.id, tm.idEmisor,temisor.nombre AS nombreEmisor, temisor.apellido1 AS apellido1Emisor,temisor.apellido2 AS apellido2Emisor, tm.idReceptor,treceptor.nombre AS nombreReceptor,treceptor.apellido1 AS apellido1Receptor,treceptor.apellido2 AS apellido2Receptor, tm.leido, tm.mensaje, CASE WHEN temisor.id='$idUsuario' THEN treceptor.id WHEN treceptor.id='$idUsuario' THEN temisor.id ELSE 'No match' END AS otroContacto ".
                "FROM mensajes AS tm ".
                "LEFT OUTER JOIN tusuarios AS temisor ON temisor.id=tm.idEmisor ".
                "LEFT OUTER JOIN tusuarios AS treceptor ON treceptor.id=tm.idReceptor ".
                "WHERE tm.idReceptor= '$idUsuario') AS a ".
            "WHERE leido=0 ".
            "GROUP BY otroContacto, leido) AS noLeidos ON conversaciones.otroContacto=noLeidos.otroContacto) AS msjs INNER JOIN tusuarios AS tusrs ON tusrs.id=msjs.otroContacto";
		$queryResults = do_query($query);
		while ($row = mysqli_fetch_assoc($queryResults)) {			
			//echo '<li><a href="/cenfotec-proyecto-1/citas/mensajeria.php?idUsuarioOtro='.$row['otroContacto'].'">'. utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']) .' '.utf8_encode($row['apellido2']).'</a></li>';						
			echo '<li><a href="/cenfotec-proyecto-1/mensajeria/mensajeria.php?idUsuarioOtro='.$row['otroContacto'].'">'. utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']) .' '.utf8_encode($row['apellido2']);						
			if(utf8_encode($row['noLeidos'])>0)
			{
				echo '<span class="notificacion">'.utf8_encode($row['noLeidos']).'</span>';
			}
			echo '</a></li>';
			
		}
		mysqli_free_result($queryResults);
	}
	
	// Función que muestra una conversacion específica
	function mostrarConversacion($idUsuarioActual, $idUsuarioOtro) {
	
		//si no se paso ningun usuario se setea el ultimo con el que se hablo
		if($idUsuarioOtro=="")
		{
			$query="SELECT DISTINCT otroContacto FROM ( ".
        "SELECT tm.id, tm.idEmisor,temisor.nombre AS nombreEmisor, temisor.apellido1 AS apellido1Emisor,temisor.apellido2 AS apellido2Emisor, tm.idReceptor,treceptor.nombre AS nombreReceptor,treceptor.apellido1 AS apellido1Receptor,treceptor.apellido2 AS apellido2Receptor, tm.leido, tm.mensaje, tm.horaFecha, CASE WHEN temisor.id='$idUsuarioActual' THEN treceptor.id WHEN treceptor.id='$idUsuarioActual' THEN temisor.id ELSE 'No match' END AS otroContacto ".
        "FROM mensajes AS tm     ".
        "LEFT OUTER JOIN tusuarios AS temisor ON temisor.id=tm.idEmisor ".
        "LEFT OUTER JOIN tusuarios AS treceptor ON treceptor.id=tm.idReceptor ".
        "WHERE tm.idEmisor='$idUsuarioActual' OR tm.idReceptor= '$idUsuarioActual' ORDER BY tm.horaFecha DESC LIMIT 1) AS a ";
			
			$queryResults = do_query($query);
			$row = mysqli_fetch_assoc($queryResults);
			$idUsuarioOtro=utf8_encode($row['otroContacto']);
		}
	
	
		//seleccionar nombre del otro usuario
		$query = "SELECT nombre, apellido1, apellido2 FROM tusuarios  WHERE id='$idUsuarioOtro'";
		$queryResults = do_query($query);
		$row = mysqli_fetch_assoc($queryResults);
		//mostrar nombre del otro usuario y encabezadp
		echo '<div class="mod-hd">'.
					'<h2>'.utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']).'</h2>'.
				'</div>'.
				'<div class="mod-bd mensajes">';
		
		//seleccionar todos los mensajes de la conversacion
		$query = "SELECT tm.id, tm.horaFecha,tm.idEmisor,temisor.nombre AS nombreEmisor, temisor.apellido1 AS apellido1Emisor,temisor.apellido2 AS apellido2Emisor, tm.idReceptor,treceptor.nombre AS nombreReceptor,treceptor.apellido1 AS apellido1Receptor,treceptor.apellido2 AS apellido2Receptor, tm.leido, tm.mensaje FROM mensajes AS tm LEFT OUTER JOIN tusuarios AS temisor ON temisor.id=tm.idEmisor LEFT OUTER JOIN tusuarios AS treceptor ON treceptor.id=tm.idReceptor WHERE (tm.idEmisor='$idUsuarioActual' AND tm.idReceptor='$idUsuarioOtro') OR (tm.idReceptor= '$idUsuarioActual' AND tm.idEmisor='$idUsuarioOtro') ORDER BY tm.horaFecha ASC";
		$queryResults = do_query($query);
		//imprimir todos los mensajes 
		while ($row = mysqli_fetch_assoc($queryResults)) 
		{		
			$nombreEmisor = utf8_encode($row['nombreEmisor']).' '.utf8_encode($row['apellido1Emisor']).' '.utf8_encode($row['apellido2Emisor']);
			$nombreReceptor = utf8_encode($row['nombreReceptor']).' '.utf8_encode($row['apellido1Receptor']).' '.utf8_encode($row['apellido2Receptor']);
			
			$estaLeido=true;
			if(utf8_encode($row['leido'])==0 && utf8_encode($row['idReceptor'])==$idUsuarioActual)
			{
				echo '<div class="form-row noLeido">';
				
				//actualizar estado del mensaje
				$queryUpdate = "UPDATE `gic`.`mensajes` SET `leido` = '1' WHERE `mensajes`.`id` = ".utf8_encode($row['id']).";";
				$result = do_query($queryUpdate);
			}
			else
			{
				echo '<div class="form-row">';
			}
			
			echo '<span>'.$nombreEmisor.'</span>'.
					'<p>'.utf8_encode($row['mensaje']).'</p>'.
				'</div>';	
		}
		
		echo '</div>';
		mysqli_free_result($queryResults);
	}
	

?>