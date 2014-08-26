
<?php
require_once('../includes/functions.php');

// Usuarios
function getUsuarios() {
	$query = "SELECT `tusuarios`.`nombre`, `tusuarios`.`apellido1`, `tusuarios`.`apellido2`, `tusuarios`.`id`, `tusuarios`.`contrasena`, `tusuarios`.`activo`, `trol`.`nombre` AS 'Rol' ".
			 "FROM tusuarios, trol WHERE `tusuarios`.`rol`=`trol`.`id` ORDER BY tusuarios.apellido1, tusuarios.apellido2, tusuarios.nombre";

	return do_query($query);
}


function getUsuariosPorRol($rol){
	$query = "SELECT `tusuarios`.`nombre`, `tusuarios`.`apellido1`, `tusuarios`.`apellido2`, `tusuarios`.`id`, `tusuarios`.`contrasena`, `tusuarios`.`activo`, `trol`.`nombre` AS 'Rol' ".
				 "FROM tusuarios, trol WHERE `tusuarios`.`rol`=`trol`.`id` AND `trol`.`id` = '$rol' ORDER BY tusuarios.apellido1, tusuarios.apellido2, tusuarios.nombre";

	$result = do_query($query);
	return $result;		 
}

function mostrarUsuariosRectores() {
	if (!empty($_POST['pRol'])) {
		$rol = $_POST['pRol'];
		$usuariosRectores = getUsuariosPorRol($rol);

		while ($row = mysqli_fetch_assoc($usuariosRectores)) {
	        $estado = "Deshabilitar";
	        if($row['activo']==0){
	            $estado = "Habilitar";
	        }
	        
			echo '<tr class="info-usuario">';
	        echo '<td>';
	        echo '<a href="/cenfotec-proyecto-1/busqueda/perfil-usr.php?idBusqueda='.utf8_encode($row['id']).'">'.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']).' '.utf8_encode($row['nombre']);
	        echo '</a>';
	        echo '<span class="usuarios-email">'.utf8_encode($row['id']);
	        echo '</span>';
	        echo '<span id="estado-usr" hidden="hidden">'.$row['activo'];
	        echo '</span>';
	        echo '</td>';
	        echo '<td class="usuarios-rol">'.utf8_encode($row['Rol']);
	        echo '</td>';
	        echo '<td>';
	        echo '<div class="usuarios-acciones">';
	        echo '<a class="usuarios-deshabilitar" href="#">'.$estado;
	        echo '</a>';
	        echo '<a class="usuarios-modificar" href="/cenfotec-proyecto-1/configuracion/usuarioModificar.php?id='.$row['id'].'">'."Modificar";
	        echo '</a>';
	        echo '<span class="flaticon-machine2">';
	        echo '</span>';
	        echo '</div>';
	        echo '</td>';
	        echo '</tr>';       
		}
	}
}


function mostrarUsuarios() {
	$usuarios = getUsuarios();

	while ($row = mysqli_fetch_assoc($usuarios)) {
        $estado = "Deshabilitar";
        if($row['activo']==0){
            $estado = "Habilitar";
        }
        
		echo '<tr class="info-usuario">';
        echo '<td>';
        echo '<a href="/cenfotec-proyecto-1/busqueda/perfil-usr.php?idBusqueda='.utf8_encode($row['id']).'">'.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']).' '.utf8_encode($row['nombre']);
        echo '</a>';
        echo '<span class="usuarios-email">'.utf8_encode($row['id']);
        echo '</span>';
        echo '<span id="estado-usr" hidden="hidden">'.$row['activo'];
        echo '</span>';
        echo '</td>';
        echo '<td class="usuarios-rol">'.utf8_encode($row['Rol']);
        echo '</td>';
        echo '<td>';
        echo '<div class="usuarios-acciones">';
        echo '<a class="usuarios-deshabilitar" href="#">'.$estado;
        echo '</a>';
        echo '<a class="usuarios-modificar" href="/cenfotec-proyecto-1/configuracion/usuarioModificar.php?id='.$row['id'].'">'."Modificar";
        echo '</a>';
        echo '<span class="flaticon-machine2">';
        echo '</span>';
        echo '</div>';
        echo '</td>';
        echo '</tr>';
	}
}


