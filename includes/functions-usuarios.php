
<?php
require_once('../includes/functions.php');

// Usuarios
function getUsuarios() {
	$query = "SELECT `tusuarios`.`nombre`, `tusuarios`.`apellido1`, `tusuarios`.`apellido2`, `tusuarios`.`id`, `trol`.`nombre` AS 'Rol' ".
			 "FROM tusuarios, trol WHERE `tusuarios`.`rol`=`trol`.`id` ORDER BY tusuarios.apellido1, tusuarios.apellido2, tusuarios.nombre";

	return do_query($query);
}

function mostrarUsuarios() {
	$usuarios = getUsuarios();

	while ($row = mysqli_fetch_assoc($usuarios)) {
		echo '<tr>';
        echo '<td>';
        echo '<a href="#">'.utf8_encode($row['apellido1']).' '.utf8_encode($row['apellido2']).' '.utf8_encode($row['nombre']);
        echo '</a>';
        echo '<span class="usuarios-email">'.utf8_encode($row['id']);
        echo '</span>';
        echo '</td>';
        echo '<td class="usuarios-rol">'.utf8_encode($row['Rol']);
        echo '</td>';
        echo '<td>';
        echo '<div class="usuarios-acciones">';
        echo '<a class="usuarios-deshabilitar" href="#">'."Deshabilitar";
        echo '</a>';
        echo '<a class="usuarios-modificar" href="/cenfotec-proyecto-1/configuracion/usuarioModificar.php">'."Modificar";
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
	
	// Función que consulta las los profesores
	function getInvitados() {
		$query = "SELECT tu.id, tu.nombre, tu.apellido1, tu.apellido2, tu.ranking, tu.activo, tu.carrera, tu.contrasena, tu.imagen, tu.skypeid, tu.telefono  FROM `trol` AS tr INNER JOIN `tusuarios` AS tu ON tr.id = tu.rol WHERE tr.nombre='Profesor' OR tr.nombre='Director de carrera' OR tr.nombre='Asistente';";
		
		$queryResults = do_query($query);
		$jsonArray = [];
		$index = 0;		
		
		while ($row = mysqli_fetch_assoc($queryResults)) {
			$results['id'] = $row['id'];
			$results['nombre'] = $row['nombre'].' '.$row['apellido1'].' '.$row['apellido2'];
			$results['carrera'] = $row['carrera'] == NULL ? '-' : $row['carrera'];
			$results['ranking'] = $row['ranking'];
			$results['activo'] = $row['activo'];
			$results['carrera'] = $row['carrera'];
			$results['contrasena'] = $row['contrasena'];
			$results['imagen'] = $row['imagen'];
			$results['skypeid'] = $row['skypeid'];
			$results['telefono'] = $row['telefono'];
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
        isset($_POST['pavatar'])  &&
		isset($_POST['pidUsr'])&& 
        isset($_POST['pcontrasena'])&& 
		isset($_POST['ptelefono']) && 
		isset($_POST['pskype']) && 
		isset($_POST['prol']) && 
		isset($_POST['pcarrera']) && 
		isset($_POST['pcurso'])){
	
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


if($_SERVER['REQUEST_METHOD']=="POST") {
	$function = $_POST['call'];
	if(function_exists($function)) {        
	    call_user_func($function);
	} else {
	    echo 'Function Not Exists!!';
	}
}

?>