// Función que consulta los profesores
	function getProfesores() {
		$query = "SELECT id FROM trol WHERE nombre = 'Profesor';";

		$queryResults = do_query($query);
		$jsonArray = [];
		$index = 0;
		$idProfesores=0;
		
		if (mysqli_num_rows($queryResults) > 0) {
			while ($row = mysqli_fetch_assoc($queryResults)) {
				$idProfesores = $row['id'];
			}			
		}
		if($idProfesores != 0){
			$query = "SELECT * FROM tusuarios WHERE tusuarios.activo = 1 AND rol = ".$idProfesores;
			$queryResults = do_query($query);
		}
		
		while ($row = mysqli_fetch_assoc($queryResults)) {
			$results['nombre'] = utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']);
			$results['carrera'] = $row['carrera'] == NULL ? '-' : $row['carrera'];
			$results['ranking'] = $row['ranking'];
			$results['id'] = $row['id'];
			$results['skypeid'] = $row['skypeid'];
			$results['telefono'] = $row['telefono'];
			$jsonArray['profesores'][$index] = $results;
			$index++;
		}

		mysqli_free_result($queryResults);

		return $jsonArray;
	}
	
	// Función que consulta los invitados
	function getInvitados() {
		$query = "SELECT tu.id, tu.nombre, tu.apellido1, tu.apellido2, tu.ranking, tu.activo, tu.carrera, tu.contrasena, tu.imagen, tu.skypeid, tu.telefono  FROM `trol` AS tr INNER JOIN `tusuarios` AS tu ON tr.id = tu.rol WHERE tr.nombre='Profesor' OR tr.nombre='Director de carrera' OR tr.nombre='Asistente';";
		
		$queryResults = do_query($query);
		$jsonArray = [];
		$index = 0;		
		
		while ($row = mysqli_fetch_assoc($queryResults)) {
			$results['id'] = utf8_encode($row['id']);
			$results['nombre'] = utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']);
			$results['carrera'] = utf8_encode($row['carrera']) == NULL ? '-' : utf8_encode($row['carrera']);
			$results['ranking'] = utf8_encode($row['ranking']);
			$results['activo'] = utf8_encode($row['activo']);
			$results['carrera'] = utf8_encode($row['carrera']);
			$results['contrasena'] = utf8_encode($row['contrasena']);
			$results['imagen'] = utf8_encode($row['imagen']);
			$results['skypeid'] = utf8_encode($row['skypeid']);
			$results['telefono'] = utf8_encode($row['telefono']);
			$jsonArray['invitados'][$index] = $results;
			$index++;
		}
		
		mysqli_free_result($queryResults);
		return $jsonArray;
	}

function insertarUsuario(){
	if(isset($_POST['pnombre']) &&
		isset($_POST['papellido1']) && 
		isset($_POST['papellido2'])  && 
		isset($_POST['pidUsr'])&& 
        isset($_POST['pcontrasena'])&&  
		isset($_POST['pusr-activo'])){
	
		$id = $_POST['pidUsr'];
		$contrasena = $_POST['pcontrasena'];
		$activo = $_POST['pusr-activo'];
        $nombre = utf8_decode($_POST['pnombre']);
        $apellido1 = utf8_decode($_POST['papellido1']);
        $apellido2 = utf8_decode($_POST['papellido2']);
        $avatar = $_POST['pavatar'];
        $skype = $_POST['pskype'];
        $rol = $_POST['prol'];
        $telefono = $_POST['ptelefono'];
        $carrera = $_POST['pcarrera'];
        $curso = $_POST['pcurso'];

		$query = "INSERT INTO tusuarios(id, contrasena, ranking, activo, nombre, apellido1, apellido2, imagen, skypeid, rol, telefono, carrera) VALUES ('$id', '$contrasena', '0', '$activo', '$nombre', '$apellido1', '$apellido2', '$avatar', '$skype', '$rol', '$telefono', '$carrera')";

		$result = do_query($query);
	}

}


function getRoles() {
	$query = "SELECT * FROM trol";

	return do_query($query);
}

function mostrarRoles() {
    $roles = getRoles();

	while ($row = mysqli_fetch_assoc($roles)) {
		echo '<option value='.$row['id'].' > '.utf8_encode($row['nombre']).'</option>';
	}
}

function getUsuariosModif($pid) {
    $query = "SELECT `tusuarios`.`nombre`, `tusuarios`.`apellido1`, `tusuarios`.`apellido2`, `tusuarios`.`imagen`, `tusuarios`.`id`, `tusuarios`.`telefono`, `tusuarios`.`skypeid`, `trol`.`nombre` AS 'Rol' , `tusuarios`.`carrera`".
			 "FROM tusuarios, trol WHERE `tusuarios`.`rol`= `trol`.`id` AND `tusuarios`.`id` = '$pid'";

	$result = do_query($query);
    
    $row = mysqli_fetch_assoc($result);
    
    return $row;
}

function modificarUsuario(){
    
    if(isset($_POST['pnombre']) &&
		isset($_POST['papellido1']) && 
		isset($_POST['papellido2'])  && 
		isset($_POST['pidUsr'])&&  
		isset($_POST['prol']) && 
		isset($_POST['pcarrera'])){
        
        /*$nombreCarrera = $_POST['pcarrera'];
        $query = "SELECT `tcarrera`.`id` FROM tcarrera WHERE `tcarrera`.`nombre` = '$nombreCarrera'";
        $result = do_query($query);
        $carrera = mysqli_fetch_assoc($result);*/
        
        $id = $_POST['pidUsr'];
		$contrasena = $_POST['pcontrasena'];
		$activo = '1';
        $nombre = utf8_decode($_POST['pnombre']);
        $apellido1 = utf8_decode($_POST['papellido1']);
        $apellido2 = utf8_decode($_POST['papellido2']);
        $avatar = $_POST['pavatar'];
        $skype = $_POST['pskype'];
        $rol = $_POST['prol'];
        $telefono = $_POST['ptelefono'];
        $curso = $_POST['pcurso'];
        $carrera = $_POST['pcarrera'];
        
        $query = "UPDATE tusuarios SET id='$id', nombre='$nombre', apellido1='$apellido1', apellido2='$apellido2', imagen='$avatar', skypeid='$skype', rol=$rol, telefono='$telefono', carrera='$carrera', curso='$curso', activo='$activo' WHERE id='$id'";
        
        do_query($query); 
        
        $query = "INSERT INTO tusuariosxcurso(idCurso, idUsuario) VALUES ('$curso', '$id')";
        
        do_query($query); 
    }
    
}

function getIdUsuarios(){
    $usuarios = getUsuarios();
    $i=0;
    
    while ($row = mysqli_fetch_assoc($usuarios)) {
		$arreglo[$i]= $row['id'];
        $i++;
	}
    
    return $arreglo;
}

function getPWUsuarios(){
    $contrasenas = getUsuarios();
    $i=0;
    
    while ($row = mysqli_fetch_assoc($contrasenas)) {
		$arreglo[$i]= $row['contrasena'];
        $i++;
	}
    
    return $arreglo;
}

function cambiarEstadoUsr(){
    if(isset($_POST['pidUsr']) &&
		isset($_POST['pnuevoEstado'])){
        
        $id = $_POST['pidUsr'];
        $estado = $_POST['pnuevoEstado'];
        
        $query = "UPDATE tusuarios SET activo=$estado WHERE id='$id'";
        
        do_query($query); 
    }
}

	// Función que consulta los destinatarios de mensaje
	function getDestinatarios($idRemitente) {
		$query = "SELECT id, nombre, apellido1, apellido2  FROM `tusuarios` WHERE id !='$idRemitente' AND activo = 1";
		
		$queryResults = do_query($query);
		$jsonArray = [];
		$index = 0;		
		
		while ($row = mysqli_fetch_assoc($queryResults)) {
			$results['id'] = utf8_encode($row['id']);
			$results['nombre'] = utf8_encode($row['nombre']).' '.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']);
			$jsonArray['destinatarios'][$index] = $results;
			$index++;
		}
		
		mysqli_free_result($queryResults);
		return $jsonArray;
	}

function insertarCodigoActivacion() {
    if(isset($_POST['pid']) &&
      isset($_POST['pcodigo'])){
        
        $id = $_POST['pid'];
        $codigo = $_POST['pcodigo'];
        $query = "INSERT INTO codigoactivacion(idUsuario, codigoActivacion) VALUES ('$id', '$codigo')";
        do_query($query); 
    }
} 

function mostrarCarreras2(){
    $query = "SELECT `tcarrera`.`id`, `tcarrera`.`nombre` FROM tcarrera WHERE `tcarrera`.`activo`=1";
    $carreras = do_query($query);
    
    while ($row = mysqli_fetch_assoc($carreras)) {
        
        echo '<option value="'.utf8_encode($row['id']).'">'.utf8_encode($row['nombre']).'';
        echo '</option>';
    }    
}

function mostrarCursos2(){
    $query = "SELECT `tcursos`.`id`, `tcursos`.`nombre` FROM tcursos WHERE `tcursos`.`activo`=1";
    $cursos = do_query($query);
    
    while ($row = mysqli_fetch_assoc($cursos)) {
        
        echo '<option value="'.utf8_encode($row['id']).'">'.utf8_encode($row['nombre']).'';
        echo '</option>';
    }    
}

if($_SERVER['REQUEST_METHOD']=="POST") {
	$function = $_POST['call'];
	if(function_exists($function)) {        
	    call_user_func($function);
	} else {
	    //echo 'Function Not Exists!!';
	}
}

?>